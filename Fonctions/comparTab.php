<?php

function comparTab($typeReponseUn, $reponsesSelectionneesJoueur) {
    
    if (count($typeReponseUn) != count($reponsesSelectionneesJoueur)) {
   
        return false;
    }
        foreach ($reponsesSelectionneesJoueur as $reponseSelectionneeJ) {
            if (!in_array($reponseSelectionneeJ, $typeReponseUn)) {
               return false; // Sort de la boucle dès qu'une réponse sélectionnée n'est pas présente dans le tableau $typeReponseUn[]
            }
        }
    return true; 
}
?>



