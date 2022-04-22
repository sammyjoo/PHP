<?php
// connexion à la base de données

$pdoObject = new PDO(
    "mysql:host=localhost:8889; dbname=boutiqueBJ", // serveur + bdd  ----// mac localhost:8888
    "root", // identifiant 
    "root", // mdp (rien : windows et root pour mac)
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // rapport d'erreurs
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // forcer l'encodage utf8
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // par défaut 
    )
);


    // SESSION

    session_start();

    // CONSTANTES
    define("URL","http://localhost:8888/boutiqueBJ/");

    //VARIABLES
    $notification = "";
    $counter = 0;
    $acces = true;

    //sécurité des formulaires, xss

    foreach($_POST as $key => $value)
    {
        $_POST[$key]= strip_tags($value);// strip_tags() permet de supprimer les balises
    }

    //FONCTIONS

    include_once("fonction.php");

?>