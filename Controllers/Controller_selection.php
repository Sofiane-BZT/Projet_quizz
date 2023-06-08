<?php

class Controller_selection extends Controller
{
	public function action_default()
	{
		$this->action_accueil();
	}

	public function action_accueil()
	{
		$this->render("accueil");
	}


// ----------------------------------------Tout les themes--------------------------------

    public function action_all_themes() {
        $m = Model::get_model();
        $data = ["themes" => $m->get_all_themes()];
        $this->render("themes", $data);
        // var_dump($data);
    }


// ------------------------------------Tout les niveaux--------------------------------

    // public function action_all_niveaux() {
    //     $theme = $_GET['id_theme'];
    //     $_SESSION['theme'] = $theme;
    //     $m = Model::get_model();
    //     $data = ["niveaux" => $m->get_all_niveaux($_SESSION['theme'])];
    //     $this->render("niveaux", $data);
    //     // var_dump($data);
    // }

    public function action_all_niveaux() {
        // Vérifier si id_theme est présent dans la requête
        if (isset($_GET['id_theme'])) {
            // Valider et filtrer la valeur de id_theme
            $theme = filter_var($_GET['id_theme'], FILTER_VALIDATE_INT);
            
            // Vérifier si la valeur de id_theme est valide
            if ($theme !== false) {
                // Stocker la valeur de id_theme dans la variable de session
                $_SESSION['theme'] = $theme;
    
                // Continuer le traitement
                $m = Model::get_model();
                $data = ["niveaux" => $m->get_all_niveaux($_SESSION['theme'])];
                $this->render("niveaux", $data);
            } else {
                // La valeur de id_theme n'est pas valide, gérer l'erreur
                echo "Erreur : id_theme invalide.";
            }
        } else {
            // id_theme n'est pas présent dans la requête, gérer l'erreur
            echo "Erreur : id_theme manquant.";
        }
    }


    public function action_all_liste_id_question() {
        $niveau = $_GET['niveau_question'];
        $_SESSION['niveau_question'] = $niveau;
        $m = Model::get_model();
        $listeIdQuestion = $m->get_all_liste_id_question($_SESSION['theme'], $_SESSION['niveau_question']);
        $_SESSION['ls_id_question'] = $listeIdQuestion;
        $cpt = 0;
        $_SESSION['compteur'] = $cpt;
    
        $idQuestion = $listeIdQuestion[$cpt]->id_question;
        
        $question = $m->get_intitule_question($idQuestion);
        $reponse = $m->get_intitule_reponse($idQuestion);
        $typeReponse = $m->get_type_reponse($idQuestion);
    
        $typeRep = []; // Tableau pour stocker les valeurs de type_reponse
        foreach ($typeReponse as $r) {
            $typeRep[] = strval($r->type_reponse); // Convertit la valeur en chaîne de caractères et l'ajoute dans le tableau
        }
    
        $data = [
            "question" => $question,
            "reponse" => $reponse,
            "typeRep" => $typeRep
        ];
    var_dump($typeRep);
        $this->render("quizz", $data);
    }

    // public function action_all_liste_id_question() {
    //     $niveau = $_GET['niveau_question'];
    //     $_SESSION['niveau_question'] = $niveau;
    //     $m = Model::get_model();
    //     $listeIdQuestion = $m->get_all_liste_id_question($_SESSION['theme'], $_SESSION['niveau_question']);
    //     $_SESSION['ls_id_question'] = $listeIdQuestion;
    //     $cpt = 0;
    //     $_SESSION['compteur'] = $cpt;
    //     // var_dump($listeIdQuestion);

    //     $idQuestion = $listeIdQuestion[$cpt]->id_question;
        
    //     $data = [
    //         "question" => $m->get_intitule_question($idQuestion),
    //         "reponse" => $m->get_intitule_reponse($idQuestion),
    //         "typeReponse" => $m->get_type_reponse($idQuestion)
    //     ];
       
    //     $typeRep = []; // Tableau pour stocker les valeurs de type_reponse
    // foreach ($data as $r) {
    //     $typeRep[] = strval($r->type_reponse); // Convertit la valeur en chaîne de caractères et l'ajoute dans le tableau
    // }
    // echo($data);
    //     // var_dump($data);
    //     $this->render("quizz", $data);

    // }






}
?>