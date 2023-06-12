<section id="message_theme">
  <div>
    <h2>Bienvenue dans le royaume des esprits geek de l'informatique !</h2>
  </div>
  <div>
    <p>Explorez notre palette de thèmes et testez vos connaissances dans un QCM qui mettra à l'épreuve<br>votre sagesse binaire et votre passion pour les octets virtuels.</p>
  </div>
</section>

<div class="choix_theme">
  <h2>Choisissez un thème</h2>
</div>

<div class="card-container">
  <?php foreach ($themes as $theme) { ?>
    <div class="card">
      <a href="?controller=selection&action=all_niveaux&id_theme=<?= $theme->id_theme ?>">
        <img src="<?= $theme->image_theme ?>" alt="<?= $theme->alt_image_theme ?>">
        <div>
          <span class="intitule_theme"><?= $theme->intitule_theme ?></span>
        </div>
      </a>
    </div>
  <?php } ?>
</div>