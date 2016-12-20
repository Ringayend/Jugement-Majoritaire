<!DOCTYPE HTML>
<html>
	<head>
			<?php require_once('contents/style.php'); ?>
	</head>

	<body>
			<?php require_once('navbar.php'); ?>


			   <div id="index-banner" class="parallax-container align-wrapper">
			    <div class="section no-pad">
			      <div class="container" id="banner1">
			        <h1 class="header center grey-text">Jugement Majoritaire</h1>
			        <div class="row center">
			          <h5 class="header col s12 black-text ">Le vote numérique qui change tout</h5>
			        </div>

			      </div>
			    </div>
			    <div class="parallax">
			    	<img src="../contents/images/background1.jpg" alt="Unsplashed background img 1">
			    </div>
			  </div>

			  <div class="container">
			  	
			  	<h2 class="green-text">  <i class="medium material-icons prefix">done</i>Enregistrement terminé ! </h2>
			  	<p>Nous vous remercions d'avoir choisi cette platerforme afin de réaliser ce vote. Nous vous rappelons que l'identifiant est unique et utilisable une seul fois. À très bientôt !  </p>
			</div>
			<?php $today = getdate(); if ( $today['mday'] == 10 && $today['hours'] < 17 ) { ?>
				<div class="row center">
			           <p class="center red-text">Début du vote test à 18h.</p>
			           <p class="center black-text">En attendant veuillez enregistrer votre projet : <a href="/candidat"> <u> INSCRIPTION PROJET</u></a></p>
			    </div>
			    
			<?php } else { ?>
			<div class="row center">
			          <a href="/voter" id="download-button" class="btn-large waves-effect waves-light light-grey lighten-2">voter</a>
			</div>
			 <?php } ?>

 		<?php require 'footer.php'; ?>

 			<?php require_once('contents/script.php'); ?>
				
	</body>


	

       

</html>