<?php 
include_once("include/init.php");

if(isset($_GET['id']))
{



tableau($_GET);

$pdoStatementObject = $pdoObject->prepare("SELECT*FROM produit WHERE id_produit = :id_produit");
$pdoStatementObject->binValue(":id_produit", $_GET['id'], PDO::PARAM_INT);
$pdoStatementObject->execute();

$produitArray = $pdoStatementObject->fetch();
tableau($produitArray);

}

include_once("include/header.php");

?>
<?php if(isset($_GET['id']) AND $produitArray) : ?>
<div class="col-md-10 mx-auto">
    <h1 class="text-center"><?= $produitArray['titre']?></h1>

    <a class ="btn btn-primary mt-2" href="<?= URL ?> catalogue.php">Retour</a>


    <div class="row justify-content-center">

    <?php if($produitArray['image']):  ?>
        
    <?php else : ?>
        <img src="<?= URL ?>asset/images/imageDefault.jpg" alt="" class="imgSize300">
        <?php endif; ?>

    
    </div>

    <h3 class="text-center mt-3"><?= $produitArray['prix']?>€</h3>

        </div>
        <?php else: ?>
            <?php include_once("include/erreur404.php")?>
            <?php endif; ?>

    <?php 
    include_once("include/footer.php");
    ?>