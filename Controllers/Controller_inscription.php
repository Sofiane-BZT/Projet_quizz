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

public function action_inscription (){

	if (isset($_POST["pseudo"]) AND isset($_POST["email"]) AND isset($_POST["mot_de_passe"])
	AND isset($_POST["role"]))
	{

		if (!empty($_POST["pseudo"]) AND !empty($_POST["email"]) AND !empty($_POST["mot_de_passe"]) 
		AND ($_POST["role"] >= 0))
		{

			$pseudo = trim($_POST["pseudo"]);
			$email = trim($_POST["email"]);
			$motDePasse = trim($_POST["mot_de_passe"]); 
			$role = trim($_POST["role"]);

		
			$m = Model::get_model();
			$data=["inscription"=>$m->get_inscription($pseudo, $email, $motDePasse, $role)];
			$this->render("formulaire_authentification",$data);
			}
		}
	}
}


?>


