<?php

  class PagesController {
    public function home() {
     $today = getdate(); if ($today['mday'] == 10 && $today['hours'] < 17) {
      require_once('views/home2.php');
    }
    else{
      require_once('views/home.php');
    }
    }

    public function connect() {
      require_once('views/pages/connect.php');

    }

    public function signup() {
      require_once('views/sinscrire.php');
    }

    public function candidat() {
      require_once('views/inscription_candidat.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }

    public function error404() {
      require_once('views/pages/error404.php');
    }


    public function voter() { 
      require_once('models/candidat.php');
      $candidats = Candidat::all(); 
      require_once('views/voter.php');
    }

    public function resultatsExcel() { 
      require_once('Classes/PHPExcel.php');
      require_once('Classes/resultatExcel.php');
    }


  public function login(){
    return call('pages','home');
  }


    public function logout() {
        require_once('views/pages/logout.php');
    }

    public function electeur($auth) {
      if ($auth == "OK"){
      require_once('views/pages/electeur.php');
      }
      elseif ($auth == "connect") {
        //$('#modalog').openModal(); 
      }
      else{
        require_once('views/pages/error.php');
      }
    }

  }

?>