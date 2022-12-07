<?php
include '../db/animalDB.php';



if(isset($_GET['text'])){
    $text = (String) trim($_GET['text']);

    $etudes = animalDB::getStudieByText($text,30);

}

else{
    $etudes = animalDB::getStudies(" ");
}

foreach ($etudes as $studie) {
    echo("<a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
        <p>".$studie['NomEtude']."</p>
        </a>");
    }
?>