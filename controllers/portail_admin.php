<?php
	session_start();
	
	if(isset($_SESSION['prenom'])){//la page n'est accessible qu'aux users connectés
		include(dirname(__FILE__)."/../models/contrats.php");	
		$contratsEmergency=get_contrats_emergency();
		include(dirname(__FILE__)."/../views/portail_admin.php");
	}
	
	else{
		header('Location:index.php');
	}
?>
