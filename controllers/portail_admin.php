<?php

	session_start();
	
	$_SESSION['prenom']=$_GET['user'];	
    include(dirname(__FILE__)."/../models/contrats.php");	
		$contratsEmergency=get_contrats_emergency();
	include(dirname(__FILE__)."/../views/portail_admin.php");
?>
