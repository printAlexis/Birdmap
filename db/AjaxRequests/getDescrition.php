<?php
include_once "../animalDB.php";

if(isset($_GET['name'])){
    $result = AnimalDB::getAnimalDescription($_GET['name']);
    echo(" 
    <div class='description'>
        <h3 class='description--title'>".$_GET['name']."</h3>
        <img class='description--img' src='".$result['path']."' alt='description image'>
        <p class='description--text'>".$result['Texte_']."</p>
    </div>");
}
?>