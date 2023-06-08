<?php
session_start();
?>

<header>
    <h2>SB QUIZZ</h2>
    <nav id="menu">
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Historique</a></li>
        <li><a href="#">Profil</a></li>
      </ul>
    </nav>
    <span>
    <?php
      echo($_SESSION['pseudo']);
    ?>
    </span>
    <a href="#" class="btn-logout">Déconnexion</a>
    <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
</header>



