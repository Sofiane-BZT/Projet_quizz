<?php

class Controller_authentification extends Controller
{

	public function action_default()
	{
		$this->action_accueil();
	}

	public function action_accueil()
	{
		$this->render("formulaire_authentification");
	}

// ---------------------------------------Athentification--------------------------------------

public function action_authentification()
{
    if (isset($_POST["pseudo"]) && isset($_POST["mot_de_passe"])) {
        if (!empty($_POST["pseudo"]) && !empty($_POST["mot_de_passe"])) {
            $pseudo = trim($_POST["pseudo"]);
            $motDePasse = trim($_POST["mot_de_passe"]);

            $m = Model::get_model();
            $utilisateur = $m->get_authentification($pseudo);

            if ($utilisateur && password_verify($motDePasse, $utilisateur->mdp_utilisateur)) {
                $_SESSION['pseudo'] = $utilisateur->pseudo_utilisateur;
                $_SESSION['id_utilisateur'] = $utilisateur->id_utilisateur;

                $this->render("authentification_reussie");
            } else {
                $this->render("formulaire_authentification");
            }
        }
    }
}
}
?> 