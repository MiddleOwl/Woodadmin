<?php $title='Salaire';?>
<?php ob_start(); ?>
<?php include(dirname(__FILE__)."/../includes/nav.php"); ?>
<?php $nav = ob_get_clean(); ?>
<?php ob_start(); ?>

	<section id="flexStart">
	
		<div class="boutons">
			<input id="deleteSalaire" type="button" name="delete" value="Supprimer"></input>
			<input id="saveSalaire" type="button" name="update" value="Enregistrer"></input>
		</div>
		
		<div id="infosSalaire">
			<p><strong>Année: </strong>
				<?php
					$valueAnnee = ($_GET['action']=='read')?$salaire['annee']:'';
					
					echo("<input id='anneeSalaire' class='modif' type='number' min='1950' max='2050' value=".$valueAnnee."></input>");
				?>
			</p>
			<p><strong>Montant: </strong>
				<?php
					$valueMontant= ($_GET['action']=='read')?$salaire['montant']:'';
					
					echo("<input id='montantSalaire' class='modif' type='number' step='0.01' value=".$valueMontant."></input> €");
				?>
			</p>			
		</div>		
	</section>


<?php $content = ob_get_clean(); ?>
<?php include(dirname(__FILE__)."/../templates/template.php"); ?>