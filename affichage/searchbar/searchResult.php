<?php
include_once '../../db/animalDB.php';



if(isset($_GET['text'])){
    $text = (String) trim($_GET['text']);

    $etudes = animalDB::getStudieByText($text,30);

}

else{
    $etudes = animalDB::getStudies(" ");
}

foreach ($etudes as $studie) {
    echo("<div class='study-container'><a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
            <p value=".$studie['Id_Etude'].">".$studie['NomEtude']."</p>
            </a>
            <button class='modif'  value=".$studie['Id_Etude']." type='button'>Proposer une modification</button>
            <span></span>
        </div>");
    }
?>