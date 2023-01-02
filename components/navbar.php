
<?php
session_start();
$profil = isset($_SESSION['connected']) ? '<li><a href="profil.php">Mon profil</a></li>' : '<li><a href="register/login.php">Se connecter</a></li>';

echo('<header class="header">
		<h1 class="logo"><a href="#">Flexbox</a></h1>
      <ul class="main-nav">
          <li><a href="#">Encyclopedie</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Portfolio</a></li>
          '.$profil.'
      </ul>
</header> ');