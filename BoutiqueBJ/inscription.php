<?php 
    include_once("include/init.php");

    if(!membreConnecte())
    {
        $erreurEmail = "";
        $erreurMdp = "";
        $erreurNom = "";
        $erreurPrenom = "";

        $valueEmail = "";

        if($_POST) // !empty($_POST) ==> Si $_POST n'est pas vide
        {
            tableau($_POST);

            $valueEmail = $_POST['email'];
            

            foreach($_POST as $value)
            {
                if(!empty($value))
                {
                    $counter++;
                    // $counter = $counter + 1;
                }
            }

            //echo "Nb de valeurs non vides : $counter";die;

            if($counter > 0)
            {
                // email ne doit pas exister en bdd
                // aucun champs vides
                // mdps identiques

                // EMAIL
                if($_POST['email'])
                {
                    // 1e étape : préparation de la requête
                    $pdoStatementObject = $pdoObject->prepare("SELECT * FROM membre WHERE email = :email");
                    // 2e étape : association des marqueurs à leurs valeurs et leurs types
                    $pdoStatementObject->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
                    // 3e étape : exécution de la requête
                    $pdoStatementObject->execute();

                    $membreArray = $pdoStatementObject->fetch();


                    // if($membreArray)
                    // {
                    //     echo "email existant";
                    //     tableau($membreArray);
                    // }
                    // else
                    // {
                    //     echo "email non existant";
                    // }
                    
                    // si l'email existe en bdd, $membreArray est un tableau contenant les données
                    // si l'email n'existe pas, $membreArray est vide

                    if(!$membreArray) // est vide
                    {

                        if($_POST['mdp'] != $_POST["mdp_confirm"])
                        {
                            $acces = false;
                            $erreurMdp = "<div class='text-danger'>Les mots de passe ne sont pas identiques</div>";
                        }
                        if(!$_POST['mdp'] || !$_POST['mdp_confirm'])
                        {
                            $acces = false;
                            $erreurMdp = "<div class='text-danger'>Veuillez saisir les mots de passe</div>";
                        }
                        if(   strlen($_POST['nom'])   < 2     ||    strlen($_POST['nom']) > 50    )
                        {
                            $acces = false;
                            $erreurNom = "<div class='text-danger'>Saisir un nom entre 6 et 50 caractères </div>";
                        }
                        if(   strlen($_POST['prenom']) < 2 ||  strlen($_POST['prenom']) > 50 )
                        {
                            $acces = false;
                            $erreurPrenom = "<div class='text-danger'>Saisir un prénom entre 6 et 50 caractères </div>";
                        }



                        // INSERTION

                        if($acces)// true ==> aucune erreur
                        {
                            // hasher le mdp
                            // insérer en bdd
                            // message success
                            // redirection

                            // password_hash()
                            // permet de hasher un mdp
                            // 2 arguments :
                            // 1e : string à hasher (mdp)
                            // 2e : clé de hashage (PASSWORD_DEFAULT ....)

                            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

                            //echo $mdp; die; die permet de stopper/tuer le code, fin de la lecture du code


                            // 1e étape :
                            $pdoStatementObject = $pdoObject->prepare("INSERT INTO membre (email, mdp, nom, prenom, statut, date_register ) VALUES (:email, :mdp, :nom, :prenom, :statut, :date_register)");

                            // 2e étape :
                            $pdoStatementObject->bindValue(":email", $_POST['email'], PDO::PARAM_STR );
                            $pdoStatementObject->bindValue(":mdp", $mdp, PDO::PARAM_STR );
                            $pdoStatementObject->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR );
                            $pdoStatementObject->bindValue(":prenom", $_POST['prenom'], PDO::PARAM_STR );
                            $pdoStatementObject->bindValue(":statut", 0, PDO::PARAM_INT );
                            $pdoStatementObject->bindValue(":date_register", date("Y-m-d H:i:s"), PDO::PARAM_STR );

                            // 3e étape :
                            $pdoStatementObject->execute();



                            // message
                            $_SESSION['notification']["membre"] = "inscrire";

                            // redirection
                            header("Location:" . URL . "connexion.php"); exit;

                        }



                    }
                    else
                    {
                        $erreurEmail = "<div class='text-danger'>Cet email est déjà associé à un compte</div>";
                    }
                    

                }
                else
                {
                    $erreurEmail = "<div class='text-danger'>Veuillez saisir un email</div>";
                }

            }
            else // $counter = 0 (aucunes données saisies dans le formulaire)
            {
                $notification = "<div class='alert alert-danger text-center col-md-6 mx-auto'>Veuillez remplir le formulaire</div>";
            }

        }// fermeture du if($_POST)
    }
    
    include_once("include/header.php");
?><!-- ----------------------------------------------------------------------->

    <?php if(!membreConnecte()): ?><!-- false : membre non connecté -->
        <div class="col-md-10 mx-auto">

            <h1 class="text-center mt-3">Inscription</h1>

            <?= $notification ?>

            <form method="post" class="col-md-6 mx-auto">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Saisir un email" value="<?= $valueEmail ?>">
                    <?= $erreurEmail ?>
                </div>

                <div class="form-group mt-2">
                    <label for="mdp">Mot de passe</label>
                    <input type="text" id="mdp" name="mdp" class="form-control" placeholder="Saisir un mot de passe">
                    <?= $erreurMdp ?>
                </div>

                <div class="form-group mt-2">
                    <label for="mdp_confirm">Confirmation du mot de passe</label>
                    <input type="text" id="mdp_confirm" name="mdp_confirm" class="form-control" placeholder="Confirmer le mot de passe">
                </div>

                <div class="form-group mt-2">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Saisir un nom">
                    <?= $erreurNom ?>
                </div>

                <div class="form-group mt-2">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Saisir un prénom">
                    <?= $erreurPrenom ?>
                </div>

                <input type="submit" value="Inscrire" class="btn btn-success col-12 mt-3">
                <!-- <button type="submit" class="btn btn-danger col-12 mt-3" >Ajouter</button> -->
            </form>

        </div>
    <?php else : ?><!-- true : membre connecté : 403 -->
        <?php include_once("include/erreur403.php") ?>
    <?php endif; ?>




<?php
    include_once("include/footer.php");