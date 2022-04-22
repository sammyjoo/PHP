<?php 
    // Session permet de conserver et de resservir à l'utilisateur des informations relatives à sa navigation courante
    session_start(); 
    
    $_SESSION['prenom'] = "Anthony";
    $_SESSION['nom'] = "Fieve";

    echo '<pre>'; print_r($_SESSION); echo '</pre>';

    /*
        Les informations d'une session sont enregistrées dans la session côté serveur (avec XAMPP, c'est un fichier TMP dans le dossier htdocs/tmp).

            fichier                             contenu
            htdocs/tmp/sess_*idsession* :       prenom|s:7:"Anthony";nom|s:5:"Fieve";
        
        
        Les données stockées dans la session sont pour la plupart des données sensibles (email, adresse, ville, mot de passe). C'est ce qui permet d'identifier l'internaute sur le site ET de faire le lien entre le serveur (& sa base de données) et le PC de l'internaute.

        C'est ce qui permet aussis de naviguer sur le site tout en restant connecté. La session permet de garder des variables actives quelque soit la page où l'internaute se trouve / se rend.

        Il y a 1 fichier session par utilisateur. La superglobale $_SESSION permet d'accéder et de remplir le fichier session.
        En local, les fichiers session sont accesssibles sur XAMPP dans le dossier 'C://xampp/tmp':
            - session_start() est une fonction prédéfinie qui permet de créer une fichier session
            - unset() permet de vider une information contenue dans le fichier
            - session_destroy() permet de détruire un fichier session
    */

    unset($_SESSION['nom']); // supprime une partie de la session
    /*      
        fichier                             contenu
        htdocs/tmp/sess_*idsession* :       prenom|s:7:"Anthony";
    */
    echo '<pre>'; print_r($_SESSION); echo '</pre>';

    // On rétablit la propriété "nom" pour l'utiliser dans la suite de l'exercice sur les autres pages du site
    $_SESSION['nom'] = "Fieve";
    echo '<pre>'; print_r($_SESSION); echo '</pre>';
    // session_destroy();
    // session_destroy() détruit la session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>07- SESSION</title>
</head>
<body>
    <a href="session2.php">lien vers la page 2</a>
</body>
</html>