<!DOCTYPE html>
<html>
<head>
  <title>Modification du profil</title>
  <link rel="stylesheet" type="text/css" href="modif_profil.css">
</head>
<body>
  <div class="container_modif_profil">
    <form class="form_modif_profil" action='?controller=profil&action=modifier_profil' method="post">
      <p>Modifier votre profil</p>
      <div class="form-row">
        <div class="form-group">
          <label for="prenom">Prénom :</label>
          <input type="text" name="prenom_utilisateur" value="<?= $recuperer_infos_profil->prenom_utilisateur ?>" required>
        </div>
        <div class="form-group">
          <label for="pseudo">Pseudo :</label>
          <input type="text" name="pseudo_utilisateur" value="<?= $recuperer_infos_profil->pseudo_utilisateur ?>" required>
        </div>
      </div>
      
      <!--<div class="form-group">
        <label for="age">Age :</label>
        <input type="int" name="age_utilisateur" value="<?= $recuperer_infos_profil->age_utilisateur ?>" required>
      </div>-->

      <div class="form-group">
        <label for="email">E-mail :</label>
        <input type="email" name="email_utilisateur" value="<?= $recuperer_infos_profil->email_utilisateur ?>" required>
      </div>
      <a class="btn" href='?controller=profil&action=conf_modif_profil'>Enregistrer les modifications</a>
    </form>
  </div>
</body>
</html>