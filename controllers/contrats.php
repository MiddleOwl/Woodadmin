<?php
session_start();

if(isset($_SESSION['prenom'])){//la page n'est accessible qu'aux users connectés

	include(dirname(__FILE__)."/../models/contrats.php");
	$contrats=recup_contrats();


	include(dirname(__FILE__)."/../views/contrats.php");
}
else{
	header('Location:index.php');
}

?>