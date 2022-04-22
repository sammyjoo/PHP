<?php

    session_start(); // à chaque fois que l'utilisateur charge / actualise la page, la session se lance ou se relance
    echo "Temps actuel : " . time() . "<br>";

    if(isset($_SESSION['temps'])){

        // si la session a été lancé et que le temps de référence a été défini
        if(time() > ($_SESSION['temps'] + $_SESSION['limite'])){
            // si le temps limite de la session est écoulé
            session_destroy(); // on la fait expirer en la détruisant
            echo "Déconnexion";
        } else {
            // si l'utilisateur rafraichit la page (et donc sa session grâce à la fonction session_start) avant que le temps limite soit écoulé
            $_SESSION['temps'] = time();
            echo "Connexion mise à jour";
        }
    
    } else {
        // si l'utilisateur se connecte une première fois après la création de la session
        echo "Connexion";
        // le timer de sa session se met en route
        $_SESSION['limite'] = 20; // on définit à 20 secondes la limite de temps
        $_SESSION['temps'] = time();
    }

        
?>