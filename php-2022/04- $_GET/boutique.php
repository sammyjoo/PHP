<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique | $_GET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

</head>
<body>
    <!-- Exemple avec le site de Zara  -->
    <!-- https://www.zara.com/fr/fr/origins-collection-l4661.html?v1=1934305 -->
    <!-- Dans cette URL, après le ? -->
    <!-- il y a un indice v1 et sa valeur associée pour chaque page / produit du site -->
    <div class="container">

        <h1 class="display-4 text-center">Boutique | $_GET</h1>
        
        <div class="d-flex align-items-center justify-content-center">
            <a href="ficheProduit.php?id=1&article=pull&couleur=noir&prix=40" class="btn btn-info">Produit 1</a>
            <a href="ficheProduit.php?id=2&article=tshirt&couleur=noir&prix=20" class="btn btn-danger">Produit 2</a>
            <a href="ficheProduit.php?id=3&article=chemise&couleur=noir&prix=30" class="btn btn-success">Produit 3</a>
        </div>

    </div>
</body>
</html>