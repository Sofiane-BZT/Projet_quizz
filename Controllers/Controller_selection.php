<?php

require_once 'Fonctions/convertTypeRepToString.php';
require_once 'Fonctions/comparTab.php';
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

// ------------------------------Récupération liste id_question selon theme et niveau - initialisation compteur -------------------------------------------------------
    
        public function action_init() {

        $niveau = $_GET['niveau_question'];
        $_SESSION['niveau_question'] = $niveau;
        // var_dump($niveau);
        $m = Model::get_model();
        $listeIdQuestion = $m->get_all_liste_id_question($_SESSION['theme'], $_SESSION['niveau_question']);
        $_SESSION['ls_id_question'] = $listeIdQuestion;
        $_SESSION['compteur'] = -1;
        $_SESSION['score'] = 0;
        // var_dump($listeIdQuestion);
        // var_dump($_SESSION['ls_id_question']);
        // // exit;
        // var_dump($_SESSION['compteur']);
        // $this->render("init_reussie");
        header("Location: ?controller=selection&action=question_reponse_type_rep");
    }

// ----------------------Récupération intitulé pour une question - réponses possibles - type de réponse - transfome type-reponse en string --------------------------
    

    public function action_question_reponse_type_rep() {
        var_dump($_POST);
        $m = Model::get_model();
       
            // Augmenter la valeur de compteur pour passer à la question suivante
            $_SESSION['compteur']++;
            if (isset($_POST["reponse"]))
        {
            
                // var_dump($_SESSION['compteur']);
                // Récupération des réponses sélectionnées par le joueur
                $reponsesSelectionneesJoueur = $_POST["reponse"];
                // var_dump($reponsesSelectionneesJoueur);
                // Stockage des réponses sélectionnées dans $_SESSION
     
                /* je récupere la réponses de la question précédente pour la comparer à la soumission que je viens de faire 
                Sinon un décalage se fait et ma réponse se compage à la question nouvelle */

                $compteur = $_SESSION['compteur'] - 1;
                $idQuestion = $_SESSION['ls_id_question'][$compteur]->id_question;
                var_dump($compteur);
                var_dump($idQuestion);

                //récupération des id_reponse dont type_rep = 1 selon id de la question posée

                $typeReponseUn = $m->get_idRepTypeRepUn($idQuestion);
                    var_dump($typeReponseUn);

                // réponses recus par la BD avec la requette juste ci-dessus et converti en tableau de string pat la fonction convertValueArrayToString

                //fonction comparTab qui va compare les deux tableaux

                $resultat = comparTab($typeReponseUn, $reponsesSelectionneesJoueur);

                $score= $_SESSION['score'] ;
                // var_dump($_POST['reponse']);
                // var_dump($reponses);
                // var_dump($reponseBD);


                // Vérification du résultat de la comparaison
                if ($resultat) {
                // Les tableaux ont la même longueur et les mêmes "id_reponse"
                $score++;
                $_SESSION['score'] = $score;
   
            } 
                    echo("le score est de : ".$_SESSION['score']);
        }
    

    // Vérifier si toutes les questions ont été affichées
    if ($_SESSION['compteur'] == count($_SESSION['ls_id_question'])) {
        // Toutes les questions ont été affichées

        // $m->get_stk_resut_partie($_SESSION['theme'], $_SESSION['niveau_question'], $_SESSION['score']);
        $this->render("score_final");

        // action pour stocker le theme, niveau, score 

        

    } else {

        $idQuestion = $_SESSION['ls_id_question'][$_SESSION['compteur']]->id_question;
        // var_dump($idQuestion);
        
        $question = $m->get_intitule_question($idQuestion);
        $reponses = $m->get_reponse_bd($idQuestion);
        // var_dump($reponses);
        
        // Récupération des valeurs pour chaque colonne dans la base de donnée

            $intituleReponses = array_column($reponses, 'intitule_reponse');
            // var_dump($intituleReponses);
            $typeReponse = array_column($reponses, 'type_reponse');
            // var_dump($typeReponse);
            $idsReponses = array_column($reponses, 'id_reponse');


            // Tableau pour stocker les id_reponse dont le type_reponse vaut 1

            // $idReponseJusteBd = array(); 

            // foreach ($reponses as $reponse) {
            //     if ($typeReponse == 1) {
            //         $idReponseJusteBd[] = $reponse['id_reponse'];
            //     }
            // }


        // informations que je fournis à la vue
        $data = [
            "question" => $question,
            "reponse" => $intituleReponses,
            "idReponse" => $idsReponses,
            // "typeRep" => $typeReponse,
            "isCheckbox" => convertTypeRepToString($typeReponse) > 1
        ];

        // $_SESSION['ls_id_question'][$_SESSION['compteur']];
        // Il reste des questions, affichage la prochaine question
        $this->render("quizz", $data);

    }

    }
}
?>