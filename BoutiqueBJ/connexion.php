<?php 
    include_once("include/init.php");

    if(!membreConnecte())
    {
    
        $erreurEmail = "";
        $erreurMdp = "";
        /*
            - si la key "notification" est définie dans la $_SESSION
            - si la key "membre" est définie dans $_SESSION['notification']
            - si la ley "membre" a pour valeur "inscrire"
        */
        if(isset($_SESSION['notification'])  AND isset($_SESSION['notification']['membre']) AND $_SESSION['notification']['membre'] = "inscrire")
        {
            $notification = "<div class='alert alert-success text-center col-md-6 mx-auto disparition'>Vous êtes bien inscrit, vous pouvez vous connecter</div>";
        }


        if($_POST)
        {
            tableau($_POST);

            if($_POST['email'])
            {
                // 1e étape : préparation
                $pdoStatementObject = $pdoObject->prepare("SELECT * FROM membre WHERE email = :email");
                // 2e étape : association
                $pdoStatementObject->bindValue(":email", $_POST['email'], PDO::PARAM_STR );
                // 3e étape : exécution
                $pdoStatementObject->execute();

                $membreArray = $pdoStatementObject->fetch();
                //tableau($membreArray);
                // Si $membreArray contient des données c'est que l'email saisi existe en bdd
                // donc l'utilisateur s'est bien inscrit
                // dans le tableau retourné, on retrouve le mdp hashé : $membreArray['mdp']
                if($membreArray)
                {
                    if($_POST['mdp'])
                    {
                        // Comparer le mdp hashé et le mdp saisi dans le formulaire
                        // password_verify()
                        // retourne un boolean
                        // 2 arguments :
                        // 1e : str non hashé $_POST['mdp']
                        // 2e : mdp hashé

                        if(password_verify($_POST['mdp'], $membreArray['mdp'])) // true
                        {
                            // AUTHENTIFICATION
                            // la SEULE fois où on crée la key "membre" dans la $_SESSION c'est ICI !!!
                            // Les conditions de sécurités se reposent sur l'écoute de cette key dans la $_SESSION

                            // on boucle le tableau des données de l'utilisateur dans la key 'membre'
                            foreach($membreArray as $key => $value)
                            {
                                if($key != "mdp") // on éjecte le mdp 
                                {
                                    $_SESSION['membre'][$key] = $value;
                                }
                                
                            }

                            // Redirection
                            // différentes redirections en fonction du statut
                            if($_SESSION['membre']['statut'] == 0) // user / client
                            {
                                header('Location:' . URL);exit;
                            }
                            elseif($_SESSION['membre']['statut'] == 1) // admin
                            {
                                header('Location:' . URL . "admin/dashboard.php");exit;
                            }
                            
                            
                        }
                        else // false
                        {
                            $erreurMdp = "<div class='text-danger'>Mot de passe incorrect</div>";
                        }
                    }
                    else
                    {
                        $erreurMdp = "<div class='text-danger'>Veuillez saisir votre mot de passe</div>";
                    }
                }
                else
                {
                    $erreurEmail = "<div class='text-danger'>Cet email n'est pas associé à un compte</div>";
                }
            }
            else
            {
                $erreurEmail = "<div class='text-danger'>Veuillez saisir un email</div>";

                if(!$_POST['mdp'])
                {
                    $erreurMdp = "<div class='text-danger'>Veuillez saisir un mot de passe</div>";
                }
            }

        }
    }


    include_once("include/header.php");
?>
    <?php if(!membreConnecte()): ?><!-- false : membre non connecté -->
        <div class="col-md-10 mx-auto">
            <h1 class="text-center mt-3">Connexion</h1>

            <?= $notification ?>

            <form method="post" class="col-md-6 mx-auto">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Saisir votre email" 
                    value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
                    <?= $erreurEmail ?>
                </div>

                <div class="form-group mt-2">
                    <label for="mdp">Mot de passe</label>
                    <input type="text" id="mdp" name="mdp" class="form-control" placeholder="Saisir votre mot de passe">
                    <?= $erreurMdp ?>
                </div>


                <input type="submit" value="Connexion" class="btn btn-danger col-12 mt-3">

            </form>

        </div>
    <?php else : ?><!-- true : membre connecté : 403 -->
        <?php include_once("include/erreur403.php") ?>
    <?php endif; ?>

<?php
    include_once("include/footer.php");