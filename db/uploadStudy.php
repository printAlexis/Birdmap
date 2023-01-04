<?php 
include_once 'animalDB.php';
session_start();
if (isset($_POST['valider']) && strlen($_FILES['uploadfile']['name'])!= 0) {
    $fichier = $_FILES['uploadfile'];
    $error = $fichier['error'];
    $tmp_name = $fichier['tmp_name'];
    if($error == UPLOAD_ERR_OK){
        $valide = true;
        $json = file_get_contents($tmp_name);
        $data = json_decode($json, true);
        if(isset($data['individuals']) && isset($data['individuals'][0]))
        for($i = 0; $i < sizeof($data['individuals']); ++$i ){
            if(!$valide){
                break;
            }
            if((isset($data['individuals'][$i]['individual_local_identifier'])
             && isset($data['individuals'][$i]['individual_taxon_canonical_name'])
             && isset($data['individuals'][$i]['locations']))){

                for($y = 0; $y < sizeof( $data['individuals'][$i]['locations']); ++$y ){
                    if(!$valide){
                        break;
                    }
                    $location = $data['individuals'][$i]['locations'][$y];
                    if(!(isset($location['timestamp'])
                     && isset($location['location_long'])
                     && isset($location['location_lat']))){
                        $valide = false;
                    }
                }
   
            }
            else{
                $valide = false;
    
            }
        }
        if($valide){
            
            $path = realpath("../study/json/")."/";
            $path = $path. AnimalDB::createStudy($_POST['nom'],$_POST['textarea'],$_SESSION['username'],$path). ".json";
            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path)){
                echo("<script>console.log('upload sucessfull')</script>");
            }
            header("Location: ../index.php");
        }
        else{
            header("Location: ../index.php?ErrorType=json");
        }
    }
    header("Location: ../index.php?ErrorType=json");
}
else{
      header("Location: ../index.php?ErrorType=json");
}


?>