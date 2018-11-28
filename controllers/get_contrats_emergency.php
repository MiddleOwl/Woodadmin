<?php
	include(dirname(__FILE__)."/../models/contrats.php");
	$contratsEmergency=get_contrats_emergency();
	$back = "<table>
				<thead>
					<th>Numéro du contrat à traiter</th>
					<th>Woodien titulaire</th>
					<th>Date de fin période d'essai</th>
					<th>Date de fin de contrat</th>
				</thead>
				<tbody><tr>";
				
	function conversionDate($dateAConvertir){
		
		$dateScindee = explode("-",$dateAConvertir);
		$dateConvertie = $dateScindee[2].'/'.$dateScindee[1].'/'.$dateScindee[0];
		return($dateConvertie);
		
	}

	foreach ($contratsEmergency as $cE){
		$idW=$cE[2];
		$back.="<td>";
		$back.="<a href='index.php?page=contrat&action=read&id=".$cE['id']."&idWoodien=".$cE['idWoodien']."'>".$cE['numContrat']."</a>";
		$back.="</td><td>";
		$back.=get_woodien_from_contrat($idW)[1];
		$back.="</td><td>";
		$back.=conversionDate($cE['finPeriodeEssai']);
		$back.="</td><td>";
		$back.=conversionDate($cE['dateFin']);
		$back.="</td></tr>";
	}
	
	$back.="</tbody></table>";
	echo($back);
	
	
?>