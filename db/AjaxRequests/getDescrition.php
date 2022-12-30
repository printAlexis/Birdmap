<<<<<<< HEAD
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
=======
<?php
include_once "../animalDB.php";

if(isset($_GET['name'])){
    echo($_GET['name']);
    var_dump(AnimalDB::getAnimalDescription($_GET['name']));
}
>>>>>>> fbc9e54a077b3be9cf7024bd5bf830839fc50965
?>