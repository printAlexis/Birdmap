<?php
include "../animalDB.php";
session_start();
if(isset($_POST['id']) && isset($_SESSION['connected'])){
    AnimalDB::addFavorite($_POST['id'],$_SESSION['username']);
}

?>