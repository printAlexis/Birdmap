<?php
include_once '../../db/animalDB.php';
session_start();


if(isset($_GET['text'])){
    $text = (String) trim($_GET['text']);
    $limit = 30;
    if(isset($_SESSION['connected'])){
        $favEtudes = animalDB::getfavStudieByText($text,$limit,$_SESSION['username']);
        $etudes = animalDB::getStudieByText($text,$limit - sizeof($favEtudes));
    }
    $etudes = animalDB::getStudieByText($text,$limit);

}

else{
    $etudes = animalDB::getStudies(" ");
}


if(isset($_SESSION['connected']) && sizeof($favEtudes)>0){
    foreach ($favEtudes as $studie) {
        $suppress = isset($_SESSION['connected']) && animalDB::isAdmin($_SESSION['username']) ? "<button class='suppress'  value=".$studie['Id_Etude']." type='button'>Supprimer etude</button>": "";
        echo("<div class='study-container'><a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
                <p value=".$studie['Id_Etude'].">".$studie['NomEtude']."</p>
                </a>
                <span class='fa fa-star checked' value=".$studie['Id_Etude']."></span>
                <button class='modif'  value=".$studie['Id_Etude']." type='button'>Proposer une modification</button>
                $suppress
                <span class='bar'></span>
            </div>
            ");
        }
}

foreach ($etudes as $studie) {
    $suppress = isset($_SESSION['connected']) && animalDB::isAdmin($_SESSION['username']) ? "<button class='suppress'  value=".$studie['Id_Etude']." type='button'>Supprimer etude</button>": "";
    $star = isset($_SESSION['connected']) ? "<span class='fa fa-star unchecked' value=".$studie['Id_Etude']."></span>" : "";
    
    echo("<div class='study-container'><a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
            <p value=".$studie['Id_Etude'].">".$studie['NomEtude']."</p>
            </a>
            $star
            <button class='modif'  value=".$studie['Id_Etude']." type='button'>Proposer une modification</button>
            $suppress
            <span class='bar'></span>
        </div>
        ");
    }

?>