<?php
  class BulletinController {

  	  require_once('views/school/voter.php');
      $bulletin= Bulletin::create($_POST['identifiant'], $_POST['id'], $_POST['nom'], $_POST['TB'], $_POST['B'], $_POST['AB'] , $_POST['P'] , $_POST['I'] , $_POST['AR']);
      

    }