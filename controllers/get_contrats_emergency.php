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
	foreach ($contratsEmergency as $cE){
		
		$back.="<td>";
		$back.=$cE['numContrat'];
		$back.="</td><td>";
		$back.=$cE['idWoodien'];
		$back.="</td><td>";
		$back.=$cE['finPeriodeEssai'];
		$back.="</td><td>";
		$back.=$cE['dateFin'];
		$back.="</td></tr>";
	}
	
	$back.="</tbody></table>";
	echo($back);
	
	
?>