<div class="quizz_container">
<form class="form_quizz" action="?controller=selection&action=question_reponse_type_rep" method="POST">
  <p><?= htmlspecialchars($question) ?></p>

  <?php foreach ($reponse as $index => $r) { ?>
    <div class="reponses">
      <?php if ($isCheckbox) { ?>

        <input type="checkbox" name="reponse[<?= $r->type_reponse ?>]" value="<?= $r->type_reponse ?>">
      <?php } else { ?>
        <label><?= htmlspecialchars($r->intitule_reponse) ?></label>

        <input type="radio" name="reponse[<?= $r->type_reponse ?>]" value="<?= $r->type_reponse ?>">
      <?php } ?>
      
      
    </div>
  <?php } ?>

  <button type="submit">Question suivante</button>
  <button type="button">Mettre en pause</button>

</form>
</div>