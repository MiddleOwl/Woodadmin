<?php

    include(dirname(__FILE__)."/../models/woodiens.php");
    $woodiens = recup_woodiens();
	function conversionDate($dateAConvertir){
		
		$dateScindee = explode("-",$dateAConvertir);
		$dateConvertie = $dateScindee[2].'/'.$dateScindee[1].'/'.$dateScindee[0];
		return($dateConvertie);
		
	}
	
    include(dirname(__FILE__)."/../views/woodiens.php");
	
?>

