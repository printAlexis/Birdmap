<?php
include_once '../animalDB.php';
session_start();
$study = isset($_GET['user']) ?  AnimalDB::getUserStudy($_SESSION['username']) : AnimalDB::getAllStudy();

foreach ($study as $studie) {
    
    echo("<div class='study-container'><a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
            <h2 value=".$studie['Id_Etude'].">".$studie['NomEtude']."</h2>
            <p value=".$studie['Id_Etude'].">".$studie['DescriptionEtude']."</p>
           
            <a class='delete--study' href='db/deleteStudy.php?id=".$studie['Id_Etude']."'>Supprimer l'étude</a>
            <span class='bar'></span>
        </div>
        ");
    }

?>