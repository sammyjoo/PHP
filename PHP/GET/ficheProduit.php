<?php

// pour récupérer les valeurs dans l'URL on utilise la supergloble $_GET
// $_GET est un tableau 
// "key" =>
// "key" / inidce /position
// NomDuParamètre => ValueDuParamètre

if(!empty($_GET))// si $_GET n'est pas vide
{
    if(isset($_GET['nom']) && isset($_GET['prix'])
    && $_GET['nom'] != "" && $_GET['prix'] != "" )
    {

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    
        ?>
        
        <h1><?= $_GET['nom']?></h1>
        <h2><?= $_GET['prix']?> €</h2>


        <?php
    }
    else // sinon $_GET['nom'] et $_GET['prix']
    {
        // redirection sur une autre page

        header('Location: http://localhost/php1/get/catalogue.php?message=erreur');
    }
}
else // sinon $_GET est vide
{
    // redirection sur une autre page

    header('Location: http://localhost/php1/get/catalogue.php?message=erreur');
}

?>

