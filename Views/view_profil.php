<h1>Informations sur le profil</h1>
<div class="container">
  <form>
    <table>
      <tbody>
        <tr>
          <th class="label-cell">Prénom</th>
          <th class="label-cell">Âge</th>
        </tr>
        <tr>
          <td><?= $afficher_infos_profil->prenom_utilisateur ?></td>
          <td><?= $afficher_infos_profil->age_utilisateur ?></td>
        </tr>
        <tr>
          <th class="label-cell" colspan="2">Pseudo</th>
        </tr>
        <tr>
          <td colspan="2"><?= $afficher_infos_profil->pseudo_utilisateur ?></td>
        </tr>
        <tr>
          <th class="label-cell" colspan="2">E-mail</th>
        </tr>
        <tr>
          <td colspan="2"><?= $afficher_infos_profil->email_utilisateur ?></td>
        </tr>
      </tbody>
    </table>
    <div class="actions-container">
      <button class="edit-button" href='?controller=profil&action=recuperer_infos_profil&id=<?= $afficher_infos_profil->id_utilisateur ?>'>Modifier</button>
      <span style="margin: 5px;"></span>
      <button class="delete-button" href='?controller=profil&action=conf_supp_profil&id=<?= $afficher_infos_profil->id_utilisateur ?>'>Supprimer</button>
    </div>
  </form>
</div>