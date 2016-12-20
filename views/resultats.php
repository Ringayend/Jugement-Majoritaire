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
			  <h5 class="blue-text text-lighten-2"> <i class=" medium material-icons">class</i>Resultats</h5>
			  <div class="row center">
			           <p class="center red-text">Résultat temporaire</p>
			           <p class="center black-text">Il s'agit du résultat du <?php echo date("j, n, Y \à H:i") ; ?> (UTC)</p>
			        </div>
			  <div class="container col s12 blue lighten-5 z-depth-1">
			  <div lass="container">
			<div class="container">
				    <div class="section">

					<table class="highlight centered responsive-table"">
				        <thead>
				          <tr>
				              <th data-field="name">Nom</th>
				              <th data-field="TB">Très Bien</th>
				              <th data-field="B">Bien</th>
				              <th data-field="AB">Assez Bien</th>
				              <th data-field="P">Passable</th>
				              <th data-field="I">Insuffisant</th>
				              <th data-field="AR">À rejeter</th>
				              <th data-field="note"> Mention finale</th>
				              <th data-field="note"> Pourcentage des mentions supérieures</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($candidats as $candidat) { ?>
				          <tr>
				            <td><?php echo htmlspecialchars($candidat->name); ?></td>
				            <td><?php echo $candidat->TB; ?></td>
				      		<td><?php echo $candidat->B; ?></td>
				           	<td><?php echo $candidat->AB; ?></td>
				           	<td><?php echo $candidat->P; ?></td>
				           	<td><?php echo $candidat->I; ?></td>
				           	<td><?php echo $candidat->AR; ?></td>
				           	<td><?php echo Candidat::note_global($candidat);?></td>
				           	<td><?php echo round(Candidat::per_sup($candidat), 2);?></td>

				          </tr>
				          <?php } ?>
				        </tbody>
				      </table>
				            
						
				    	      
				    </div>
				  </div>
				  </div>
			</div>
			<div class="row center">
			          <a href="/resultatsExcel" id="download-button" class="btn-large waves-effect waves-light light-grey lighten-2">Télécharger</a>
			        </div>

<?php include("footer.php"); ?>

 <?php require_once('contents/script.php'); ?>
				
	</body>


	
</html>
