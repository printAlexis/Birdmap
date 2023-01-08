<?php
include_once 'animalDB.php';
if(isset($_POST['textarea']) && isset($_POST['id'])  && strlen($_FILES['uploadfile']['name'])!= 0) {
    $maxSize = 50000;
    $path = "img/animals/";

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    var_dump($_FILES['uploadfile']);
    $nomFichier=$_FILES['uploadfile']['tmp_name'];
    $matches;
    preg_match('/^image\/(.*)$/', mime_content_type($_FILES['uploadfile']['tmp_name']), $matches);
    $extension = $matches[1];
    $path = $path.$_POST['id'].".".$extension;
    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], "../".$path)){
        animalDB::changeDescription($_POST['id'],$_POST['textarea'],$path);
        echo("<script>console.log('upload sucessfull')</script>");
    }
    else{
        echo("<script>console.log('upload failed')</script>");
    }
}
else{
    echo("<script>alert('erreur lors du transfer');</script>"); 
}
header("Location: ../index.php");
exit;
?>
){

}
?>