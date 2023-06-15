<?php

class Controller_inscription extends Controller
{
	public function action_default()
	{
		$this->action_accueil();
	}

	public function action_accueil()
	{
		$this->render("accueil");
	}


        public function action_formulaire_inscription()
	{

		$this->render("formulaire_inscription");
	}


// ------------------------------------Inscription d'un nouvel utilisateur--------------------------------

// public function action_inscription (){

// 	if (isset($_POST["pseudo"]) AND isset($_POST["email"]) AND isset($_POST["mot_de_passe"])
// 	AND isset($_POST["role"]))
// 	{

// 		if (!empty($_POST["pseudo"]) AND !empty($_POST["email"]) AND !empty($_POST["mot_de_passe"]) 
// 		AND ($_POST["role"] >= 0))
// 		{

// 			$pseudo = trim($_POST["pseudo"]);
// 			$email = trim($_POST["email"]);
// 			$motDePasse = trim($_POST["mot_de_passe"]); 
// 			$role = trim($_POST["role"]);

		
// 			$m = Model::get_model();
// 			$data=["inscription"=>$m->get_inscription($pseudo, $email, $motDePasse, $role)];
// 			$this->render("formulaire_authentification",$data);
// 			}
// 		}
// 	}
// }

public function action_inscription()
{
    if ( isset($_POST["prenom"]) && isset($_POST["pseudo"]) && isset($_POST["age"]) && isset($_POST["email"]) && isset($_POST["mot_de_passe"])) {
        if (!empty($_POST["prenom"]) && !empty($_POST["pseudo"]) && !empty($_POST["age"]) && !empty($_POST["email"]) && !empty($_POST["mot_de_passe"])) {

			$prenom = trim($_POST["prenom"]);
            $pseudo = trim($_POST["pseudo"]);
			$age = trim($_POST["age"]);
            $email = trim($_POST["email"]);
            $motDePasse = trim($_POST["mot_de_passe"]);

            $m = Model::get_model();
            $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);

            $data = ["inscription" => $m->get_inscription($prenom, $pseudo, $age, $email, $hashedPassword)];
            $this->render("formulaire_authentification", $data);
        }
    }
	}
}
?>


