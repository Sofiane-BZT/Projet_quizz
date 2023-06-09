<div>
  <?php foreach ($niveaux as $niveau) { ?>
    <button type="button" class="card">
      <a href="?controller=selection&action=init&niveau_question=<?= $niveau->niveau_question ?>">
        <img src="../Content/assets/img_niveau.jpg" alt="niveau">
        <div>
          <span><?= $niveau->niveau_question ?></span>
        </div>
      </a>
    </button>
  <?php } ?>
</div>


 