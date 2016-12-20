DROP TABLE ELECTEUR;
DROP TABLE CANDIDAT;
DROP TABLE BULLETIN;

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

CREATE TABLE BULLETIN(
	IDENTIFIANT varchar(255),
	ID bigserial,
	TB bigint,
	B bigint,
	AB bigint,
	P bigint,
	I bigint,
	AR bigint,
	constraint bulletin_pk primary key (IDENTIFIANT,ID),
	CONSTRAINT bulletin_fk1 FOREIGN KEY (IDENTIFIANT) REFERENCES ELECTEUR(IDENTIFIANT),
	CONSTRAINT bulletin_fk2 FOREIGN KEY (ID) REFERENCES CANDIDAT(ID)
);
