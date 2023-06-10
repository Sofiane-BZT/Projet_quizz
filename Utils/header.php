<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>
<body>
<header>

  <!--------------Barre de navigation---------------->
  <div class="navbar">
    <div class="logo"><a href="#">QCM SS</a></div>
    <ul class="links">
        <li><a href="accueil">Accueil</a></li>
        <li><a href="historique">Historique</a></li>
        <li><a href="profil">Profil</a></li>
    </ul>

  <!--------------Pseudo et bouton---------------->
  
    <div class="btn_log">
    <span><?php echo $_SESSION['pseudo']; ?></span>
        <a href="#">Se déconnecter</a>
    </div>

  <!--------------Menu deroulant---------------->
  <div class="toggle_btn">
        <i class="fa-solid fa-bars"></i>
    </div>
  </div>
<div class="dropdown_menu">
    <ul>
        <li><a href="accueil">Accueil</a></li>
        <li><a href="historique">Historique</a></li>
        <li><a href="profil">Profil</a></li>
        <li><a href="#" class="action_btn">Go</a></li>
    </ul>
    <div class="btn_log">
        <span class="pseudo"><?php echo $_SESSION['pseudo']; ?></span>
    </div>
  </div>
</header>


</body>
</html>