<?php
include_once '../animalDB.php';
if(isset($_POST['id'])){
    $path = "../../study/json"."/".$_POST['id'].".json";

    echo realpath($path);
    echo file_exists($path);
    if (file_exists($path)) {
        unlink($path);
    }
    animalDB::deleteStudy($_POST['id']);
}

?>