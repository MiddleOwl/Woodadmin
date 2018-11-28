<?php
	
	

	function recup_contrats(){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$contrats=array();
		$query=$bdd->query('SELECT*FROM contrats');
		while($data=$query->fetch()){
			$contrats[]=$data;
		};
		$query->closeCursor();
		return($contrats);
	}
		
	function recup_contrat($id){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query('SELECT * FROM contrats WHERE id='.$id);
		$contrat=$query->fetch();
		$query->closeCursor();
		return ($contrat);
	}
	
	
	function get_type_contrat(){		
		include(dirname(__FILE__)."/../hidden/connexion.php");	
		$typeContrats=array();
		$query=$bdd->query('SELECT * FROM type_contrat');
		while($data=$query->fetch()){
			$typeContrats[]=$data;
		}				
		$query->closeCursor();
		return($typeContrats);		
		
	}
	
	function get_contrats_emergency(){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		
		$dateDuJour = date_create(date('Y-m-d'));
		$dateLimite	= clone $dateDuJour;// on clone dateDuJour pour éviter la modification dans la méthode suivante
		$dateLimite	= date_add($dateLimite,date_interval_create_from_date_string('30 days'));//ajout de 30 jours à dateLimite
		$dateLimite = $dateLimite->format('Y-m-d');
		
		$contratsEmergency=array();
		$query=$bdd->query('SELECT * FROM contrats WHERE (finPeriodeEssai<"'.$dateLimite.'"AND finPeriodeEssai!= "00/00/0000") OR (dateFin<"'.$dateLimite.'" AND dateFin!="00/00/0000")');
		while($data=$query->fetch()){
			
			$contratsEmergency[]=$data;
		}	
		
		$query->closeCursor();
		
		
		return($contratsEmergency);		
	}
	
	
	function get_woodien_from_contrat($idWoodien){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query('SELECT nom,prenom FROM woodiens WHERE id='.$idWoodien);
		$woodien=$query->fetch();
		$query->closeCursor();
		return($woodien);
	}
	
	function get_id_type_contrat_from_nom_type($nomTypeContrat){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query('SELECT id FROM type_contrat WHERE nom="'.$nomTypeContrat.'"');
		$idTypeContrat=$query->fetch();
		$query->closeCursor();
		return($idTypeContrat);
	}
	
	function get_nom_type_from_id($id){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query('SELECT nom FROM type_contrat WHERE id='.$id);
		$nomType=$query->fetch();
		$query->closeCursor();
		return($nomType);
	}
	
	function get_recruteurs(){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$recruteurs=array();
		$query=$bdd->query('SELECT id,prenom,nom FROM woodiens');
		while($data=$query->fetch()){
			$recruteurs[]=$data;
		}
		$query->closeCursor();
		return($recruteurs);
	}
	
		
	function get_salaires_from_contrat($idContrat){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$salaires=array();
		$query=$bdd->query('SELECT s.* FROM salaires AS s INNER JOIN contrats AS c ON s.idContrat=c.id WHERE c.id='.$idContrat);
		while($data=$query->fetch()){
			
			$salaires[]=$data;
		}
		$query->closeCursor();
		return($salaires);
	}
	
		
	
	function get_id_recruteur_metier_from_prenom($recruteurMetier){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		
		$query=$bdd->query('SELECT id FROM woodiens WHERE prenom="'.$recruteurMetier.'"');
		$idRecruteurMetier=$query->fetch();
		$query->closeCursor();
		return($idRecruteurMetier);
	}
	
	function get_id_recruteur_RE_from_prenom($recruteurRaisonEtre){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		
		$query=$bdd->query('SELECT id FROM woodiens WHERE prenom="'.$recruteurRaisonEtre.'"');
		$idRecruteurRE=$query->fetch();
		$query->closeCursor();
		return($idRecruteurRE);
	}
	
	function get_id_recruteur_integ_from_prenom($recruteurIntegration){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		
		$query=$bdd->query('SELECT id FROM woodiens WHERE prenom="'.$recruteurIntegration.'"');
		$idRecruteurInteg=$query->fetch();
		$query->closeCursor();
		return($idRecruteurInteg);
	}
	
	function create_contrat($idWoodien,$numContrat,$idTypeContrat,$dateDebut,$dateFin,$comment,$periodeEssaiDuree,$periodeEssaiUniteTemps,$debutPeriodeEssai,$finPeriodeEssai,$idRecruteurMetier,$idRecruteurRE,$idRecruteurInteg,$statut,$categorie,$forfait,$echelon,$coefficient,$presence,$ratioTempsPartiel,$lieuDeTravail){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->exec('INSERT INTO contrats
			(idWoodien,numContrat,typeContrat,dateDebut,dateFin,commentaire,periodeEssaiDuree,periodeEssaiUniteDeTemps,debutPeriodeEssai,finPeriodeEssai,recruteurMetier,recruteurRaisonEtre,recruteurIntegration,statut,categorie,forfait,echelon,coefficient,presence,ratioTempsPartiel,lieuDeTravail)
			VALUES (
			"'.$idWoodien.'",
			"'.$numContrat.'",
			"'.$idTypeContrat.'",
			"'.$dateDebut.'",
			"'.$dateFin.'",
			"'.$comment.'",
			"'.$periodeEssaiDuree.'",
			"'.$periodeEssaiUniteTemps.'",
			"'.$debutPeriodeEssai.'",
			"'.$finPeriodeEssai.'",
			"'.$idRecruteurMetier.'",
			"'.$idRecruteurRE.'",
			"'.$idRecruteurInteg.'",
			"'.$statut.'",
			"'.$categorie.'",
			"'.$forfait.'",
			"'.$echelon.'",
			"'.$coefficient.'",
			"'.$presence.'",
			"'.$ratioTempsPartiel.'",
			"'.$lieuDeTravail.'")
			');
	}
	function delete_contrat($id){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query('DELETE FROM contrats WHERE id='.$id);
	}
	
	function update_contrat($id,$numContrat,$idTypeContrat,$dateDebut,$dateFin,$motifFinContrat,$comment,$periodeEssaiDuree,$periodeEssaiUniteTemps,$debutPeriodeEssai,$finPeriodeEssai,$recruteurM,$recruteurI,$recruteurRE,$statut,$categorie,$forfait,$echelon,$coefficient,$presence,$ratioTempsPartiel,$lieuDeTravail){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->exec('
			UPDATE contrats SET
			numContrat="'.$numContrat.'",
			typeContrat="'.$idTypeContrat.'",
			dateDebut="'.$dateDebut.'",
			dateFin="'.$dateFin.'",
			motifFinContrat="'.$motifFinContrat.'",
			commentaire="'.$comment.'",
			periodeEssaiDuree="'.$periodeEssaiDuree.'",
			periodeEssaiUniteDeTemps="'.$periodeEssaiUniteTemps.'",
			debutPeriodeEssai="'.$debutPeriodeEssai.'",
			finPeriodeEssai="'.$finPeriodeEssai.'",
			recruteurMetier="'.$recruteurM.'",
			recruteurIntegration="'.$recruteurI.'",
			recruteurRaisonEtre="'.$recruteurRE.'",
			statut="'.$statut.'",
			categorie="'.$categorie.'",
			forfait="'.$forfait.'",
			echelon="'.$echelon.'",
			coefficient="'.$coefficient.'",
			presence="'.$presence.'",
			ratioTempsPartiel="'.$ratioTempsPartiel.'",
			lieuDeTravail="'.$lieuDeTravail.'"
			
			WHERE id='.$id);
	}
?>