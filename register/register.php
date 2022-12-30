<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style/register.css" />
</head>
<body>
<form class="box" action="registerVerification.php" method="post">
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
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