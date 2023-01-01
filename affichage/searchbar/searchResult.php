<?php
include_once '../../db/animalDB.php';
session_start();


if(isset($_GET['text'])){
    $text = (String) trim($_GET['text']);

    $etudes = animalDB::getStudieByText($text,30);

}

else{
    $etudes = animalDB::getStudies(" ");
}
// $star = isset($_SESSION['connected']) ? "<span class='fa fa-star unchecked'></span>" : "";
foreach ($etudes as $studie) {
    echo("<div class='study-container'><a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
            <p value=".$studie['Id_Etude'].">".$studie['NomEtude']."</p>
            </a>
            <span class='fa fa-star unchecked' value=".$studie['Id_Etude']."></span>
            <button class='modif'  value=".$studie['Id_Etude']." type='button'>Proposer une modification</button>
            <span class='bar'></span>
        </div>
        ");
    }

?>