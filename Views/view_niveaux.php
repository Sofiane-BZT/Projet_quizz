<section id="message_theme">
  <div>
    <h1>Bienvenue dans le royaume des esprits geek de l'informatique !</h1>
  </div>
  <div>
    <p>Explorez notre palette de thèmes et testez vos connaissances dans un QCM qui mettra à l'épreuve<br>votre sagesse binaire et votre passion pour les octets virtuels.</p>
  </div>
</section>

<div class="choix_theme">
  <h2>Choisissez un niveau de difficulté</h2>
</div>
<div class="card-container">
  <?php foreach ($niveaux as $niveau) { ?>
    <button type="button" class="card">
      <a href="?controller=selection&action=init&niveau_question=<?= $niveau->niveau_question ?>">
        <img src="../Content/assets/dev_web.png" alt="niveau">
        <div>
          <span><?= $niveau->niveau_question ?></span>
        </div>
      </a>
    </button>
  <?php } ?>
</div>

