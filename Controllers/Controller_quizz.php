<?php

class Controller_quizz extends Controller
{
	public function action_default()
	{
		$this->action_accueil();
	}

	public function action_accueil()
	{
		$this->render("accueil");
	}


// -------------------------------------THEME ET NIVEAU SELECTIONNES--------------------------

public function action_quizz (){

	if (isset($_POST["theme"]))
	{

		if (!empty($_POST["theme"]))

		{

			$theme = trim($_POST["theme"]);
	
			// $motDePasse = trim($_POST["mot_de_passe"]); 
			// $role = trim($_POST["role"]);
			var_dump($theme);
			// var_dump($diff);

			if (empty($theme)) {
				echo "Veuillez sélectionner un thème et une difficulté avant de commencer la partie.";
			} else {
				// Les champs ont été sélectionnés, afficher une confirmation
				echo "Vous avez sélectionné le thème : $theme ";
			}



			// $m = Model::get_model();
			// $data=["inscription"=>$m->get_inscription($pseudo, $email, $motDePasse, $role)];
			// $this->render("formulaire_authentification",$data);
		}
	}
	}
}


?>