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

// -------------------------Recuperer les informations sur un livre-----------------------------

public function action_recuperer_infos_profil () {

    $idUtilisateur = $_GET['id'];
    $m = Model::get_model();
    $data=["recuperer_infos_profil"=>$m->get_recuperer_infos_profil($idUtilisateur)];
    // var_dump($data["recuperer_infos_profil"]->id_utilisateur); 
    $this->render("modifier_profil",$data);

}

}

	

?> 













