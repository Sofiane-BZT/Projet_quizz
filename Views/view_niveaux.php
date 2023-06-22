<section id="message_theme">
  <div>
    <h2>Bienvenue dans le royaume des esprits geek de l'informatique !</h2>
  </div>
  <div class="message-content">
  <p>Opter pour le niveau facile et effleurer la surface des connaissances, ou plonger dans le défi du niveau difficile et repousser vos limites intellectuelles. Quelle voie oserez-vous emprunter pour tester vos compétences au maximum ?</p>
</div>
</section>

<div class="choix_niveau">
  <h2>Choisissez un niveau de difficulté</h2>
</div> 
<div class="card-container">
  <?php foreach ($niveaux as $niveau) { ?>
    <button type="button" class="card">
      <a href="?controller=selection&action=init&niveau_question=<?= $niveau->niveau_question ?>">
        <div>
          <span><?= $niveau->niveau_question ?></span>
        </div>
      </a>
    </button>
  <?php } ?>
</div>

