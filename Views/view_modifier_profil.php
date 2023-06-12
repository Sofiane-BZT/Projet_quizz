
<form  action='' method="post">
<input  name="idmHidden"  value="<?php echo $recuperer_infos_profil->id_utilisateur ?> ">
        <p >Modifier profil</p>

        <div >
            <div>
              <label>Nom</label>
            </div>
            <div >
            <input type="text" name ="pseudo_utilisateur" value="<?= $recuperer_infos_profil->pseudo_utilisateur ?>" required>
            </div>
        </div>

        <div>
            <div>
              <label>Auteur</label>
            </div>
            <div>
            <input type="email" name ="email_utilisateur" value="<?= $recuperer_infos_profil->email_utilisateur ?>" required>
            </div>
            <div >
              <button type="submit" >Modifier</button>
            </div>
          </div>
      </form>
</body>
</html>