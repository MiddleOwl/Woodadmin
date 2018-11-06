<?php

	include(dirname(__FILE__)."/../models/woodiens.php");
	$situationMatri = get_situation_matri();
	$action=$_GET['action'];	
    switch($action){
		
		case 'read':
			$woodien = recup_woodien($_GET["id"]);
			$enfants = enfants_from_woodien($_GET["id"]);
			$contrats = contrats_from_woodien($_GET["id"]);
			function conversionDate($dateAConvertir){
				
				$dateScindee = explode("-",$dateAConvertir);
				$dateConvertie = $dateScindee[2].'/'.$dateScindee[1].'/'.$dateScindee[0];
				return($dateConvertie);
			}
			$qualifs = qualifs_from_woodien($_GET["id"]);
			include(dirname(__FILE__)."/../views/infos_woodien.php");
		break;
		
		case 'create':
			
			include(dirname(__FILE__)."/../views/new_woodien.php");
	
		break;
		
		case 'insert':			
	
			$idSituation = getIdSituationFromNameSituation($_POST['situation'])[0];			
			$dateNull='0000-00-00';
			$dateNaissance = $_POST['dateOfBirth']==''? $dateNull : $_POST['dateOfBirth'];
			
			create_woodien(
				$_POST['sexe'],
				$_POST['name'],
				$_POST['firstname'],
				$idSituation,
				$dateNaissance,
				$_POST['lieuDeNaissance'],
				$_POST['adresse'],
				$_POST['codePostal'],
				$_POST['ville'],
				$_POST['tel'],
				$_POST['portable'],
				$_POST['travailleurHandicape']
								
			);
			echo($_POST['firstname'].' a bien été ajouté à la liste des Woodiens');
			
		break;
		
		case 'update':
		
			$idSituation=getIdSituationFromNameSituation($_POST['situation'])[0];
			$sex=(isset($_POST['sexe']))? $_POST['sexe']:null;
			$handicap=(isset($_POST['travailleurHandicape']))?$_POST['travailleurHandicape']:null;
			
			update_woodien(
				$_POST['id'],
				$sex,
				$_POST['name'],
				$_POST['firstname'],
				$idSituation,
				$_POST['dateOfBirth'],				
				$_POST['lieuDeNaissance'],
				$_POST['adresse'],
				$_POST['codePostal'],
				$_POST['ville'],
				$_POST['tel'],
				$_POST['portable'],
				$handicap
				
			);
			echo ($_POST['firstname'].' a bien été mis(e) à jour');
			
		break;
		
		case 'delete':
			
			delete_woodien($_POST['id']);
			echo('le woodien a bien été supprimé de la base');
		break;
		
		case 'editPDF':
			
			require('/../fpdf/fpdf.php');
			class PDF extends FPDF{
				function Header(){
					$this->Image('C:\wamp64\www\woodadmin\static\logo_MW.png',10,6,30);
					$this->SetFont('Arial','B',15);
					$this->Cell(80);
					$this->Cell(40,10,'Fiche Woodien',1,0,'C');
					$this->Ln(20);
				}
				function Footer(){
					$this->SetY(-15);
					$this->SetFont('Arial','I',8);
					$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
				}
			}
			$pdf = new PDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','I',22);
			$pdf->Cell(40,10,'Hello World !');
			$pdf->Output();
			
		break;
			
							
	}
	
		

	
	
?>

