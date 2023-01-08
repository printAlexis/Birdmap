<?php
include "../animalDB.php";
session_start();

if(isset($_POST['id']) && isset($_SESSION['connected'])){
    $path = realpath("../study/json/")."/".$_GET['id'].".json";
    if (file_exists($path)) {
        unlink($path);
    }
    AnimalDB::removeFavorite($_POST['id'],$_SESSION['username']);
}

?>