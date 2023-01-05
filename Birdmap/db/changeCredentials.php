<?php
session_start();
include "animalDB.php";
var_dump($_POST);
if(isset($_POST['valider'])){
if(isset($_POST['name']) && $_POST['name'] != ""){
    if(AnimalDB::modifierName($_SESSION['username'],$_POST['name'])){
        $_SESSION['username'] = $_POST['name'];
    };
}
if(isset($_POST['mail']) && $_POST['mail'] != ""){
    AnimalDB::modifierMail($_SESSION['username'],$_POST['mail']);
}
if(isset($_POST['mdp'])&&  $_POST['mdp'] != ""){
    AnimalDB::modifierMDP($_SESSION['username'],$_POST['mdp']);
}
if(strlen($_FILES['uploadfile']['name'])){

    $path = "../img/uploads/user/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path.AnimalDB::getUserID($_SESSION['username']).".jpg")){
        echo("<script>console.log('upload sucessfull')</script>");
    }
    else{
        echo("<script>console.log('upload failed')</script>");
    }
}

header("Location: ../profil.php");
exit;
}

else{
    header("Location: ../profil.php");
    exit;
}