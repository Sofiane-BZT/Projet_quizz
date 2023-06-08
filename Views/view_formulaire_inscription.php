<div class="container">
    <h1>Inscription</h1>
    <form action="?controller=inscription&action=inscription" method="post">
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="password" required>
      </div>
      
      <div class="form-group">
        <div class="radio-group">
          <label for="user-role">
            <input type="radio" name="role" id="radio_utilisateur" value="0" required>
            Utilisateur
          </label>
          <label for="admin-role">
            <input type="radio" name="role" id="radio_admin" value="1" required>
            Admin
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="buttons">
          <button type="submit" class="btn">Inscription</button>
          <a class="btn" href="?controller=authentification&action=formulaire_authentification">Retour</a>
        </div>
      </div>
    </form>
  </div>