<?php 
	session_start();
    include(dirname(__FILE__)."/../models/login.php");
    $success = check_admin($_POST);	
	
    $_SESSION['prenom']= $success[0]['prenom'];
	$_SESSION['nom'] = $success[0]['nom'];
	$back = array('backup' => '');
	
    if($success[0]['accesAdmin'] == 1){
			
	
        $back['backup'] = 'ok';
		echo(json_encode($back));
		
		
	}
    else{
        $back['backup'] = 'nook';
        echo(json_encode($back));
    }
	
 
?>

