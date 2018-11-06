<?php
    include(dirname(__FILE__)."/../models/contrats.php");
	$contratsATraiter= get_Contrats_A_Traiter();
	
	
	include(dirname(__FILE__)."/../views/portail_admin.php");
?>
