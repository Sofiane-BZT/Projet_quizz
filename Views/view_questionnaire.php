<h1>Questionnaire</h1>

<p>Thème sélectionné : <?= $themeId ?></p>


<form action="" method="post">
  <?php foreach ($questions as $question) { ?>
    <div class="question">
      <h3><?= $question->intitule_question ?></h3>
      <input type="hidden" name="question_ids[]" value="<?= $question->id_question ?>">
      <input type="radio" name="answers[<?= $question->id_question ?>]" value="option1"> Option 1<br>
      <input type="radio" name="answers[<?= $question->id_question ?>]" value="option2"> Option 2<br>
      <input type="radio" name="answers[<?= $question->id_question ?>]" value="option3"> Option 3<br>
    </div>
  <?php } ?>

  <button type="submit">Submit</button>
</form>