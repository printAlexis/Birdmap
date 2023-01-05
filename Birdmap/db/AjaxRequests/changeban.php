<?php
include_once "../animalDB.php";
if(isset($_GET['name'])){
    echo($_GET['name']);
    AnimalDB::changeBan($_GET['name']);
}

?>