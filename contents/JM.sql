DROP TABLE BULLETIN;
DROP TABLE ELECTEUR;
DROP TABLE CANDIDAT;


CREATE TABLE ELECTEUR (
	IDENTIFIANT varchar(255), 
	NOM varchar(255),
	PRENOM varchar(255),
	DONE boolean,
	ADMIN boolean,
	PASSWORD varchar(255),
	CONSTRAINT electeur_pk primary key (IDENTIFIANT)
);

CREATE TABLE CANDIDAT (
	ID bigserial,
	NAME varchar(255) constraint nameCandidat not null,
	TB bigint,
	B bigint,
	AB bigint,
	P bigint,
	I bigint,
	AR bigint,
	CONSTRAINT candidat_pk primary key (ID)
);

CREATE TABLE BULLETIN (
	IDENTIFIANT varchar(255),
	ID bigserial,
	note varchar(255) check (note in ('TB','B','AB','P','I','AR')),
	constraint bulletin_pk primary key (IDENTIFIANT,ID),
	CONSTRAINT bulletin_fk1 FOREIGN KEY (IDENTIFIANT) REFERENCES ELECTEUR(IDENTIFIANT),
	CONSTRAINT bulletin_fk2 FOREIGN KEY (ID) REFERENCES CANDIDAT(ID)
);

drop function ajouter_note();

CREATE OR REPLACE FUNCTION ajouter_note()
RETURNS trigger AS $$
BEGIN 
	UPDATE candidat SET NEW.note = (select CAST (New.note AS bigint) from candidat where id = New.id) + 1 WHERE id = NEW.id;
END;
$$ language plpgsql


CREATE trigger ligne_bulletin_rempli
BEFORE INSERT ON bulletin
FOR EACH ROW
EXECUTE PROCEDURE ajouter_note();