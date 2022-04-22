<?php 
    // premier fichier à inclure : init.php (connexion à la bdd, session, variables, fonctions etc...)
    include_once("../include/init.php");


    if(adminConnecte())
    {
        // traitement de la page
        $pdoStatementObject = $pdoObject->query('SELECT * FROM membre');

        $membreQuantity = $pdoStatementObject->rowCount();
    }
    



    include_once("../include/header.php");
?>


    <?php if(adminConnecte()) : ?>

        <h1 class="text-center mt-3">Back Office</h1>
        <!-- contenu de la page -->
        <h2>Membres</h2>
        <p>Nombre d'inscrits :<span class="badge bg-danger"><?= $membreQuantity ?></span></p>
        

        <h2>Produits</h2>
        <a class="dropdown-item" href="<?= URL ?>admin/produit/afficher.php">Produits</a>
    <?php else : ?>
        <?php include_once("../include/erreur403.php") ?>
    <?php endif; ?>




<?php
    include_once("../include/footer.php");