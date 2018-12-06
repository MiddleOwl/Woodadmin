<?php $title = "Portail administrateur"; ?>

<?php ob_start(); ?>
    <?php include(dirname(__FILE__)."/../includes/nav.php"); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php 
        echo("<div id='welcome'>Bienvenue sur le portail admin ".$_SESSION['prenom']." !</div>");
	?>
	<div id="flexStart">	
		
		<p id="actionRequise"> Tu as une action requise pour les contrats suivants: </p>
		<div id="bordsarrondis">
			<div id="contratsATraiter"></div>
		</div>
		
	</div>
	
<?php $content = ob_get_clean(); ?>

<?php include(dirname(__FILE__)."/../templates/template.php"); ?>
