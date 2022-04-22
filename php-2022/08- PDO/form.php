<?php 
//* Exercice : créer un formulaire permettant d'insérer une nouvelle entrée dans la BDD employés
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <title>08. Formulaire - Ajouter un employé à la BDD</title>
    </head>
    <body>
    <?php

        /*
            EXERCICE : Ajouter un employé à la BDD via un formulaire
            1. Réaliser un formulaire correspondant à la table 'employes' de la BDD 'entreprise' (tous les champs sauf id_employes)
            2. Connectez-vous à la BDD
            3. Contrôlez en PHP que l'on réceptionne bien toutes les données saisies dans le formulaire
            4. Réaliser le traitement PHP/SQL permettant d'insérer un employé directement à la validation du formulaire. Afficher en haut du formulaire les informations introduites par l'internaute.
        */

        $bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // echo '<pre>'; print_r(get_class_methods($bdd)); echo '</pre>';


        $resultat = $bdd -> query("SELECT * FROM employes");
        
        echo "<div class='container w-80'>";
        echo "<h1 class='display-6'>Formulaire</h1>";
        echo "<h2 class='display-8'>Inscription d'un nouvel employé dans la BDD</h1>";
        echo "<form action='action.php' method='post'>";

        $champs = array();
        
        // Générer le formulaire de façon automatique en fonction du nom des champs de la base de données
        for($i=0; $i<$resultat->columnCount(); $i++){
            
            echo "<div class='form-group'>";
            $champ = $resultat -> getColumnMeta($i)['name'];
            array_push($champs, $champ);
            switch($champ){
                case 'nom':
                case 'prenom':
                    $type = 'text';
                    echo "<label for='$champ'>$champ</label><input type='$type' name='$champ' id='$champ' class='form-control'>";
                    break;
                case 'sexe':
                case 'service':
                    echo "<label for='$champ'>$champ</label><select name='$champ' id='$champ' class='form-control'>";
                    if($champ === 'sexe'){
                        $options = ['m', 'f'];
                    } elseif($champ === 'service') {
                        $options = ['direction', 'secretariat', 'commercial', 'production', 'informatique'];
                    }
                    foreach($options as $opt){
                        echo "<option value='$opt'>$opt</option>";
                    }
                    echo "</select>";
                    break;
                case 'date_embauche':
                    $type = 'date';
                    echo "<label for='$champ'>$champ</label><input type='$type' name='$champ' id='$champ' class='form-control'>";
                    break;
                case 'salaire':
                    $type = 'number';
                    echo "<label for='$champ'>$champ</label><input type='$type' name='$champ' id='$champ' class='form-control'>";
                    break;
            }
            echo "</div>";
        }
        echo "<button type='submit' class='form-control mt-4'>Envoyer</button>";
        echo '</form>';


        
        
        // $insert = '';


    ?>
        <!-- <div class="container w-50 text-center">    
            <h1>Formulaire</h1>
            <p>Ajouter un employé à la BDD entreprise</p>
            <form action="pdo.php">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input class="form-control form-control-sm" type="text" name="prenom" id="prenom">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input class="form-control form-control-sm" type="text" name="nom" id="nom">
                </div>
                <div class="form-group">
                    <label for="sexe">Sexe</label>
                    <select class="form-control form-control-sm" name="sexe" id="sexe">
                        <option value="">m</option>
                        <option value="">f</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <select class="form-control form-control-sm" name="service" id="service">
                        <option value="direction">direction</option>
                        <option value="secretariat">secretariat</option>
                        <option value="commercial">commercial</option>
                        <option value="production">production</option>
                        <option value="informatique">informatique</option>
                    </select>
                </div>
            </form>
        </div> -->
    </body>
</html>