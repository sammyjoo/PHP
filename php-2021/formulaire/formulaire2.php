<?php
    $erreur = "";
    $notification = "";
    $compteur = 0; // compteur, de base = 0
    // if(empty($_POST))
    // {
    //     echo "oui";
    // }
    // else
    // {
    //     echo "non";
    // }
    if($_POST) // si je clique sur le type submit
    {
        echo '<pre>';print_r($_POST);echo '</pre>';

        // On boucle toutes les valeurs du $_POST
        foreach($_POST as $value)
        {
            
            // si la valeur est différente de null (vide) 
            if(!empty($value))
            {
                $compteur++; // compteur +1 : $compteur = $compteur +1 


            }

        }

        if($compteur > 0)
        {

        

            // condition pseudo doit être compris entre 2 et 20 caractères

            // si le pseudo n'est pas compris entre 2 et 20 caractères
            if(strlen($_POST['pseudo']) < 2 || strlen($_POST['pseudo']) > 20)
            {
                $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                                Le pseudo doit être compris entre 2 et 20 caractères.
                            </div>";
            }

            // si les mots de passe (mdp et confirm_mdp) ne sont pas identiques
            if($_POST['mdp'] != $_POST['confirm_mdp']) // non identiques
            {
                $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                                Les mots de passe ne sont pas identiques
                            </div>";
            }
            else // identiques
            {
                if(empty($_POST['mdp']))
                // fonction empty() permet de vérifier si une variable est vide : NULL 0 "" []
                {
                    $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                                    Veuillez saisir un mot de passe
                                </div>";
                }
                
                // Regex
                // https://apcpedagogie.com/controler-les-mots-de-passe/
                // preg_match() Effectue une recherche de correspondance avec une expression rationnelle standard
                // 2 arguments
                // 1e argument le regex 
                // 2e argument : la variable : $_POST['mdp']
                elseif(!preg_match(' /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/ ', $_POST['mdp']))
                {
                    $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                            Le mot de passe sera validé que si il a de 8 a 15 caractères, au moins une lettre minuscule, au moins une lettre majuscule, au moins un chiffre, au moins un de ces caractères spéciaux: $ @ % * + - _ !    , aucun autre caractère possible: pas de & ni de { par exemple.
                                </div>";
                }

            }

            // si le code postal est un integer et de plus qu'il est de 5 chiffres 


            // is_int — Détermine si une variable est de type nombre entier
            // is_numeric — Détermine si une variable est un nombre ou une chaîne numérique
            if(!is_numeric($_POST['code_postal']) || strlen($_POST['code_postal']) != 5)
            {
                $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                                Le code postal doit contenir 5 chiffres
                            </div>";
            }


            // Vérification de l'email
            // fonction filter_var()
            // 1e : variable
            // 2e : c'est le filtre FILTER_VALIDATE_EMAIL

            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                                L'email n'est pas correct
                            </div>";
            }


            if(empty($erreur))
            {
                $notification.= "<div class=' col-md-6 mx-auto alert alert-success text-center'>
                                Inscription effectuée
                            </div>";
            }


        }
        else // le compteur est resté à 0
        {
            $erreur .= "<div class=' col-md-6 mx-auto alert alert-danger text-center'>
                            tous les champs sont vides, veuillez les remplir
                        </div>";
        }
    }



    include_once('include/header.php');
    include_once('include/nav.php');


    // Création d'un formulaire "inscription"

    // email pseudo mdp confirmation du mdp nom prenom telephone code postal ville // submit //
?>


    <h1 class="text-center m-4">Formulaire 2</h1>

    <?= $erreur ?>
    <?= $notification ?>

    <form action="" method="post" class="col-md-4 mx-auto text-center">


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" placeholder="Saisir votre email" name='email'>
            </div>
            <div class="form-group col-md-6">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" class="form-control" placeholder="Saisir votre pseudo" name='pseudo'>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mdp">Mot de passe</label>
                <input type="text" id="mdp" class="form-control" placeholder="Saisir votre mot de passe" name='mdp'>
            </div>
            <div class="form-group col-md-6">
                <label for="confirm_mdp">Confirmation du mot de passe</label>
                <input type="text" id="confirm_mdp" class="form-control" placeholder="Confirmer votre mot de passe" name='confirm_mdp'>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" id="nom" class="form-control" placeholder="Saisir votre nom" name='nom'>
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" class="form-control" placeholder="Saisir votre prénom" name='prenom'>
            </div>
        </div>


        <div class="form-group">
            
            <label for="telephone">Téléphone</label>
            <input type="text" id="telephone" class="form-control" placeholder="Saisir votre téléphone" name='telephone'>

        </div>



        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="code_postal">Code Postal</label>
                <input type="text" id="code_postal" class="form-control" placeholder="Saisir votre code postal" name='code_postal'>
            </div>

            <div class="form-group col-md-8">
                <label for="ville">Ville</label>
                <input type="text" id="ville" class="form-control" placeholder="Saisir votre ville" name='ville'>
            </div>
        </div>


        <input type="submit" class="btn btn-info col-md-12" value="Inscription">
    
    
    
    
    </form>
    







<?php
    include_once('include/footer.php');

