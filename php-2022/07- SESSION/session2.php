<?php
    session_start(); // crée une session OU ouvre la session déjà créée si elle existe

    $_SESSION['pseudo'] = "AF";
    
    echo "Bienvenue" . " " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " ( <b>" . $_SESSION['pseudo'] . "</b> )" . "<br>"; // les informations de la session générées durant le chargement de la première page 'session.php' ont été conservées
?>