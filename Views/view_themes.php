<h1>Page de selection</h1>
<h3>Découvrez notre large sélection de thèmes captivants pour votre prochain QCM ! <br> Que vous soyez passionné de developpement web, de culture web et d'informatique, nous avons des sujets qui sauront stimuler votre esprit et tester vos connaissances. <br> Choisissez parmi nos catégories variées et plongez dans une expérience de quiz divertissante et enrichissante.</h3>
<div class="card-container">
  <?php foreach ($themes as $theme) { ?>
    <div class="card">
      <a href="?controller=selection&action=all_niveaux&id_theme=<?= $theme->id_theme ?>">
        <img src="<?= $theme->image_theme ?>" alt="<?= $theme->alt_image_theme ?>">
        <div>
          <span><?= $theme->intitule_theme ?></span>
        </div>
      </a>
    </div>
  <?php } ?>
</div>

