<?php
	include("/../hidden/connexion.php");
	$query=$bdd->prepare('
		SELECT q.*
		FROM qualifications AS q
		INNER JOIN woodiens AS w
		ON q.idWoodien= w.id
		WHERE w.id=?'
	);
	$query->execute(array($_GET['id']));
		
?>