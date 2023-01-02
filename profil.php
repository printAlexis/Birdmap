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
        <img src="http://placehold.it/100x100" alt="photo de profil">
        <div>
            <p>Pseudo: MonPseudo</p>
            <p>Adresse email: monadresse@email.com</p>
            <button class='disconnect'>Se déconnecter</button>
        </div>
        </div>
        <!-- Première section vide -->
        <div class="section">
        <h2 class="section-title">Titre de la section</h2>
        <!-- Mettre ici le contenu de votre première section -->
        </div>
        <!-- Deuxième section vide -->
        <div class="section">
        <h2 class="section-title">Titre de la section</h2>
        <!-- Mettre ici le contenu de votre deuxième section -->
        </div>
    </div>
</body>
</html>
