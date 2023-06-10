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

 	public function action_authentification() {

	 if (isset($_POST["pseudo"]) AND isset($_POST["mot_de_passe"]))
            {
                 if (!empty($_POST["pseudo"]) AND !empty($_POST["mot_de_passe"]))
                 {
                     $pseudo = trim(($_POST["pseudo"]));
                     $motDePasse = trim(($_POST["mot_de_passe"]));

 					$m = Model::get_model();
 				
 					$data=["utilisateur"=>$m->get_authentification($pseudo, $motDePasse)];

          			if ((strcmp($pseudo,trim($data["utilisateur"]->pseudo_utilisateur)) == 0 ) && strcmp($motDePasse,trim($data["utilisateur"]->mdp_utilisateur)) == 0) {
	
                 		$_SESSION['pseudo'] = $data["utilisateur"]->pseudo_utilisateur;

 		 				$this->render("authentification_reussie");

                 	} else {

 						$this->render("formulaire_authentification");
               		}
 				}
 			}
 		}
	}

?> 