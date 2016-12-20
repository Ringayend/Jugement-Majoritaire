<?php

  class Candidat {

    public $id;
    public $name;
    public $TB;
    public $B;
    public $AB;
    public $P;
    public $I;
    public $AR;


    public function __construct($id, $name, $TB, $B, $AB, $P, $I, $AR) {
      $this->id = $id;
      $this->name = $name;
      $this->TB = $TB;
      $this->B = $B;
      $this->AB = $AB;
      $this->P = $P;
      $this->I = $I;
      $this->AR = $AR;
    }

    public static function create($nom){
      $db = Db::getInstance();
      $escapedName = pg_escape_string($nom);
      $req = pg_query_params($db,'INSERT INTO candidat (name, TB, B, AB, P, I, AR ) VALUES ( $1, $2, $3, $4, $5, $6, $7)',array("$escapedName", 0, 0, 0, 0, 0, 0));
      }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = pg_query($db,'SELECT * FROM candidat');
      foreach(pg_fetch_all($req) as $candidat) {
        $list[] = new Candidat($candidat['id'], $candidat['name'], $candidat['tb'], $candidat['b'],$candidat['ab'], $candidat['p'], $candidat['i'], $candidat['ar']);
        }

      return $list;

    }

    public static function find($id) {
      $db = Db::getInstance();
      $list = [];
      $req = pg_query_params($db,'SELECT * FROM candidat WHERE id = $1',array($id));
      foreach(pg_fetch_all($req) as $candidat) {
          $list[] = new Candidat($candidat['id'], $candidat['name'], $candidat['tb'], $candidat['b'],$candidat['ab'], $candidat['p'], $candidat['i'], $candidat['ar']);
        }
        return $list;
      }
      
      public static function find_by_name($name) {
      $db = Db::getInstance();
      $list = [];
      $req = pg_query_params($db,'SELECT * FROM candidat WHERE name = $1',array($name));
      foreach(pg_fetch_all($req) as $candidat) {
          $list[] = new Candidat($candidat['id'], $candidat['name'], $candidat['tb'], $candidat['b'],$candidat['ab'], $candidat['p'], $candidat['i'], $candidat['ar']);
        }
        return $list;
      }

      public static function update($id, $nom, $TB, $B, $AB, $P, $I, $AR){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET nom = $2, TB=$3, B=$4, AB=$5, P=$6, I=$7, AR=$8 WHERE id = $1',array($id, $nom, $TB, $B, $AB, $P, $I, $AR));
      }

      public static function update_TB($id){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET TB = TB +1  WHERE id = $1',array($id));
      }

      public static function update_B($id){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET B = B +1 WHERE id = $1',array($id));
      }

      public static function update_AB($id){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET AB = AB +1 WHERE id = $1',array($id));
      }

      public static function update_P($id){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET P = P+1 WHERE id = $1',array($id));
      }

      public static function update_I($id){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET I = I +1 WHERE id = $1',array($id));
      }

      public static function update_AR($id){
      $db = Db::getInstance();
      $req = pg_query_params($db,'UPDATE candidat SET AR = AR +1 WHERE id = $1',array($id));
      }


      public static function note_global($candidat){
       $valTB = $candidat->TB;
       $valB = $candidat->B;
       $valAB = $candidat->AB;
       $valP = $candidat->P;
       $valI = $candidat->I;
       $valAR = $candidat->AR;
       $sum = $valTB + $valB + $valAB + $valP + $valI + $valAR;

if ($sum != 0){
       $perTB = ($valTB/$sum)*100;
       $perB = ($valB/$sum)*100;
       $perAB = ($valAB/$sum)*100;
       $perP = ($valP/$sum)*100;
       $perI = ($valI/$sum)*100;
       $perAR = ($valAR/$sum)*100;


       $per = $perTB;
       if ($per >= 50){
        return 'Très Bien';
       } 
       else {
          $per = $perTB + $perB ;
          if ($per >= 50){
            if($perTB > ($perAB + $perP + $perI + $perAR)){
              return "Bien +";
            }
            else{
              return "Bien -";
            }
          }
          else {
            $per = $perTB + $perB + $perAB;
            if ($per >= 50){
              if(($perTB + $perB) > ($perP + $perI + $perAR)){
              return "Assez Bien +";
            }
            else{
                return "Assez Bien -";
              }
            } 
            else {
              $per = $perTB + $perB + $perAB + $perP;
              if ($per >= 50){
                if(($perTB + $perB + $perAB) > ($perI + $perAR)){
                  return "Passable +";
                }
                else{
                  return "Passable -";
                }
               } 
               else {
                  $per = $perTB + $perB + $perAB + $perP + $perI;
                  if ($per >= 50){
                    if(($perTB + $perB + $perAB + $perP) > ($perAR)){
                      return "Insuffisant +";
                    }
                    else{
                      return "Insuffisant -";
                    }
                   } 
                   else {
                    return 'À Rejeter';
                  }
                }
               }
              } 
            }
          }
        else {
            return'À Rejeter';

          }
        
       


    }


    public static function per_sup($candidat){
       $valTB = $candidat->TB;
       $valB = $candidat->B;
       $valAB = $candidat->AB;
       $valP = $candidat->P;
       $valI = $candidat->I;
       $valAR = $candidat->AR;
       $sum = $valTB + $valB + $valAB + $valP + $valI + $valAR;

if ($sum != 0){
       $perTB = ($valTB/$sum)*100;
       $perB = ($valB/$sum)*100;
       $perAB = ($valAB/$sum)*100;
       $perP = ($valP/$sum)*100;
       $perI = ($valI/$sum)*100;
       $perAR = ($valAR/$sum)*100;


       $per = $perTB;
       if ($per >= 50){
        return $per;
       } 
       else {
          $per = $perTB + $perB ;
          if ($per >= 50){
            if($perTB > ($perAB + $perP + $perI + $perAR)){
              return $per;
            }
            else{
              return $per;
            }
          }
          else {
            $per = $perTB + $perB + $perAB;
            if ($per >= 50){
              if(($perTB + $perB) > ($perP + $perI + $perAR)){
              return $per;
            }
            else{
                return $per;
              }
            } 
            else {
              $per = $perTB + $perB + $perAB + $perP;
              if ($per >= 50){
                if(($perTB + $perB + $perAB) > ($perI + $perAR)){
                  return $per;
                }
                else{
                  return $per;
                }
               } 
               else {
                  $per = $perTB + $perB + $perAB + $perP + $perI;
                  if ($per >= 50){
                    if(($perTB + $perB + $perAB + $perP) > ($perAR)){
                      return $per;
                    }
                    else{
                      return $per;
                    }
                   } 
                   else {
                    return $per;
                  }
                }
               }
              } 
            }
          }
        else {
            return $per;

          }
        
       


    }

}

?>
