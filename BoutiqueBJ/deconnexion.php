<?php
    include_once("include/init.php"); // rappel : session_start()


    if(membreConnecte())
    {
        unset($_SESSION['membre']); // efface la key 'membre'

        header("Location:" . URL . "connexion.php"); exit; // redirection
    }
    else
    {
        include_once('include/header.php');
        include_once('include/erreur403.php');
        include_once('include/footer.php');
    }

   