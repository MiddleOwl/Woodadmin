<?php
	
	function recup_enfant($id){
		include(dirname(__FILE__).'/../hidden/connexion.php');
		$query=$bdd->query('SELECT * FROM enfants WHERE id='.$id);
		$enfant=$query->fetch();
		$query->closeCursor();
		return($enfant);
	}

	function create_enfant($prenom,$nom,$dateOfBirth,$idWoodien){
		include(dirname(__FILE__).'/../hidden/connexion.php');
		$query=$bdd->query('INSERT INTO enfants (prenom,nom,dateOfBirth,idWoodien) VALUES ("'.$prenom.'","'.$nom.'","'.$dateOfBirth.'","'.$idWoodien.'")');
	}
	
	function update_enfant($id,$nom,$prenom,$dateOfBirth){
		include (dirname(__FILE__).'/../hidden/connexion.php');
		$query=$bdd->query('UPDATE enfants SET nom ="'.$nom.'",prenom="'.$prenom.'",dateOfBirth="'.$dateOfBirth.'" WHERE id='.$id);		
	}
	function delete_enfant($id){
		include(dirname(__FILE__).'/../hidden/connexion.php');
		$query=$bdd->query('DELETE FROM enfants WHERE id='.$id);
	}
	
?>

