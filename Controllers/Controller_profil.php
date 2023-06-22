<?php


class Controller_profil extends Controller
{

	public function action_default()
	{
		$this->action_accueil();
	}

	public function action_accueil()
	{
		$this->render("accueil");
	}

// -------------------------afficher les information sur le profil-----------------------------

public function action_all_infos_profil() {

    $idUtilisateur = $_SESSION['id_utilisateur'];
    // var_dump($idUtilisateur);
    $m = Model::get_model();
    $data=["afficher_infos_profil"=>$m->get_all_infos_profil($idUtilisateur)];
    $this->render("profil",$data);
    // var_dump($data);

}

// -------------------------Recuperer les informations sur le profil-----------------------------

public function action_recuperer_infos_profil () {

    $idUtilisateur = $_GET['id'];
    $m = Model::get_model();
    $data=["recuperer_infos_profil"=>$m->get_recuperer_infos_profil($idUtilisateur)];
    var_dump($data["recuperer_infos_profil"]->id_utilisateur); 
    $this->render("modifier_profil",$data);

}

// --------------------Renvoi vers la  vue de confirmation de modification du profil---------------------

public function action_conf_modif_profil () {
    $this->render("conf_modif_profil");
}
// ---------------------------------Modification des infos sur le profil----------------------------------

public function action_modifier_profil () {

    $idUtilisateur = $_SESSION['id_utilisateur'];
    var_dump($idUtilisateur);
        if (isset($_POST["prenom_utilisateur"]) AND isset($_POST["pseudo_utilisateur"]) AND isset($_POST["age_utilisateur"]) AND isset($_POST["email_utilisateur"]))
        {
            if (!empty($_POST["prenom_utilisateur"]) AND !empty($_POST["pseudo_utilisateur"]) AND !empty($_POST["age_utilisateur"]) AND !empty($_POST["email_utilisateur"]))
            {
                $prenomUtilisateur = $_POST["prenom_utilisateur"];
                $pseudoUtilisateur = $_POST["pseudo_utilisateur"];
                $ageUtilisateur = $_POST["age_utilisateur"];
                $emailUtilisateur = $_POST["email_utilisateur"];
                $m = Model::get_model();
                $m->get_modifier_profil($prenomUtilisateur, $pseudoUtilisateur, $ageUtilisateur, $emailUtilisateur, $idUtilisateur);
                // $this->render("modifier_profil",$data);

                // Mise à jours afin que le nouveau pseudo soit directement affiché dans le header
                $_SESSION['pseudo'] = $pseudoUtilisateur;
                header("Location: ?controller=profil&action=conf_modif_profil");
            exit;
            }
        }
    }

// --------------------Renvoi vers la  vue de confirmation de suppression du profil---------------------

public function action_conf_supp_profil () {
    $this->render("conf_supp_profil");
}

// --------------------Renvoi vers la  vue profil car suppression profile annulée---------------------

public function action_supp_profil_annulee () {
    $this->render("accueil");
}

// -----------------------------------------Suppression du profil-------------------------------------

        public function action_supp_profil() {
            $idUtilisateur = $_SESSION['id_utilisateur'];
            // Vérifier si l'utilisateur a confirmé ou annulé la suppression du profil
            if (isset($_POST["confirm_suppression"])) {
                if ($_POST["confirm_suppression"] === "1") {
                        $m = Model::get_model();
                        $m->get_suppression_profil($idUtilisateur);
        
                    // Redirection vers la page de confirmation de suppression réussie
                    header("Location: ?controller=authentification&action=formulaire_authentification");
                    exit;
                } else {
           
                    header("Location: ?controller=profil&action=modifier_profil");
                    exit;
                }
            }
        }
}

?>









