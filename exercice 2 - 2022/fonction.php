<?php

    // création de la fonction
    function tableau($tableau)
    {
        echo "<hr>";
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
        echo "<hr>";
    }
    //tableau($_POST); // appel de la fonction



    function membreConnecte() // bool
    {
        if(isset($_SESSION['membre']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function adminConnecte() // bool
    {
        if(membreConnecte() && $_SESSION['membre']['statut'] == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }