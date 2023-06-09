
<?php

function convertTypeRepToString($typeReponse) {
    $typeRep = []; // Tableau pour stocker les valeurs de type_reponse
    foreach ($typeReponse as $r) {
        $typeRep[] = strval($r->type_reponse); // Convertit la valeur en chaîne de caractères et l'ajoute dans le tableau
    }

    // Concaténation des valeurs de $typeRep en une seule chaîne
    $binaryString = implode("", $typeRep);

    // Utilisation de substr_count pour compter le nombre de fois où "1" apparaît dans la chaîne
    $count = substr_count($binaryString, '1');

    return $count;

}
?>