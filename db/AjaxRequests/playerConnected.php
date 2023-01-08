<?php 
session_start();
if(isset($_SESSION['connected'])){
    echo 'true';
}
else{
    echo 'false';
}
?>