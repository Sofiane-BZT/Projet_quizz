<div>
  <h1>Page du quizz</h1>
  
   <p><?= htmlspecialchars($question) ?></p>

    <?php foreach ($reponse as $r) { ?>
     <div>
          
          <p><?= htmlspecialchars($r->intitule_reponse)?></p>
    </div>
    
    <?php } ?> 
</div>
