<?php
echo '<nav class="navbar navbar-inverse" style="margin-bottom:  0px;">
        <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Café</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href=".">Accueil</a></li>
      <li><a href="commande.php">Commandes</a></li>
      <li><a href="map.php">Carte</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">';

include("session.php");
  if(!isset($_SESSION['login_user'])){
      echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Se connecter</a></li>';
      echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> S\'enregistrer</a></li>';
   } else {
      echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Bienvenue, '.$login_session;
      echo '<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Se déconnecter</a></li>';
}
echo '</ul></div></nav>';
?>
