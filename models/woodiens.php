<?php
    function recup_woodiens(){
        $woodiens = array();
        include(dirname(__FILE__)."/../hidden/connexion.php");
        $query = $bdd->query("SELECT * FROM woodiens ORDER BY nom ASC");
        while($data = $query->fetch()){
            $woodiens[] = $data;
        }
        $query->closeCursor();
        return($woodiens);
    }
	function get_situation_matri(){
		$situationMatri = array();
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query("SELECT id,nom FROM situation_matri");
		while($data = $query->fetch()){
			$situationMatri[]=$data;
		}
		$query->closeCursor();
		return($situationMatri);
	}
	function getIdSituationFromNameSituation($nomSituation){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->query('SELECT id FROM situation_matri WHERE nom="'.$nomSituation.'"');
		$idSituation=$query->fetch();		
		$query->closeCursor();		
		return($idSituation);
		
	}
			
	function create_woodien($sexe,$nom,$prenom,$idSituation,$dateOfBirth,$lieuDeNaissance,$adresse,$codepostal,$ville,$tel,$portable,$travailleurHandicape){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->exec('INSERT INTO woodiens (sexe,nom,prenom,situationMaritale,dateOfBirth,lieuDeNaissance,adresse,codePostal,ville,tel,portable,travailleurHandicape)
		VALUES ("'.$sexe.'","'.$nom.'","'.$prenom.'","'.$idSituation.'","'.$dateOfBirth.'","'.$lieuDeNaissance.'","'.$adresse.'","'.$codepostal.'","'.$ville.'","'.$tel.'","'.$portable.'","'.$travailleurHandicape.'")');
		return($prenom);
	}
	
	function delete_woodien($id){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->exec("DELETE FROM woodiens WHERE id=".$id);
	}
	
	function update_woodien($id,$sexe,$name,$firstname,$idSituation,$dateOfBirth,$lieuDeNaissance,$adresse,$codepostal,$ville,$tel,$portable,$travailleurHandicape){
		include(dirname(__FILE__)."/../hidden/connexion.php");
		$query=$bdd->exec('UPDATE woodiens SET 
			sexe= "'.$sexe.'",
			nom= "'.$name.'",
			prenom= "'.$firstname.'",
			situationMaritale= "'.$idSituation.'",
			dateOfBirth="'.$dateOfBirth.'",
			lieuDeNaissance="'.$lieuDeNaissance.'",
			adresse="'.$adresse.'",
			codePostal="'.$codepostal.'",
			ville="'.$ville.'",
			tel="'.$tel.'",
			portable="'.$portable.'",
			travailleurHandicape="'.$travailleurHandicape.'"
			WHERE id='.$id);
	}

    function recup_woodien($id){
        include(dirname(__FILE__)."/../hidden/connexion.php");
        $query = $bdd->query("SELECT * FROM woodiens WHERE id=".$id);
        $woodien = $query->fetch();
        $query->closeCursor();
        return($woodien);
    }

    function enfants_from_woodien($id){
        $enfants = array();
        include(dirname(__FILE__)."/../hidden/connexion.php");
        $query = $bdd->query("SELECT e.* FROM enfants AS e INNER JOIN woodiens AS w ON e.idWoodien=w.id WHERE w.id=".$id);
        while($data = $query->fetch()){
            $enfants[] = $data;
        }
        $query->closeCursor();
        return($enfants);
    }

    function contrats_from_woodien($id){
        $contrats = array();		
        include(dirname(__FILE__)."/../hidden/connexion.php");
        $query = $bdd->query("SELECT c.*, t.nom FROM contrats AS c INNER JOIN woodiens AS w ON c.idWoodien=w.id INNER JOIN type_contrat AS t ON t.id = c.typeContrat WHERE w.id=".$id);
        while($data = $query->fetch()){
			$contrats[] = $data;
		}
		$query->closeCursor();
        return($contrats);
				
    }
		

    function qualifs_from_woodien($id){
        $qualifs = array();
        include(dirname(__FILE__)."/../hidden/connexion.php");
        $query = $bdd->query("SELECT q.* FROM qualifications AS q INNER JOIN woodiens AS w ON q.idWoodien=w.id WHERE w.id=".$id);
        while($data = $query->fetch()){
            $qualifs[] = $data;
        }
        $query->closeCursor();
        return($qualifs);
    }
?>