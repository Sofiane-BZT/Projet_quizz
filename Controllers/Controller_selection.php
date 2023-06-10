<?php

require_once 'Fonctions/convertTypeRepToString.php';
require_once 'Fonctions/convertValueArrayToString.php';
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
        $_SESSION['compteur'] = 0;
        $_SESSION['score'] = 0;
        // var_dump($_SESSION['ls_id_question']);
        // var_dump($_SESSION['compteur']);
        $this->render("init_reussie");
    }

// ----------------------Récupération intitulé pour une question - réponses possibles - type de réponse - transfome type-reponse en string --------------------------
    

    public function action_question_reponse_type_rep() {

        $idQuestion = $_SESSION['ls_id_question'][$_SESSION['compteur']]->id_question;
        // var_dump($idQuestion);
        $m = Model::get_model();
        $question = $m->get_intitule_question($idQuestion);
        $reponse = $m->get_intitule_reponse($idQuestion);
        var_dump($reponse);
        $typeReponse = $m->get_type_reponse($idQuestion);

        convertTypeRepToString($typeReponse);

        $data = [
            "question" => $question,
            "reponse" => $reponse,
            "typeRep" => $typeReponse,
            "isCheckbox" => convertTypeRepToString($typeReponse) > 1
        ];

        $_SESSION['compteur']++; // Augmenter la valeur de compteur pour passer à la question suivante
        $_SESSION['ls_id_question'][$_SESSION['compteur']];

    // Vérifier si toutes les questions ont été affichées
    if ($_SESSION['compteur'] >= count($_SESSION['ls_id_question'])) {
        // Toutes les questions ont été affichées, vous pouvez afficher un message de fin de quizz ou rediriger vers une autre page
        $this->render("accueil");
    } else {
        // Il reste des questions, afficher la prochaine question
        $this->render("quizz", $data);

    }


    if (isset($_POST["reponse"]))
    {
        if (!empty($_POST["reponse"]))
        {
    // je récupere la réponses de la question précédente pour la comparer à la soumission que je viens de faire 
    // Sinon un décalage se fait et ma réponse se compage à la question nouvelle

    $compteur = $_SESSION['compteur'] - 1;
$idQuestion = $_SESSION['ls_id_question'][$compteur]->id_question;
$typeReponse = $m->get_type_reponse($idQuestion);
// réponses recus par la BD avec la requette juste ci-dessus et converti en tableau de string pat la fonction convertValueArrayToString
$reponseBD = convertValueArrayToString($typeReponse);

// reponses choisies par le joueur envoyé par le formulaire avec la methode post  en tableau de string pat la fonction convertValueArrayToString

    $reponses = convertValueArrayToString($_POST['reponse']);

    $score= $_SESSION['score'] ;
    var_dump($_POST['reponse']);
var_dump($reponses);
var_dump($reponseBD);
    if($reponses === $reponseBD) {

        $score++;
        // var_dump($score);
    } else {
    
            $_SESSION['score'] = $score;
            // var_dump($_SESSION['score']);
        }
    }
}

    }
}
?>