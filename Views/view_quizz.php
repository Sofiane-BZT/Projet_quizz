<div id="timer">10</div>
<div class="quizz_container">
  <form class="form_quizz" action="?controller=selection&action=question_reponse_type_rep" method="POST">
    <p><?= htmlspecialchars($question) ?></p>

    <?php foreach ($reponse as $index => $r) { ?>
      <div class="reponses">
        <?php if ($isCheckbox) { ?>
          <label class="label_quizz"><?= htmlspecialchars($r) ?></label>
          <input class="input_quizz" type="checkbox" name="reponse[]" value="<?= $idReponse[$index] ?>">
        <?php } else { ?>      
          <label class="label_quizz"><?= htmlspecialchars($r) ?></label>
          <input class="input_quizz" type="radio" name="reponse[]" value="<?= $idReponse[$index] ?>">
        <?php } ?>      
      </div>
    <?php } ?>

    <div class="button-container">
    <button type="button">Mettre en pause</button>
    <button type="submit">Question suivante</button>
    </div>

  </form>
</div>
