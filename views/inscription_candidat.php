<!DOCTYPE HTML>
<html>
	<head>
			<?php require_once('contents/style.php'); ?>
			
	</head>

	<body>
			<?php include("navbar.php"); ?>

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
			  	
			  	<h2 class="grey-text">Inscrire son projet <i class="medium material-icons prefix">library_books</i> </h2>
			  	<p>Bienvenue,</p> 
			  	<p>Merci d'avoir fait le choix de notre plateforme pour réaliser un vote utilisant la méthode du jugement majoritaire. Veuillez entrer le nom de votre projet pour participer au vote. </p> <p> Attention: si le nom existe déjà le projet ne pourra pas être enregistrer. </p>
			</div>
			</form>

			<div class="container">
			  <div class="row">

<?php $today = getdate(); if ( $today['mday'] == 12 && $today['hours'] < 24 ) { ?>
				
			    <div class="row center">
			           <p class="center red-text">Tous les projets ont été déjà enregistrés.</p>
			           <p class="center black-text">Veuillez-vous inscrire avant de voter : <a href="/signup"> <u> INSCRIPTION </u></a></p>
			    </div>
			    
			<?php } else { ?>
			<form class="col s12"  action="/enregistrement/candidat" method="post">
	
				<div class="row">

								<div class="row">
							        <div class="input-field col s6 offset-s3">
							        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">edit</i>
							          <input id="name" name="name" type="text" class="validate" required>
							          <label for="name">Nom précis du projet</label>
							        </div>    
							      </div>
						      </div>
						        <div class="row center">

								  <button type='submit' class="btn waves-effect waves-blue light-blue lighten-2 ">Submit<i class="material-icons right">envoyer</i></button>
			  				</div>
					</div>
			</form>
			 <?php } ?>


		</div>
	</div>
	   
 			<?php include("footer.php"); ?>
 			<?php require_once('contents/script.php'); ?>
				
	</body>


	

       

</html>
