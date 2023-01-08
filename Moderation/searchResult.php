<?php
include_once '../db/animalDB.php';
session_start();


if(isset($_GET['text'])){
    $text = (String) trim($_GET['text']);

    $users = animalDB::getUsersByName($text);
    foreach ($users as $user) {

        $path = file_exists("img/uploads/user/".$user["Id_Utilisateur_"].".jpg") ? "img/uploads/user/".$user["Id_Utilisateur_"].".jpg" :"img/animals/default.jpg"; 
        $bannir = $user['EstBanni'] == '0' ? "bannir l'utilisateur" : "débannir l'utilisateur";

        echo("<div class='user-container'>
                <img class='user-image' src='$path' alt='utilisteur'>
                <div class='user-text'>
                    <div class='name'>
                        <h4>Nom de l'utilisateur</h4>
                        <p>".$user["pseudo"]."</p>
                     </div>
                    <div class='name'>
                        <h4>mail de l'utilistaueur</h4>
                        <p>".$user["Email"]."</p>
                    </div>
                    <a class='ban' name='".$user["pseudo"]."'>$bannir</a>
                </div>

            </div>
            <span class='bar'></span>
            ");
        }
    }
    ?>

