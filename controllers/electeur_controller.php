<?php
  class ElecteurController {

  	public function create(){
      require_once('views/electeur/addElecteur.php');
      $electeur= Electeur::create($_POST['identifiant'], $_POST['nom'], $_POST['prenom'], $_POST['done']);

    }
}

?>