<?php
include_once "../animalDB.php";

if(isset($_GET['name'])){
    echo($_GET['name']);
    var_dump(AnimalDB::getAnimalDescription($_GET['name']));
}
?>