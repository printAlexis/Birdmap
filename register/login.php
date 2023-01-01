<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../style/register.css" />
<script src='../erreur/erreur.js'></script>
<link rel='stylesheet' href='../style/erreur.css'>
</head>
<body>
<form class="box" action="loginVerification.php" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
</form>
<?php
    session_start();
    if(isset($_SESSION['post_data'])){
      $parametres = array(
        "message" => "login ou mot de passe non valide",
      );
      extract($parametres);
      include '../erreur/erreurTemplate.php';
      unset($_SESSION['post_data']);
    }
  ?>
</body>
</html> 