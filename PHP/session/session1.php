<?php

// $_GET et $_POST sont de base créer et vides (à nous de les utiliser)
// $_SESSION n'est pas créée de base, il faut "l'allumer"

// $_SESSION conserve ses valeurs sur toutes les pages
// la seul facon de les retirer est de le demande

// exemple d'utilisation : connexion / panier etc ...

// destroy_session
// unset

session_start();// on allume la session

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$_SESSION ['membre']=[
    "nom"=> "lord",
    "prenom"=> "bart"
];

$_SESSION ['panier']=[
    "bague"=> 100,
    "collier"=> "très chère"
];


//unset($_SESSION ['membre']); // suppression du tableau
//unset($_SESSION ['membre']['prenom']); // suppression ciblé sur "prénom"
//session_destroy();// suppression de la session entièrement 