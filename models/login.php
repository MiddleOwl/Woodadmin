<?php 
    function check_admin($data){
        $result = array();
        include(dirname(__FILE__)."/../hidden/connexion.php");
        $req=$bdd->prepare('SELECT accesAdmin FROM woodiens WHERE login=? AND password=?');
        $req->execute(array($_POST['login'], $_POST['password']));
        $result[] = $req->fetch();
        $req->closeCursor();
        return($result);
    }
?>

