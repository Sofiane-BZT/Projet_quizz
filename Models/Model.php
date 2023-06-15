<?php

    class Model 
    {   // Début de la Classe

        private $bd ;
        
        private static $instance = null ;

        /*
         * Constructeur créant l'objet PDO et l'affectant à $bd
         */
        private function __construct() {  // Fonction qui sert à faire le lien avec la BDD

            $dsn = "mysql:host=localhost;dbname=qcmDB"  ;   // Coordonnées de la BDD
            $login = "root" ;   // Identifiant d'accès à la BDD
            $mdp = "" ; // Mot de passe d'accès à la BDD
            $this->bd = new PDO($dsn, $login, $mdp) ;
            $this->bd->query("SET NAMES 'utf8'") ;
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

        }


        // get_model()

        public static function get_model() {    // Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller (équivalent de $connex)
            if (is_null(self::$instance))
            {
                self::$instance = new Model() ;
            }
            return self::$instance ;
        }

        // public function get_all_livres() {

        //     $r = $this->bd->prepare("SELECT * FROM Livres" ) ;
        //     $r->execute() ;

        //     return $r->fetchAll(PDO::FETCH_OBJ) ;

        // }

/*---------------------------------------------------------------------------------------------------
-----------------------------------AUTHENTIFICATION / INSCRIPTION------------------------------------
----------------------------------------------------------------------------------------------------*/

//----------------------------------------Authentification---------------------------------

public function get_authentification($pseudo)
{
    $r = $this->bd->prepare("SELECT * FROM utilisateur WHERE pseudo_utilisateur = :pseudo");
    $r->bindValue(':pseudo', $pseudo);
    $r->execute();
    return $r->fetch(PDO::FETCH_OBJ);
}

// -------------------------------------------Inscription---------------------------------------

public function get_inscription ($prenom, $pseudo, $age, $email, $hashedPassword){

    $r = $this->bd->prepare("INSERT INTO `utilisateur` (prenom_utilisateur, pseudo_utilisateur, age_utilisateur, email_utilisateur, mdp_utilisateur)
    VALUE (:Prenom_utilisateur, :Pseudo_utilisateur, :Age_utilisateur, :Email_utilisateur, :Mdp_utilisateur)");
    
    $r->bindValue(':Prenom_utilisateur', $prenom);
    $r->bindValue(':Pseudo_utilisateur', $pseudo);
    $r->bindValue(':Age_utilisateur', $age);
    $r->bindValue(':Email_utilisateur', $email);
    $r->bindValue(':Mdp_utilisateur', $hashedPassword);

 var_dump($r);
    $r->execute();

    return $r->fetchall(PDO::FETCH_OBJ);
}


// -------------------------------------Récupération des Thèmes---------------------------------------

public function get_all_themes() {

    $r = $this->bd->prepare("SELECT * FROM theme" ) ;
    $r->execute() ;
    return $r->fetchAll(PDO::FETCH_OBJ) ;
   
}

// -------------------------------------Récupération des niveaux---------------------------------------

public function get_all_niveaux() {
    $r = $this->bd->prepare("SELECT DISTINCT niveau_question FROM question");
    $r->execute();
    return $r->fetchAll(PDO::FETCH_OBJ);
    // var_dump($r);
}

// --------------------------Récupération des questions selon le theme et le niveau----------------------


    public function get_all_liste_id_question($theme, $niveau) {
        $r = $this->bd->prepare("SELECT id_question FROM question WHERE `id_theme` = :theme AND `niveau_question` = :niveau ORDER BY RAND() LIMIT 20");
        $r->bindParam(':theme', $theme);
        $r->bindParam(':niveau', $niveau);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
}

public function get_intitule_question($idQuestion) {
    // var_dump($idQuestion);
    $r = $this->bd->prepare("SELECT intitule_question FROM question WHERE `id_question` = :Id_question");
    $r->bindParam(':Id_question', $idQuestion);
    $r->execute();
    return $r->fetchColumn();
}

public function get_reponse_bd($idQuestion) {
    $r = $this->bd->prepare("SELECT intitule_reponse, type_reponse, id_reponse FROM reponse WHERE `id_question` = :Id_question");
    // var_dump($idQuestion);
    $r->bindParam(':Id_question', $idQuestion);
    $r->execute();
    return $r->fetchAll(PDO::FETCH_OBJ);
}

//------------requête pour récupérer les ids des réponse dont le type réponse = 1 selon id de la question--------

public function get_idRepTypeRepUn($idQuestion) {
    $r = $this->bd->prepare("SELECT id_reponse FROM reponse WHERE `type_reponse`= 1 AND id_question = :Id_question");
    $r->bindParam(':Id_question', $idQuestion);
    // var_dump($idQuestion);

    $r->execute();
    return $r->fetchAll(PDO::FETCH_COLUMN);
}

// ---------------------------------Stockage du theme, niveau, score à la fin de la partie---------------

public function get_stk_resut_partie ($idUtilisateur, $theme, $niveau, $score){

    $r = $this->bd->prepare("INSERT INTO `choisi` (id_utilisateur, id_theme, niveau, score, date_choix)
    VALUE (:Id_utilisateur, :Id_theme, :Niveau, :Score , :Role_utilisateur, NOW())");

    $r->bindValue(':Id_utilisateur', $idUtilisateur); 
    $r->bindValue(':Id_theme', $theme); 
    $r->bindValue(':Niveau', $niveau);
    $r->bindValue(':Score', $score);

    $r->execute();

    return $r->fetchAll(PDO::FETCH_OBJ);
}

//--------------------------------Afficher informations sur le profil connecté-----------------------------------

public function get_all_infos_profil($idUtilisateur) {

    $r = $this->bd->prepare("SELECT id_utilisateur, prenom_utilisateur, pseudo_utilisateur, age_utilisateur, email_utilisateur FROM utilisateur WHERE `id_utilisateur` = :Id_utilisateur");
    // var_dump($idQuestion);
    $r->bindParam(':Id_utilisateur', $idUtilisateur);
    $r->execute();
    return $r->fetch(PDO::FETCH_OBJ);
}

//--------------------------------Récupérer informations sur le profil connecté-----------------------------------

public function get_recuperer_infos_profil($idUtilisateur) {

    $r = $this->bd->prepare("SELECT id_utilisateur, prenom_utilisateur, pseudo_utilisateur, age_utilisateur, email_utilisateur FROM utilisateur WHERE `id_utilisateur` = :Id_utilisateur");
    // var_dump($idQuestion);
    $r->bindParam(':Id_utilisateur', $idUtilisateur);
    $r->execute();
    return $r->fetch(PDO::FETCH_OBJ);

}

//----------------------------------------Modifier profil-------------------------------------------------

public function get_modifier_profil($pseudoUtilisateur, $emailUtilisateur, $idUtilisateur) {

    $r = $this->bd->prepare("UPDATE `utilisateur` SET pseudo_utilisateur=:pseudoUtilisateur, email_utilisateur=:emailUtilisateur WHERE `id_utilisateur`= $idUtilisateur");
    $r->bindValue(':pseudoUtilisateur', $pseudoUtilisateur);
    $r->bindValue(':emailUtilisateur', $emailUtilisateur);
    $r->execute();

    return $r->fetch(PDO::FETCH_OBJ);
}

// -----------------------------------------Suppression profil----------------------------------------------

public function get_suppression_profil($idUtilisateur) {

    $r = $this->bd->prepare("DELETE FROM utilisateur WHERE `id_utilisateur`=:idUtilisateur");
    $r->bindValue(':idUtilisateur', $idUtilisateur);
    $r->execute();

    return $r->fetchAll(PDO::FETCH_OBJ);
} 


}

// Fin de la Classe