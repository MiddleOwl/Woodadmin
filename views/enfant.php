<?php $title='Enfant';?>
<?php ob_start(); ?>
<?php include(dirname(__FILE__)."/../includes/nav.php"); ?>
<?php $nav = ob_get_clean(); ?>
<?php ob_start(); ?>

	<section id="flexStart">
	
		<div class="boutons">
			<input id="deleteEnfant" type="button" name="delete" value="Supprimer"></input>
			<input id="saveEnfant" type="button" name="update" value="Enregistrer"></input>
		</div>
		
		<div id="infosEnfant">
			<p><strong>Prénom: </strong>
				<?php
					$valuePrenom = $_GET['action']='read'?$enfant['prenom']:'';
					echo("<input id='firstName' class='modif' type=text value=".$valuePrenom."></input>");
				?>
			</p>
			<p><strong>Nom: </strong>
				<?php
					$valueNom= $_GET['action']='read'?$enfant['nom']:'';
					echo("<input id='name' class='modif' type=text value=".$valueNom."></input>");
				?>
			</p>
			<p><strong>Date de naissance: </strong>
				<?php
					$valueDateOfBirth = $_GET['action']='read'?$enfant['dateOfBirth']:'';
					echo("<input id='dateOfBirth' class='modif' type=date value=".$valueDateOfBirth."></input>");
				?>
			</p>
		</div>
		
	</section>


<?php $content = ob_get_clean(); ?>
<?php include(dirname(__FILE__)."/../templates/template.php"); ?>