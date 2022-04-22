<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>Evalution PHP - formulaire</title>
</head>
<body>

    <div class="container">

    <h1 class="display-4 text-center"> Information</h1><hr>

    <?php

  include_once("init.php");
 
        if ($_POST) {

            echo "<div class='alert alert-warning col-md-4 mx-auto text-center'>";
            foreach($_POST as $key => $value) {
                echo "$key : $value <br>";
            }
            echo "</div>";


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
                <label for="nom">Nom *</label>
                <input type="text"  class="form-control" name="nom">
                <?php if (isset($errorNom)) echo $errorNom; ?>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="">Prénom *</label>
                <input type="text"  class="form-control" name="prenom">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="telephone">Téléphone*</label>
                <input type="tel" class="form-control" pattern="[0-9]{10}" name="telephone">
                
            </div>

            <div class="form-group col-md-6 mt-2">
                <label for="">Profession</label>
                <input type="text"  class="form-control" name="profession">
            </div>

            <div class="form-group col-md-6 mt-2">
                <label for="ville">Ville</label>
                <input type="text"  class="form-control" name="ville">
            </div>

            <div class="form-group col-md-6 mt-2">
                <label for="">Code postal</label>
                <input type="number"  class="form-control" name="cp">
                <?php if (isset($errorCp)) echo $errorCp ?>
            </div>

            <div class="form-group col-md-6 mt-2">
                <label for="">Adresse</label>
                <input type="text"  class="form-control" name="adresse">
            </div>

            <div class="form-group col-md-6 mt-2">
                <label for="">Date de naissance</label>
                <input type="date"  class="form-control" name="date">
            </div>

            <div class="form-group col-md-6 mt-2">
                <form>
                    <div>
                        <p>sexe :</p>
                    </div>
                    <div class="checkbox ">
                    <input type="checkbox" value=" homme "> Homme
                    </div>
                    <div class="checkbox">
                    <input type="checkbox" value="femme" >Femme
                    </div>
                </form>
            </div>

            <div class="form-group col-md-6 mt-2">
                <label for="">Description</label>
                <input type="text" class="form-control input-lg" id="inputlg"  name="description">
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