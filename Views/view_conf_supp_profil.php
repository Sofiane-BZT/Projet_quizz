<h1>Confirmation de suppression du profil</h1>
<p>Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible.</p>
<form action="?controller=profil&action=supp_profil" method="post">
    <input type="hidden" name="confirm_suppression" value="1">
    <button type="submit">Confirmer la suppression</button>
</form>
<form action="?controller=profil&action=supp_profil_annulee" method="post">
    <input type="hidden" name="confirm_suppression" value="0">
    <button type="submit">Annuler</button>
</form>