<?php
	session_start();
	echo($_SESSION['prenom']);
	include(dirname(__FILE__)."/../views/accueil.php");
?>

