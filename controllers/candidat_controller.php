<?php
  class CandidatController {


  	public function create(){
      require_once('views/school/addCandidat.php');
      $candidat= Candidat::create($_POST['id'], $_POST['nom'], $_POST['TB'], $_POST['B'], $_POST['AB'] , $_POST['P'] , $_POST['I'] , $_POST['AR']);

    }
}
?>