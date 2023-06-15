<div class="message_profil">
  <div>
    <h2>Bienvenue sur votre profil ! </h2>
  </div>
  <div>
    <p>Explorez et gérez vos informations en toute simplicité. <br> Profitez pleinement de votre expérience sur notre site !</p>
  </div>
</div>

<div class="profil_container">
  <div>
    <div class="prenom"><label>Prenom</label><?= $afficher_infos_profil->prenom_utilisateur ?></div>
    <div class="age"><label>Pseudo</label><?= $afficher_infos_profil->pseudo_utilisateur ?></div>
    <div class="age"><label>Age</label><?= $afficher_infos_profil->age_utilisateur ?></div>
  </div>
  <div class="mail"><label>Email</label><?= $afficher_infos_profil->email_utilisateur ?></div>
<div class="btn_container">
      <a class="btn" href='?controller=profil&action=recuperer_infos_profil&id=<?= $afficher_infos_profil->id_utilisateur ?>'>Modifier</a>
      <a class="btn" href='?controller=profil&action=conf_supp_profil&id=<?= $afficher_infos_profil->id_utilisateur ?>'>Supprimer</a>
    </div>
</div>


