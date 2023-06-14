<div>
<h1>Page du quizz</h1>
<form action="?controller=selection&action=question_reponse_type_rep" method="POST">
  <p><?= htmlspecialchars($question) ?></p>

  <?php foreach ($reponse as $index => $r) { ?>
    <div>
      <?php if ($isCheckbox) { ?>
        
        <input type="checkbox" name="reponse[]" value="<?= $idReponse[$index] ?>">
      <?php } else { ?>
        <input type="radio" name="reponse[]" vvalue="<?= $idReponse[$index] ?>">
      <?php } ?>
      <label><?= htmlspecialchars($r) ?></label>
      
      
    </div>
  <?php } ?>
  <button type="submit">Valider</button>
</form>
</div>







