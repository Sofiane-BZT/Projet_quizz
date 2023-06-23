<div class="inscription_container">
    <h1>Inscription</h1>
    <form action="?controller=inscription&action=inscription" method="post">
      
      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required>
      </div>
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="password" required>
        <div id="passwordError" class="error-message"></div>
      </div>

      <div class="form-group">
        <div class="buttons">
          <button type="submit" class="btn">S'inscrire</button>
          <a class="btn" href="?controller=authentification&action=formulaire_authentification">Retour</a>
        </div>
      </div>
    </form>
  </div>