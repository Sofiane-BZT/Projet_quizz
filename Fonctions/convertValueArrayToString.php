<?php

function convertValueArrayToString($reponses) {
    
    $repUtilisateur= []; // Tableau pour stocker les valeurs de réponse utilisateur
    foreach ($reponses as $rep) {
        $repUtilisateur[] = strval($rep->type_reponse); // Convertit la valeur en chaîne de caractères et l'ajoute dans le tableau
    }

    // Concaténation des valeurs de $typeRep en une seule chaîne
    $bString = implode("", $repUtilisateur);

    return $bString;

}
?>