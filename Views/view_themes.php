<section id="message_theme">
  <div>
    <h2>Bienvenue dans le royaume des esprits geek de l'informatique !</h2>
  </div>
  <div class="message-content">
  <p>Choisir entre le développement web et la culture générale web/informatique, c'est comme décider entre devenir le maître des codes ou l'explorateur des connaissances numériques.</p>
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
