<?php 
    include(dirname(__FILE__)."/../models/login.php");
    $success = check_admin($_POST);
    $back = array('backup' => '');
    
    if($success[0]['accesAdmin'] == 1){
        $back['backup'] = 'ok';
        echo(json_encode($back));
	}
    else{
        $back['backup'] = 'nook';
        echo(json_encode($back));
    }
   /* 
    if (empty($result)){
        header('Location:../index.php');
    }
    else{
        if($result['accesAdmin']==true){
            header('Location:../index.php?page=portail_admin');
        }
        else{
            header('Location:../index.php');				
        }
    }		
    */
?>

