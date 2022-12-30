<<<<<<< HEAD
<?php
include_once '../db/AnimalDB.php'
if(isset($_GET['animalName'])){
    $data =AnimalDB::getAnimal($_GET['animalName']);
    
=======
<?php
include_once '../db/AnimalDB.php'
if(isset($_GET['animalName'])){
    $data =AnimalDB::getAnimal($_GET['animalName']);
    
>>>>>>> fbc9e54a077b3be9cf7024bd5bf830839fc50965
}