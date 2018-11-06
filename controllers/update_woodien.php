<?php 

	include(dirname(__FILE__).'/../models/woodiens.php');
	$idSituation=getIdSituationFromNameSituation($_POST['situation'])[0];
	
	update_woodien($_POST['id'],$_POST['name'],$_POST['firstname'],$_POST['dateOfBirth'],$_POST['lieuDeNaissance'],$idSituation);
	echo ('le woodien a bien été mis à jour');
?>