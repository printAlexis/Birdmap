<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style/register.css" />
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
      echo("MAUVAIS MDP BOUFFON");
      unset($_SESSION['post_data']);
    }
  ?>
</body>
</html>