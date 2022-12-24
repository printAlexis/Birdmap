<?php
include_once '../animalDB.php';

if(AnimalDB::addAnimal($_POST["name"])){
    echo "création d'un nouvel animal en bd"; 
}
else{
    echo "animal déjà existant";
}