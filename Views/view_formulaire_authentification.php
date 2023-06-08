
<div class="container">
    <h1>Formulaire d'authentification</h1>
    <form action="?controller=authentification&action=authentification" method="post">
      
      <label for="pseudo">Pseudo</label>
      <input type="text" name="pseudo" id="pseudo" required>
      
      <label for="password">Mot de passe</label>
      <input type="password" name="mot_de_passe" id="mot_de_passe" required>
      
      <div class="btn-container">
        <button type="submit" class="btn-primary">Connexion</button>
        <a  href="?controller=inscription&action=formulaire_inscription">Inscription</a>
      </div>
    </form>
  </div>
