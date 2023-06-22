<div class="message_profil">
    <h2>Bienvenue sur votre profil !</h2>
</div>

<div class="profil_container">
  <div class="form_profil">
    <div class="prenom"><label>Prenom :</label><span><?= $afficher_infos_profil->prenom_utilisateur ?></span></div>
    <div class="age"><label>Pseudo :</label><span><?= $afficher_infos_profil->pseudo_utilisateur ?></span></div>
    <div class="age"><label>Age :</label><span><?= $afficher_infos_profil->age_utilisateur ?></span></div>
  <div class="mail"><label>Email :</label><span><?= $afficher_infos_profil->email_utilisateur ?></span></div>
<div class="btn_container">
      <a class="btn" href='?controller=profil&action=recuperer_infos_profil&id=<?= $afficher_infos_profil->id_utilisateur ?>'>Modifier</a>
      <a class="btn" href='?controller=profil&action=conf_supp_profil&id=<?= $afficher_infos_profil->id_utilisateur ?>'>Supprimer</a>
    </div>
  </div>
</div>