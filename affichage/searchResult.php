<?php
include '../db/animalDB.php';
$etudes;
echo("<script>console.log('tedzadzast')</script>");

echo($_GET['text']);
if(isset($_GET['text'])){
    $text = (String) trim($_GET['text']);

    $etudes = animalDB::getStudieByText('movements',30);

}

else{
    $etudes = animalDB::getStudies(30);
}

foreach ($etudes as $studie) {
    echo("<a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
        <p>".$studie['NomEtude']."</p>
        </a>");
    }
?>