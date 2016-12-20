<?php

  class ResultatsController {

  	public static function afficher() {
      $candidats = Candidat::all(); 
      require_once('views/resultats.php');
    }

  }

?>