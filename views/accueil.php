<?php $title = "Accueil"; ?>

<?php $nav = ""; ?>

<?php ob_start(); ?>
	<div id="raisondetre">
		<p>Au nom du Bois</p>
	</div>
    <div id="form">
        <p><label for="login">Ton identifiant:</label><br />
            <input type="text" name="login" id="login"  size="28" placeholder="prenom.nom@mobilwood.com" required/></p>
        <p><label for="password">Ton mot de passe:</label><br />
            <input type="password" name="password" id="password" size="28" required/></p>
            
        <input id='bouton_connexion' type="submit" value="Se connecter">		
    </div>
	<div id="resultConnexion"></div>
	
<?php $content = ob_get_clean(); ?>

<?php include(dirname(__FILE__)."/../templates/template.php"); ?>

