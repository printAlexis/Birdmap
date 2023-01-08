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
<form class="box" action="registerVerification.php" method="post">
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Deja inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
  <?php
    session_start();
    if(isset($_SESSION['post_data'])){
      $parametres = array(
        "message" => "erreur dans le nom, l'email ou le mot de passe",
      );
      extract($parametres);
      include '../erreur/erreurTemplate.php';
      unset($_SESSION['post_data']);
    }
  ?>
</body>
</html>