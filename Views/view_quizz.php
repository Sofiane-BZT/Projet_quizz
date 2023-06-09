<div>
<h1>Page du quizz</h1>
<form action="?controller=selection&action=question_reponse_type_rep" method="POST">
  <p><?= htmlspecialchars($question) ?></p>
  
  <?php $nbTypeReponse1 = 0; ?>
  <?php foreach ($typeRep as $valeur) { ?>
    <?php if ($valeur === "1") { $nbTypeReponse1++; } ?>
  <?php } ?>
  
  <?php $Checkboxes = ($nbTypeReponse1 >= 2); ?>
  
  <?php foreach ($reponse as $index => $r) { ?>
    <div>
      <?php if ($Checkboxes) { ?>
        <input type="checkbox" name="reponse[]" value="<?= htmlspecialchars($r->intitule_reponse) ?>">
      <?php } else { ?>
        <input type="radio" name="reponse" value="<?= htmlspecialchars($r->intitule_reponse) ?>">
      <?php } ?>
      <label><?= htmlspecialchars($r->intitule_reponse) ?></label>
    </div>
  <?php } ?>
  <button type="submit">Valider</button>
</form>
</div>







