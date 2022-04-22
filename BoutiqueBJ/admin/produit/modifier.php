<?php
    include_once("../../include/init.php");
    /*
        - sécurité admin 
        - paramètre id 
        - retour de la bdd

    */

    if(adminConnecte())
    {
        $erreurTitre = "";
        $erreurPrix = "";

    }

    include_once("../../include/header.php");
?>

<?php if(adminConnecte()) : ?>
    <div class="col-md-10 mx-auto">

        <h1 class="text-center mt-3">Modifier le produit</h1>

        <?= $notification ?>

        <a class="btn btn-info" href="<?= URL ?>admin/produit/afficher.php">Retour</a>

        <form method="post" class="col-md-6 mx-auto">

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" id="titre" name="titre" class="form-control" placeholder="Saisir le titre du prix" 
                value="">
                <?= $erreurTitre ?>
            </div>

            <div class="form-group">
                <label for="prix">Prix (€)</label>
                <input type="number" step="0.01" id="prix" name="prix" class="form-control" placeholder="Saisir le prix du produit" 
                value="">
                <?= $erreurPrix ?>
            </div>

            <input type="submit" value="Modifier" class="btn btn-success col-12 mt-3">

        </form>
    </div>
<?php else : ?>
    <?php include_once("../../include/erreur403.php") ?>
<?php endif; ?>


<?php
    include_once("../../include/footer.php");