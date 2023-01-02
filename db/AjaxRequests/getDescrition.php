<?php
include_once "../animalDB.php";

if(isset($_GET['name'])){
    $result = AnimalDB::getAnimalDescription($_GET['name']);
    $src = $result['path'] == "" ? "img/animals/default.jpg" : $result['path'];
    $text = $result['Texte_'] == "" ? "pas de description de l'animal pour l'instant" : $result['Texte_'];
    echo(" 
    <div class='description'>
        <h3 class='description--title'>".$_GET['name']."</h3>
        <img class='description--img' src='".$src."' alt='description image'>
        <p class='description--text'>".$text."</p>
        <button class='modifierAnimal'>ModifierAnimal</button>
    </div>");
}

?>