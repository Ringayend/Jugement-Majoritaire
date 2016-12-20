<?php
  class Bulletin {

    public $identifiant;
    public $id;
    public $note;


    public function __construct($identifiant, $id, $note) {
      $this->identifiant = $identifiant;
      $this->id = $id;
      $this->note = $note;
    }

    public static function create( $identifiant, $id, $note){
      $db = Db::getInstance();
      $req = pg_query_params($db,'INSERT INTO bulletin (identifiant,id, note ) VALUES ( $1, $2, $3)',array($identifiant, $id, $note));
      }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = pg_query($db,'SELECT * FROM bulletin');
      foreach(pg_fetch_all($req) as $bulletin) {
        $list[] = new Bulletin($bulletin['identifiant'], $bulletin['id'], $bulletin['note']);
        }

      return $list;

    }

    public static function find($identifiant, $id) {
      $db = Db::getInstance();
      $list = [];
      $req = pg_query_params($db,'SELECT * FROM bulletin WHERE identifiant = $1 and id = $2',array($identifiant, $id));
      foreach(pg_fetch_all($req) as $bulletin) {
          $list[] = new Bulletin($bulletin['identifiant'], $bulletin['id'], $bulletin['note']);
        }
        return $list;
      }
}
