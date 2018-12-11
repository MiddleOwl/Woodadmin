<?php 
	session_start();
	include(dirname(__FILE__)."/../models/contrats.php");
	
	$contrat=(isset($_GET['id']))?recup_contrat($_GET['id']):NULL;
		
	$today = strtotime(date("Y-m-d"));
	
		
	if($contrat['typeContrat']==1){
	
		$dateFinCDD=strtotime($contrat['dateFin']);
		$delaiFinCDD=ceil(($dateFinCDD-$today)/86400);
	
	}
	else{
		$delaiFinCDD=NULL;
	}

	if(strtotime($contrat['finPeriodeEssai'])!=0){
		
		$dateFinPE=strtotime($contrat['finPeriodeEssai']);
		$delaiFinPE=ceil(($dateFinPE-$today)/86400);
	}
	else{
		$delaiFinPE=NULL;
	}
	
	
	// $contrat['actionRequise'] = (($delaiFinCDD < 30 AND $delaiFinCDD!=NULL) OR ($delaiFinPE < 30)) ? 1:0;
	// echo ($delaiFinCDD.'  '.$contrat['actionRequise']);

	// if ($contrat['actionRequise']==1){
		// update_actionRequise_from_contrat($_GET['id']); 
	// }
	
			
	
	switch($_GET['action']){
		case 'read':
		
			$typeContrat=get_type_contrat();
			$recruteur=get_recruteurs();
			$salaires=get_salaires_from_contrat($contrat['id']);
		
			$nomWoodien=get_woodien_from_contrat($_GET['idWoodien'])['nom'];
			$prenomWoodien=get_woodien_from_contrat($_GET['idWoodien'])['prenom'];		
			
			include(dirname(__FILE__)."/../views/contrat.php");
			
		break;
		
		case 'create':
			$typeContrat=get_type_contrat();
			$recruteur=get_recruteurs();
			$nomWoodien=get_woodien_from_contrat($_GET['idWoodien'])['nom'];
			$prenomWoodien=get_woodien_from_contrat($_GET['idWoodien'])['prenom'];
				
			include(dirname(__FILE__)."/../views/contrat.php");
		break;
		
		case 'insert':
			$idRecruteurMetier=get_id_recruteur_metier_from_prenom($_POST['recruteurMetier'])['id'];

			$idRecruteurRE=get_id_recruteur_RE_from_prenom($_POST['recruteurRaisonEtre'])['id'];

			$idRecruteurInteg=get_id_recruteur_integ_from_prenom($_POST['recruteurIntegration'])['id'];

			$recruteur=get_recruteurs();

			$idTypeContrat=get_id_type_contrat_from_nom_type($_POST['nomTypeContrat'])['id'];

			$dateNull=null;

			$dateDebut = ($_POST['dateDebut']=='')? $dateNull : $_POST['dateDebut'];
			$dateFin= ($_POST['dateFin']=='')? $dateNull : $_POST['dateFin'];
			$dateDebutPE = ($_POST['debutPeriodeEssai']=='')? $dateNull : $_POST['debutPeriodeEssai'];
			$dateFinPE = ($_POST['finPeriodeEssai']=='')? $dateNull : $_POST['finPeriodeEssai'];
			$dureePE = ($_POST['periodeEssaiDuree']=='')? 0 : $_POST['periodeEssaiDuree'];
			
			create_contrat(
				$_POST['idWoodien'],
				$_POST['numContrat'],
				$idTypeContrat,
				$dateDebut,
				$dateFin,
				$_POST['comment'],				
				$dureePE,
				$_POST['periodeEssaiUniteTemps'],
				$dateDebutPE,
				$dateFinPE,
				$idRecruteurMetier,
				$idRecruteurRE,
				$idRecruteurInteg,				
				$_POST['statut'],
				$_POST['categorie'],
				$_POST['forfait'],
				$_POST['echelon'],
				$_POST['coefficient'],				
				$_POST['presence'],
				$_POST['ratioTempsPartiel'],
				$_POST['lieuDeTravail']
			);
			echo('le contrat '.$_POST['numContrat'].' a bien été enregistré');			
					
			
		break;
		
		case 'update':
		
		
		
			$idRecruteurMetier=get_id_recruteur_metier_from_prenom($_POST['recruteurMetier'])['id'];

			$idRecruteurRE=get_id_recruteur_RE_from_prenom($_POST['recruteurRaisonEtre'])['id'];

			$idRecruteurInteg=get_id_recruteur_integ_from_prenom($_POST['recruteurIntegration'])['id'];

			$recruteur=get_recruteurs();

			$idTypeContrat=get_id_type_contrat_from_nom_type($_POST['nomTypeContrat'])['id'];

			$dateNull='0000-00-00';

			$dateDebut = $_POST['dateDebut']==''? $dateNull : $_POST['dateDebut'];
			$dateFin= $_POST['dateFin']==''? $dateNull : $_POST['dateFin'];
			$dateDebutPE = $_POST['debutPeriodeEssai']==''? $dateNull : $_POST['debutPeriodeEssai'];
			$dateFinPE = $_POST['finPeriodeEssai']=='' ? $dateNull : $_POST['finPeriodeEssai'];
			$_POST['periodeEssaiDuree'] = $_POST['periodeEssaiDuree']=='' ? 0 : $_POST['periodeEssaiDuree'];
			
			update_contrat(
			
				$_POST['id'],
				$_POST['numContrat'],
				$idTypeContrat,
				$dateDebut,
				$dateFin,
				$_POST['motifFinContrat'],
				$_POST['comment'],
				$_POST['periodeEssaiDuree'],
				$_POST['periodeEssaiUniteTemps'],
				$dateDebutPE,
				$dateFinPE,
				$idRecruteurMetier,				
				$idRecruteurInteg,
				$idRecruteurRE,
				$_POST['statut'],
				$_POST['categorie'],
				$_POST['forfait'],
				$_POST['echelon'],
				$_POST['coefficient'],				
				$_POST['presence'],
				$_POST['ratioTempsPartiel'],
				$_POST['lieuDeTravail']				
			
			);
			echo('Le contrat a bien été mis à jour!');
			
		break;
		
		case 'delete':
		
			delete_contrat($_POST['id']);
			echo('Le contrat a bien été supprimé');
		break;	
		
	}
	
	

?>