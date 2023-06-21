<div class="authentication_container">
  <h1>Connexion</h1>
  <form action="?controller=authentification&action=authentification" method="post">
    <div class="form-group">
      <label for="pseudo">Pseudo</label>
      <input class="authentification_input" type="text" name="pseudo" id="pseudo" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" name="mot_de_passe" id="mot_de_passe" required>
    </div>
    <div class="btn-container">
      <button type="submit" class="btn">Se connecter</button>
      <div class="inscription-link">
        <p>Vous n'avez pas de compte ? </p>
        <a href="?controller=inscription&action=formulaire_inscription">S'inscrire</a>
        <a href="?controller=inscription&action=formulaire_inscription" class="btn">S'inscrire</a>
      </div>
    </div>
  </form>
</div>
