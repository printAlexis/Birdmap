<?php
include "../animalDB.php";
session_start();

if(isset($_POST['id']) && isset($_SESSION['connected'])){
    

    AnimalDB::removeFavorite($_POST['id'],$_SESSION['username']);
}

?>