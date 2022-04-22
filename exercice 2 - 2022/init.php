<?php
// connexion à la base de données

$bdd = new PDO('mysql:host=localhost:8888; dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



    // SESSION

    session_start();

    // CONSTANTES
    define("URL","http://localhost:8888/EvaluationPHP_sammy/formulaire.php");

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