<?php
include_once '../animalDB.php';
AnimalDB::modifStudy($_POST["id"],$_POST["text"],$_POST["desc"])
?>