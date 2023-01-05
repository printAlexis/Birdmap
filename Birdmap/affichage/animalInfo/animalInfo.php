<?php
include_once '../db/AnimalDB.php';
if(isset($_GET['animalName'])){
    $data =AnimalDB::getAnimal($_GET['animalName']);
    
}