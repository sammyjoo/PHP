<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>03-POST - formulaire2</title>
</head>
<body>

    <div class="container">

    <h1 class="display-4 text-center"> 03-POST - formulaire2 </h1><hr>

    <?php
        // 1. Réaliser un formulaire en HTML avec les champs suivants : Pseudo, Nom, Prénom, Email, Adresse, Code postal et Ville. Sans oublier bien sûr le bouton de validation
        // 2. Controler en PHP que l'on réceptionne bien toutes les données du formulaire
        if ($_POST) {
            // En PHP, les données saisies dans un formulaire vont se stocker automatiquement dans la superglobale $_POST, le tableau ARRAY a pour indice les attributs 'name' déclarés dans le formulaire HTML
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";

            // echo $_POST['pseudo'] . $_POST['mdp'] . $_POST['nom'] . $_POST['prenom'] . $_POST['adresse'] . $_POST['email'] . $_POST['cp'] . $_POST['ville'] . '<hr>';

            // Autre méthode pour simplifier l'écriture en enlevant les crochets 
            // extract($_POST);
            // On affiche sur la page web les données saisies dans le formulaire (voir ligne 26 aussi) en passant par la superglobale  $_POST avec un affichage conventionnel (echo)
            // echo $pseudo . $mdp . $nom . $prenom . $adresse . $email . $cp . $ville . '<hr>';

            // 3. Afficher les données du formulaire en haut de page
            echo "<div class='alert alert-warning col-md-4 mx-auto text-center'>";
            foreach($_POST as $key => $value) {
                echo "$key : $value <br>";
            }
            echo "</div>";

            // 4. Faites en sorte d'informer l'internaute si le pseudo n'est pas compris entre 2 et 20 caractères avec la fonction prédéfinie iconv_strlen()

            // Si la taille du champ 'pseudo' est inférieure à 2 caractères ou si la taille du champ 'pseudo' est suprieure à 20 caractères, alors on entre dans les accolades et on affiche un message d'erreur
            if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20) {
                $errorPseudo = "<p class='font-italic text-danger'>Le pseudo doit contenir entre 2 et 20 caractères</p>";
                $error = true;
            }

            // 5. Faites en sorte d'informer l'internaute si le champ "nom" est vide
            if(empty($_POST['nom'])) {
                $errorNom = "<p class='font-italic text-danger'> Merci de saisir votre nom </p>";
                $error = true;
            } 

            // 6. Faites en sorte d'informer l'internaute si l'email n'est pas de bon format (fonction prédéfinie filter_var())
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errorEmail = "<p class='font-italic text-danger'> Votre adresse email n'est pas valide </p>";
                $error = true;
            }
            
            // 7. Faites en sorte d'informer l'internaute si le champ "code postal" n'est pas de type numérique (fonction prédéfinie is_numeric()) et si sa taille est différente de 5 caractères
            if(!is_numeric($_POST['cp']) || iconv_strlen($_POST['cp']) !== 5) {
                $errorCp = "<p class='font-italic text-danger'> Merci de saisir un code postal valide en 5 caractères. </p>";
                $error = true;
            }
        }

        // 8. Faites en sorte d'afficher un message de validation si l'internaute a correctement rempli le formulaire
        if(!isset($error)) {
            $validPost = "<p class='font-italic alert alert-success mx-auto text-center'>Vous êtes désormais inscrit.<br>Bienvenue <b>" . $_POST['pseudo'] . "</b> !";
        }

        // EXPRESSION REGULIERE (regex)
        // Si le champ 'pseudo' NE CONTIENT PAS 
        if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])) {
            // Le regex comparé à l'input utilisateur autorise les lettres a-z , A-Z, & les chiffres 0-9
            $errorRegex = "<p class='font-italic text-danger'>Caractères autorisés pour le pseudo : Lettres et chiffres</p>";
            $error = true;
        }
    ?>

    <form action="" method="post" class="col-md-6 mx-auto">
        <div class="row">
            <div class="form-group col-md-6 mt-2">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="form-control">
                <?php if (isset($errorPseudo)) echo $errorPseudo; ?>
                <?php if (isset($errorRegex)) echo $errorRegex; ?>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="mdp">Mot de passe</label>
                <input type="password"  class="form-control" name="mdp">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="nom">Nom</label>
                <input type="text"  class="form-control" name="nom">
                <?php if (isset($errorNom)) echo $errorNom; ?>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="">Prénom</label>
                <input type="text"  class="form-control" name="prenom">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="email">Email</label>
                <input type="email"  class="form-control" name="email">
                <?php if (isset($errorEmail)) echo $errorEmail; ?>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="">Adresse</label>
                <input type="text"  class="form-control" name="adresse">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="">Code postal</label>
                <input type="number"  class="form-control" name="cp">
                <?php if (isset($errorCp)) echo $errorCp ?>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="ville">Ville</label>
                <input type="text"  class="form-control" name="ville">
            </div>
        </div><br>

        <div class="text-center">
            <input type="submit" class="btn btn-success mt-5">
        </div>
    </form><br>
    
    <?php if(isset($validPost)) echo $validPost ?>

    </div>
</body>
</html>