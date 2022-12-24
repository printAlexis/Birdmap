<?php
include_once "../db/animalDB.php";
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  $username = $_REQUEST['username'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  // Exécuter la requête sur la base de données
    if(AnimalDB::createUser($username,$email,$password)){
        header('Location: login.php');
    }
    else{
      session_start();
      $_SESSION['post_data'] = "wrong";
      header('Location: register.php');
      
    }
}
else{
    header('Location: register.php');
}
?>