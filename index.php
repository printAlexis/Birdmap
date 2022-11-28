<?php
include 'db/animalDB.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style/map.css">
    <script src="js/classes/location.js"></script>
    <script src="js/classes/animal.js"></script>
    <script src="js/classes/AnimalControler.js"></script>
    <script src="js/classes/MapControler.js"></script>
    <script src="js/importStudie.js"></script>
	<style>

	</style>
</head>
<body>
    
</body>
</html>
<meta http-equiv="Context-Type" content="text/html; charset=US-ASCII">
<html>
<!-- search the text for !! to find the lines that need to be modified to display your map. -->
    <body>
        <div class="map-interface">
            <div id="map" ></div>
            <div class="scroll-menu">
                <?php 
                    foreach (AnimalDB::getStudies(30) as $studie) {
                        echo("<a class='study' value=".$studie['Id_Etude']." title='".$studie['DescriptionEtude']."'>
                                <p>".$studie['NomEtude']."</p>
           
                             </a>");
                    }
                ?>
            </div>
        </div>
        <p>dazdzzdas</p>
    </body>
    <script src="js/map.js"></script>
    
</html>