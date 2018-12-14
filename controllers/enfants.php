<?php 
	session_start();
	if(isset($_SESSION['prenom'])){
		include(dirname(__FILE__).'/../models/enfants.php');
		$enfant=isset($_GET['id'])?recup_enfant($_GET['id']):NULL;
		
		switch($_GET['action']){
			case 'read':				
				include(dirname(__FILE__).'/../views/enfant.php');
				$enfant=recup_enfant($_GET['id']);
			break;
			case 'create':
				include(dirname(__FILE__).'/../views/enfant.php');
			break;
			case 'update':
				update_enfant(
					$_POST['id'],
					$_POST['name'],
					$_POST['firstname'],
					$_POST['dateOfBirth']					
				);
				echo('L\'enfant '.$_POST['firstname'].' '.$_POST['name'].' a bien été mis à jour');
			break;
			case 'insert':
				create_enfant(
					$_POST['name'],
					$_POST['firstname'],
					$_POST['dateOfBirth'],
					$_POST['idWoodien']
				);
				echo('L\'enfant '.$_POST['firstname'].''.$_POST['name'].' a bien été ajouté');
			break;
			case 'delete':
				delete_enfant($_POST['id']);
				echo('L\'enfant '.$enfant['firstname'].''.$enfant['name'].' a bien été supprimé');
			break;
				
		}
	}
	else{
		header('Location:index.php');
	}
		
	

?>

