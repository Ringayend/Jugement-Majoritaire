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
			  	
			  	<h2 class="grey-text">  <i class="medium material-icons prefix">drafts</i>Voter </h2>
			  	<p>Bienvenue dans votre espace de vote. </p> <p>Vous ne pouvez pas voter si vous l'avez déjà fait et si vous n'êtes pas en possession d'un identifiant valide pour ce vote…  </p>
			</div>

			<div class="container">
			  <div class="row">


<form class="col s12"  action="/enregistrement/save" method="post">
	
	<div class="row">

					<div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">perm_identity</i>
			          <input id="identifiant" name="identifiant" type="text" class="validate" required>
			          <label for="identifiant">Identifiant</label>
			        </div>    
			      </div>

			        <div class="input-field col s6">
			        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">account_circle</i>
			          	<input id="first_name" name="firstname" type="text" class="validate" required>
			          	<label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" name="lastname" type="text" class="validate" required>
			          <label for="last_name">Last Name</label>
			        </div>
			      </div>
			     
					<?php foreach($candidats as $candidat) { ?>
						<div class="row">
				     	 <div class="input-field col s6 offset-s3">
						    <select <?php $nom = $candidat->name; $id = $candidat->id; print("id ='$id' name = '$id'");?> required>
						      <option value="AR" selected>Choisir sa note</option>
						      <option value="TB">Très Bien</option>
						      <option value="B">Bien</option>
						      <option value="AB">Assez Bien</option>
						      <option value="P">Passable</option>
						      <option value="I">Insuffissant</option>
						      <option value="AR" >À rejeter</option>
						    </select>
						    <label <?php print("for='$id'"); ?>><?php echo htmlspecialchars($nom); ?></label>
						</div>
				      </div>
					<?php } ?>

			    <div class="row center">
					  <button type='submit' class="btn waves-effect waves-blue light-blue lighten-2 ">voter
    					<i class="material-icons right">send</i>
    					</button>
  				</div>
    
			</div>
</form>

		</div>
	</div>

 		<?php require 'footer.php'; ?>

 			<?php require_once('contents/script.php'); ?>
				
	</body>


	

       

</html>