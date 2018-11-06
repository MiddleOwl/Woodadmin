<?php

function get_salaire($id){
	include(dirname(__FILE__)."/../hidden/connexion.php");
	$query=$bdd->query('SELECT*FROM salaires WHERE id='.$id);
	$salaire=$query->fetch();
	$query->closeCursor();
	return($salaire);
}

function create_salaire($annee,$montant,$idContrat){
	include(dirname(__FILE__)."/../hidden/connexion.php");
	$query=$bdd->query('INSERT INTO salaires (annee,montant,idContrat) VALUES ("'.$annee.'","'.$montant.'","'.$idContrat.'")');
}
	
?>