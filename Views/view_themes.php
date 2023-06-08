<div>
  <?php foreach ($themes as $theme) { ?>
    <button type="button" class="card">
      <a href="?controller=selection&action=all_niveaux&id_theme=<?= $theme->id_theme ?>">
        <img src="<?= $theme->image_theme ?>" alt="<?= $theme->alt_image_theme ?>">
        <div>
          <span><?= $theme->intitule_theme ?></span>
        </div>
      </a>
    </button>
  <?php } ?>
</div>

