<div class="quizz_container">
<form class="form_quizz" action="?controller=selection&action=question_reponse_type_rep" method="POST">
  <p><?= htmlspecialchars($question) ?></p>

  <?php foreach ($reponse as $index => $r) { ?>
    <div class="reponses">
      <?php if ($isCheckbox) { ?>
        
        <input type="checkbox" name="reponse[]" value="<?= $idReponse[$index] ?>">
      <?php } else { ?>      
        <label><?= htmlspecialchars($r) ?></label>

        <input type="radio" name="reponse[]" value="<?= $idReponse[$index] ?>">
      <?php } ?>
      
      
    </div>
  <?php } ?>

  <button type="submit">Question suivante</button>
  <button type="button">Mettre en pause</button>

</form>
</div>