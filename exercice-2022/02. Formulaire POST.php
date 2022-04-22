
<?php
//Créer  un  formulaire d'inscription  en  HTML  avec  une  récupération  des  saisies  en  PHP. 
//L'objectif  est  de  récupérer  les  saisies  postées  sur  la  même  page  (juste  au  dessus  du  formulaire).
//
//Pour cela, créer un fichier "formulaire.php"
//
//Champs à prévoir : nom, prénom, adresse, ville, code postal, sexe, email, description
//
//  - Afficher les données du formulaire en haut de page
//
//  - Faites en sorte d'informer l'internaute si le champ "nom" est laissé vide
//
//  - Faites en sorte d'informer l'internaute si l'email n'est pas du bon format 
//
//  - Faites en sorte d'informer l'internaute si le champ "code postal" n'est pas de type numérique 
//
//  - Faites en sorte d'informer l'internaute si la description n'est pas comprise entre 2 et 300 caractères
//  
//  - Faites en sorte d'aficher un message de validation si l'internaute a correctement rempli le formulaire

  ?>

  <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>Formulaire Post sammy</title>
</head>
<body>

    <div class="container">

    <h1 class="display-4 text-center"> FORMULAIRE DU GAGNANT DU LOTO </h1><hr>

    <?php
        if ($_POST) {

            echo "<div class='alert alert-warning col-md-4 mx-auto text-center'>";
            foreach($_POST as $key => $value) {
                echo "$key : $value <br>";
            }
            echo "</div>";


            if(iconv_strlen($_POST['description']) < 2 || iconv_strlen($_POST['description']) > 300) {
                $errorDescription = "<p class='font-italic text-danger'>Le champs description doit contenir entre 2 et 300 caractères</p>";
                $error = true;
            }

            if(empty($_POST['nom'])) {
                $errorNom = "<p class='font-italic text-danger'> Merci de saisir votre nom </p>";
                $error = true;
            } 

            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errorEmail = "<p class='font-italic text-danger'> Votre adresse email n'est pas valide </p>";
                $error = true;
            }
            
            if(!is_numeric($_POST['cp']) || iconv_strlen($_POST['cp']) !== 5) {
                $errorCp = "<p class='font-italic text-danger'> Merci de saisir un code postal valide en 5 caractères. </p>";
                $error = true;
            }
        }

        if(!isset($error)) {
            $validPost = "<p class='font-italic alert alert-success mx-auto text-center'>Vous êtes désormais inscrit.<br>Bienvenue <b>" . $_POST['description'] . "</b> !";
        }

        if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['description'])) {
            $errorRegex = "<p class='font-italic text-danger'>Caractères autorisés pour le champs description : Lettres et chiffres</p>";
            $error = true;
        }
    ?>

    <form action="" method="post" class="col-md-6 mx-auto">
        <div class="row">
            <div class="form-group col-md-6 mt-2">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control">
                <?php if (isset($errorDescription)) echo $errorDescription; ?>
                <?php if (isset($errorRegex)) echo $errorRegex; ?>
            </div>
            <div class="form-group col-md-6 mt-2 text-center">
                <label class="form-check-label" for="flexCheckDefault">Femme</label>
                <input class="form-check-input" type="checkbox" value="sexeF" id="flexCheckDefault">

                <label class="form-check-label" for="flexCheckDefault">Homme</label>
                <input class="form-check-input" type="checkbox" value="sexeH" id="flexCheckDefault">
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