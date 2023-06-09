<div>
<h1>Page du quizz</h1>
<form action="?controller=selection&action=question_reponse_type_rep" method="POST">
  <p><?= htmlspecialchars($question) ?></p>

  <?php foreach ($reponse as $index => $r) { ?>
    <div>
      <?php if ($isCheckbox) { var_dump($isCheckbox)?>
        
        <input type="checkbox" name="reponse[]" value="<?= $r->id_reponse ?>">
      <?php } else { ?>
        <input type="radio" name="reponse[]" value="<?= $r->id_reponse ?>">
      <?php } ?>
      <label><?= htmlspecialchars($r->intitule_reponse) ?></label>
      
      <?=var_dump($r)?>
    </div>
  <?php } ?>
  <button type="submit">Valider</button>
</form>
</div>







