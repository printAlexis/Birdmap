<?php
if(isset($_GET['chemin'])){
    if(file_exists("../../".$_GET['chemin'])){
        echo ('true');
    }
    else{
        echo ('false');
    }
}

?>