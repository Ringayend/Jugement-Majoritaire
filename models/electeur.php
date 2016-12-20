<?php
  class Electeur {

    public $identifiant;
    public $nom;
    public $prenom;
    public $done;
    public $admin;
    public $password;


    public function __construct($identifiant, $nom, $prenom, $done, $admin, $password) {
      $this->identifiant = $identifiant;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->done = $done;
      $this->admin = $admin;
      $this->password = $password;
    }

    public static function create( $identifiant, $nom, $prenom, $password){
      $db = Db::getInstance();
      $crypted_password = sha1($password);
      $req = pg_query_params($db,'INSERT INTO electeur (identifiant, nom, prenom, done, admin, password ) VALUES ( $1, $2, $3, False, False, $4)',array($identifiant, $nom, $prenom, $crypted_password));
      }

     public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = pg_query($db,'SELECT * FROM electeur');
      foreach(pg_fetch_all($req) as $electeur) {
        $list[] = new Electeur($electeur['identifiant'], $electeur['nom'], $electeur['prenom'], $electeur['done'],$electeur['admin'], $electeur['password']);
        }

      return $list;

    }

    public static function find($identifiant) {
      $db = Db::getInstance();
      $list = [];
      $req = pg_query_params($db,'SELECT * FROM electeur WHERE identifiant = $1',array($identifiant));
      foreach(pg_fetch_all($req) as $electeur) {
          $list[] = new Electeur($electeur['identifiant'], $electeur['nom'], $electeur['prenom'], $electeur['done'],$electeur['admin'], $electeur['password']);
        }
        return $list;
      }

     public static function update_done($identifiant, $done){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE electeur SET done = $2 WHERE identifiant = $1',array($identifiant, $done));
      }
  }
?>