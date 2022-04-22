<?php
    include_once("../../include/init.php");

    if(adminConnecte())
    {
        if(isset($_SESSION['notification'])  AND isset($_SESSION['notification']['produit']) AND $_SESSION['notification']['membre'] = "ajouter")
        {
            $notification = "<div class='alert alert-success text-center col-md-6 mx-auto disparition'>Produit ajouté</div>";
        }

        $pdoStatementObject = $pdoObject->query("SELECT * FROM produit");

        $quantity = $pdoStatementObject->rowCount();

        $produitsMulti = $pdoStatementObject->fetchAll();

        //tableau($produitsMulti);
        //echo $quantity;
    }

    include_once("../../include/header.php");
?>


    <?php if(adminConnecte()) : ?>
        <div class="col-md-10 mx-auto">

            <h1 class="text-center mt-3">Gestion des produits</h1>

            <?= $notification ?>

            <a class="btn btn-success" href="<?= URL ?>admin/produit/ajouter.php">Ajouter un produit</a>

            <?php if($quantity) : ?>
                <p>Nombre de produits :<span class="badge bg-danger"><?= $quantity ?></span></p>
            

                <table class="table table-striped table-hover text-center mt-3">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Prix (€)</th>
                            <th>image</th>
                            <th>delete</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($produitsMulti as $produitArray) : ?>
                            <tr>
                                <td><?= $produitArray['id_produit'] ?></td>
                                <td><?= $produitArray['titre'] ?></td>
                                <td><?= $produitArray['prix'] ?></td>

                                <td>
                                <?php 
                                if($produitArray['image']) :
                                ?> <img src="" alt="">

                                    <!-- affiche l'image-->
                                <?php else: ?>
                                <img src="<?= URL ?>asset/images/imageDefault.jpg" alt="" class="imgSize80">
                                <?php endif; ?>
                                </td>

                                    <td> <!-- date -->
                                    <?php 
                                        $dateObject = new dateTime($produitArray['date_register']);

                                        echo $dateObject->format("d/m/Y H:i");
                                    ?>
                                    </td>

                                    <td><!-- modifier -->
                                    <a href="<?= URL ?>admin//produit/modifier.php?id=<?= $produitArray['id_produit'] ?>">
                                        <img src="<?= URL ?>asset/images/update.png" alt="">
                                        </a>

                                    </td>

                                    <td><!-- suppr -->
                                    <a href="">
                                        <img src="<?= URL ?>asset/images/delete.png" alt="">
                                        </a>

                                    </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            <?php else: ?>
                <h4 class="text-center text-danger fst-italic mt-3">Il n'y a aucun produit pour le moment</h4>
            <?php endif; ?>

        </div>
    <?php else : ?>
        <?php include_once("../../include/erreur403.php"); ?>
    <?php endif; ?>

<?php
    include_once("../../include/footer.php");