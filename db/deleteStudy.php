<?php
include_once 'animalDB.php';

if(isset($_GET['id'])){
 
        $path = "../../study/json"."/".$_GET['id'].".json";
        if (file_exists($path)) {
            unlink($path);
        }
        animalDB::deleteStudy($_GET['id']);
}
header("Location: ../profil.php");
exit;
?>