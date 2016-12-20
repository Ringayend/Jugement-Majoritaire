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
			  	
			  	<h2 class="grey-text">S'inscrire <i class="medium material-icons prefix">mode_edit</i> </h2>
			  	<p>Bienvenue,</p> 
			  	<p>Merci d'avoir fait le choix de notre plateforme pour réaliser un vote utilisant la méthode du jugement majoritaire. Veuillez-vous inscrire pour participer au vote. </p> <p>Si vous désirez inscrire votre projet, veuillez cliquer <a href="/candidat"> <u>ici </u></a>. </p>
			</div>
			</form>

			<div class="container">
			  <div class="row">


<form class="col s12"  action="/enregistrement/electeur" method="post">
	
	<div class="row">

					<div class="row">
				        <div class="input-field col s6 offset-s3">
				        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">perm_identity</i>
				          <input id="identifiant" name="identifiant" type="text" class="validate" required>
				          <label for="identifiant">prenom.nom</label>
				        </div>    
				      </div>
			        <div class="input-field col s6">
			        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">account_circle</i>
			          	<input id="prenom" name="prenom" type="text" class="validate" required>
			          	<label for="prenom">Prénom</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="nom" name="nom" type="text" class="validate" required>
			          <label for="nom">Nom</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6 offset-s3 " required>
			          	<input id="password" name="password" type="password" class="validate">
			          	<label for="password">Mot de passe</label>
			        </div>
			      </div>
			      </div>
			        <div class="row center">

					  <button type='submit' class="btn waves-effect waves-blue light-blue lighten-2 ">Submit<i class="material-icons right">envoyer</i></button>
  				</div>
			</div>
</form>
		</div>
	</div>
	   
 			<?php include("footer.php"); ?>
 			<?php require_once('contents/script.php'); ?>
				
	</body>


	

       

</html>
