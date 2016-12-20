<?php
  class EnregistrementController {
	

	public static function save() {
        require_once('models/electeur.php');
        $electeur = Electeur::find($_POST['identifiant']);
        require_once('models/candidat.php');
        $candidats = Candidat::all(); 
        require_once('models/bulletin.php');
        $identifiant = $_POST['identifiant'];
        $done = $electeur[0]->done;
  if ($done == f) {

          foreach($candidats as $candidat) {
            $id = $candidat->id;
            Bulletin::create($identifiant, $id , $_POST[$id]);
            self::update_note($id, $_POST[$id]);

          }
          Electeur::update_done($_POST['identifiant'], true);
          require_once('views/enregistrement.php');
        } 

        else 
        {
            require_once('views/erreurvote.php');
        }
    }



    public static function update_note($id, $note){

        if ($note =='TB') { Candidat::update_TB($id); }
        elseif ($note =='B') { Candidat::update_B($id);}
        elseif ($note =='AB') { Candidat::update_AB($id); }
        elseif ($note =='P') { Candidat::update_P($id); }
        elseif ($note =='I') { Candidat::update_I($id); }
        elseif ($note =='AR') { Candidat::update_AR($id); }
    }

  public static function electeur(){
      require_once('models/electeur.php');
        $electeur = Electeur::find($_POST['identifiant']);
        $identifiant1 = $electeur[0]->identifiant;
        $identifiant2 = $_POST['identifiant'];

        if ($identifiant1 == $identifiant2){
          require_once('views/exist.php');
        }
        else {

          $electeur2 = Electeur::create($_POST['identifiant'], $_POST['nom'], $_POST['prenom'], $_POST['password']);
          require_once('views/signup_done.php');
        }
    }
    public static function candidat(){
      require_once('models/candidat.php');
        $candidat = Candidat::find_by_name($_POST['name']);
        $nom1 = $candidat[0]->name;
        $nom2 = $_POST['name'];


        if ($nom1 == $nom2){
          require_once('views/candidat_exist.php');
          break;
        }
        else {
          $nom2 = Candidat::create($_POST['name']);
          require_once('views/candidat_done.php');
        }
      }
    
}
?>
