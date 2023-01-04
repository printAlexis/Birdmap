
<?php


include 'db/animalDB.php';
session_start();
$profil = isset($_SESSION['connected']) ? '<li><a href="profil.php">Mon profil</a></li>' : '<li><a href="register/login.php">Se connecter</a></li>';
$adminMenu = (isset($_SESSION['connected']) && animalDB::isAdmin($_SESSION['username'])) ?  '<li><a href="Moderation.php">Modération</a></li>' : "";
echo('<header class="header">
		<h1 class="logo"><a href="index.php">BirdMap</a></h1>
      <ul class="main-nav">
          '.$adminMenu.'
          '.$profil.'
      </ul>
</header> ');