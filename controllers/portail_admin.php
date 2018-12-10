<?php

	session_start();
	
	
    include(dirname(__FILE__)."/../models/contrats.php");	
		$contratsEmergency=get_contrats_emergency();
	include(dirname(__FILE__)."/../views/portail_admin.php");
?>
