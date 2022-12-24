<?php
    
if (isset($_POST['valider']) && strlen($_FILES['uploadfile']['name'])!= 0) {
    $maxSize = 50000;
    $path = "../img/uploads/".$_POST['id']."/";
    if($_FILES['uploadfile']['size']>$maxSize){
        echo("<script>alert('fichier trop volumineux');</script>"); 
    }
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path."pointer.png")){
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
