<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/profil/profil.css">
    <link rel="stylesheet" href="style/navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="profil/profil.js"></script>
    <title>Profil</title>

</head>
<body>
    <div class="navbar">
        <?php include 'components/navbar.php' ?>
    </div>
    <div class="container">
        <!-- Section Information personnelle -->
        <div class="section personal-info">
        <h2 class="section-title">Mon profil</h2>
        <img src="<?php
        $path = "img/uploads/user/".AnimalDB::getUserID($_SESSION['username']).".jpg";
        $src = file_exists($path) ? $path : "img/animals/default.jpg";
        echo $src;
         ?>" 
         alt="photo de profil">
        <div>
            <h4>Pseudo: </h4>
            <p><?php echo $_SESSION['username'];?></p>
            <h4>Mail</h4>
            <p><?php echo animalDB::getMail($_SESSION['username']);?></p>
            <button class='change--profil'>Modifier le profil</button>
            <button class='disconnect'>Se déconnecter</button>

        </div>
        </div>
        <!-- Première section vide -->
        <div class="mes--etudes">
        <h2 class="section-title">Mes etudes</h2>
        <div class="myStudies"></div>
        </div>
    </div>
</body>
</html>
