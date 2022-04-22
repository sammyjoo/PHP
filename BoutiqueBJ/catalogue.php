

<?php
    include_once("include/init.php");
    
    $pdoStatementObject = $pdoObjet ->query("SELECT * FROM produit");

    $quantity = $pdoStatementObject-> rowCount();

    $produitMulti = $pdoStatementObject->fetchAll();


    $titre = 'Catalogue';
    include_once('./includes/header.php');
?>


<h1 class="text-center mt-3">Catalogue</h1>

<?php if($quantity): ?>
<div class="row justify-content-around">
<?php foreach($produitMulti as $produitArray): ?>
    <div class="border border-danger">

        <h3><?= ($produitArray['titre'])?></h3>

        <?php if($produitArray['image']):?>

        <?php else:  ?>
        <img src="<?= URL ?>asset/images/imageDefault.jpg" alt="" class="imgSize80">
        <?php endif; ?>

        <h3><?= $produitArray['prix'] ?> € </h3>

        <a class="btn btn-warning col-12 mt-2" href="<?= URL ?>fiche_produit.php?id=<?= $produitArray['id_produit']?>">voir la fiche</a>
        </div>
        <?php endforeach; ?>
        </div>

        <?php else: ?>
        <h4 class="text-center text-danger fst-italic mt-3">Il n'y a aucun produit pour le moment</h4>
        <?php endif; ?>


<?php
   include_once("include/footer.php");

