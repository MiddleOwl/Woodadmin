<?php 

	
	
    include(dirname(__FILE__)."/../models/login.php");
    $success = check_admin($_POST);	
	
    $prenomUser = $success[0]['prenom'];
	$nomUser = $success[0]['nom'];
	$back = array('backup' => '','prenom' => $prenomUser,'nom' => $nomUser);
	
    if($success[0]['accesAdmin'] == 1){
			
	
        $back['backup'] = 'ok';
		echo(json_encode($back));
		
		
	}
    else{
        $back['backup'] = 'nook';
        echo(json_encode($back));
    }
	
 
?>

