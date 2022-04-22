<?php

// Créer une fonction qui calcule le coût d'un panier selon le fruit voulu et le poids voulu
function calcul($fruit, $poids) {
    switch($fruit) {
        case 'cerises':
            $prix_kg = 5.76; // prix au kg
            break;
        case 'bananes':
            $prix_kg = 1.09;
            break;
        case 'oranges':
            $prix_kg = 1.46;
            break;
        case 'peches':
            $prix_kg = 3.76;
            break;
        default:
            return 'je ne sais pas quel fruit vous voulez';
            break;
    }

    // $result = $poids * $prix_kg;
    $result = round( ( ($poids * $prix_kg) / 1000 ), 4);

    // echo "Vos $poids" . "g de $fruit vous coûteront $result €." . '<br>';

    $commande = array(
        'poids' => $poids,
        'fruit' => $fruit,
        'prix' => $result
    );


    return $commande;
}

