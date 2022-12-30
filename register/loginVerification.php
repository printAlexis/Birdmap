<<<<<<< HEAD
<?php
include_once "../db/animalDB.php";
if (isset($_REQUEST['username'], $_REQUEST['password'])){
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  // Exécuter la requête sur la base de données
    if(AnimalDB::isConnexion($username,$password)){
        header('Location: ../index.php');
    }
    else{
      session_start();
      $_SESSION['post_data'] = "wrong";
      header('Location: login.php');
      
    }
}
else{
    header('Location: login.php');
}
=======
<?php
include_once "../db/animalDB.php";
if (isset($_REQUEST['username'], $_REQUEST['password'])){
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  // Exécuter la requête sur la base de données
    if(AnimalDB::isConnexion($username,$password)){
        header('Location: ../index.php');
    }
    else{
      session_start();
      $_SESSION['post_data'] = "wrong";
      header('Location: login.php');
      
    }
}
else{
    header('Location: login.php');
}
>>>>>>> fbc9e54a077b3be9cf7024bd5bf830839fc50965
?>