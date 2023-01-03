<?php
include_once "../db/animalDB.php";
if (isset($_REQUEST['username'], $_REQUEST['password'])){
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  session_start();
  // Exécuter la requête sur la base de données
    if(AnimalDB::isConnexion($username,$password)){
        $_SESSION['connected'] = 'true';
        $_SESSION['username'] = $username;

        header('Location: ../index.php');
        
    }
    else{
      
      $_SESSION['post_data'] = "wrong";
      header('Location: login.php');
      
    }
}
else{
    header('Location: login.php');
}
?>