<?php
    include_once("../../include/init.php");

    if(adminConnecte())
    {
        $erreurTitre = "";
        $erreurPrix = "";

        if($_POST)
        {
            tableau($_POST);

            foreach($_POST as $value)
            {
                if(!empty($value))
                {
                    $counter++;
                }
            }


            if($counter)
            {
                if( strlen($_POST['titre']) < 5 || strlen($_POST['titre']) > 30 )
                {
                    $erreurTitre = "<div class='text-danger'>Veuillez saisir un titre entre 5 et 30 caractères</div>";
                    $acces = false;
                }
                if(!is_numeric($_POST['prix']) || $_POST['prix'] <= 0)
                {
                    $erreurPrix = "<div class='text-danger'>Veuillez saisir un nombre supérieur à zéro</div>";
                    $acces = false;
                }

                if($acces)
                {
                    // insertion
                    // 1e
                    $pdoStatementObject = $pdoObject->prepare("INSERT INTO produit  (titre, prix, date_register) VALUES (:titre, :prix, :date_register) ");
                    // 2e 
                    $pdoStatementObject->bindValue(":titre", $_POST['titre'], PDO::PARAM_STR);
                    $pdoStatementObject->bindValue(":prix", $_POST['prix'], PDO::PARAM_STR);
                    $pdoStatementObject->bindValue(":date_register", date("Y-m-d H:i:s"), PDO::PARAM_STR);
                    // 3e
                    $pdoStatementObject->execute();

                    // notification
                    $_SESSION['notification']['produit'] = "ajouter";

                    // redirection
                    header("Location:" . URL . "admin/produit/afficher.php");exit;
                    /*
                        /!\ En cas d'erreur dans la requête, une erreur s'affiche sur le fichier ajouter.php mais avec la redirection on ne la voit pas, pensez donc à commenter header()
                    */

                }
            }
            else
            {
                $notification = "<div class='alert alert-danger text-center col-md-6 mx-auto'>Veuillez remplir le formulaire</div>";
            }



        }
    }

    include_once("../../include/header.php");
?>


    <?php if(adminConnecte()) : ?>
        <div class="col-md-10 mx-auto">

            <h1 class="text-center mt-3">Ajouter un produit</h1>

            <?= $notification ?>

            <a class="btn btn-info" href="<?= URL ?>admin/produit/afficher.php">Retour</a>

            <form method="post" class="col-md-6 mx-auto">

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" placeholder="Saisir le titre du prix" 
                    value="<?php if(isset($_POST['titre'])) echo $_POST['titre'] ?>">
                    <?= $erreurTitre ?>
                </div>

                <div class="form-group">
                    <label for="prix">Prix (€)</label>
                    <input type="number" step="0.01" id="prix" name="prix" class="form-control" placeholder="Saisir le prix du produit" 
                    value="<?php if(isset($_POST['prix'])) echo $_POST['prix'] ?>">
                    <?= $erreurPrix ?>
                </div>



                <input type="submit" value="Ajouter" class="btn btn-danger col-12 mt-3">

            </form>


        </div>
    <?php else : ?>
        <?php include_once("../../include/erreur403.php"); ?>
    <?php endif; ?>

<?php
    include_once("../../include/footer.php");