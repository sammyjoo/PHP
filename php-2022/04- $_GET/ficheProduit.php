<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche produit | $_GET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

</head>
<body>

    <h1 class="display-4 text-center">Fiche produit | $_GET</h1>

    <?php
    if($_GET) {
        
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        
        
        // EXERCICE : Afficher les données transmises dans l'URL sur la page web avec un affichage conventionnel (echo), sauf l'ID du produit
        
        // Méthode 1 : avec un simple echo de l'indice dans le tableau
        echo $_GET['article'] . '<br>';
        echo $_GET['couleur'] . '<br>';
        echo $_GET['prix'] . '€';

        echo '<br><br>';

        // Méthode 2 : avec extract() - extrait les valeurs d'un tableau dans des variables 
        extract($_GET); 
        // exemple
        // input : (
        //     [id] => 1
        //     [article] => pull
        //     [couleur] => noir
        //     [prix] => 40
        // )
        // output : 
        //  $id = 1
        //  $article = 'pull'   
        //  $couleur = 'noir'
        //  $prix = 40
        echo $article . '<br>';
        echo $couleur . '<br>';
        echo $prix . '€';
        echo '<br><br>';
        
        // Méthode 3 : avec un FOREACH
        foreach($_GET as $key => $spec) {
            if($key !== 'id'){
                echo "$key : $spec<br>";
            }
        }
    } else { // si $_GET n'existe pas
        // redirection du client vers la page BOUTIQUE
        // fonctionne - notamment - si l'utilisateur demande /ficheProduit.php sans requête (?) ni paramètres (&) dans l'URL
        header('location:boutique.php');
    }
    ?>
</body>
</html>