<<<<<<< HEAD
<?php
include_once '../animalDB.php';

if(AnimalDB::addAnimal($_POST["name"])){
    echo "création d'un nouvel animal en bd"; 
}
else{
    echo "animal déjà existant";
=======
<?php
include_once '../animalDB.php';

if(AnimalDB::addAnimal($_POST["name"])){
    echo "création d'un nouvel animal en bd"; 
}
else{
    echo "animal déjà existant";
>>>>>>> fbc9e54a077b3be9cf7024bd5bf830839fc50965
}