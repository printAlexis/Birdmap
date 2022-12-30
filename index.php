
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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/map.css">
    <link rel="stylesheet" href="style/searchbar.css">
    <link rel="stylesheet" href="style/modfiMenu.css">
    <link rel="stylesheet" href="style/description.css">
    <script src="fonctionnement/classes/location.js"></script>
    <script src="fonctionnement/classes/animal.js"></script>
    <script src="fonctionnement/classes/AnimalControler.js"></script>
    <script src="fonctionnement/classes/StudyControler.js"></script>
    <script src="fonctionnement/importStudie.js"></script>

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
            <div class="map--container">
                <img src="img/chargement.gif" width="50px" height="50px" class="chargement" alt="loading"/>
                <div id="map" ></div>
                <img class="reset" src="img/reset.png" alt="reset">
            </div>
        
            <div class="search-menu">
                <input class="searchbar" type="text" placeholder="Search..">
                <div class="scroll-menu">
                </div>
            </div>
    </div>
    <div class="animalInfo">
        
    </div>
    </body>
    <script src="fonctionnement/map.js"></script>
    <script src="affichage/searchbar/searchbar.js"></script>
    <script src="affichage/modifMenu/ModifMenu.js"></script>
</html>