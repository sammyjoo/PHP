<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier de fruits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="formulaire-fruits.css">
</head>
<body>
    <h1 class="text-center">Composez votre panier de fruits</h1>
    <?php
    $fruits = ['bananes', 'cerises', 'oranges', 'peches'];
    ?>
    <form action="panier.php" method="post" class="col-md-8 mx-auto">

        <div class="row">

            <div class="form-group col-md-8 mt-4">>
                <label for="fruit">Quel fruit voulez-vous ?</label>
                <select name="fruit" id="fruit">
                    <?php
                    foreach($fruits as $fruit) {
                        echo "<option value='$fruit'>$fruit</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-8 mt-4">>
                <label for="poids">Pour quel poids ?</label>
                <input type="number" name="poids" id="poids" min="100" max="30000">
                <span>g</span>
            </div>

            <input class="btn btn-success mt-4" type="submit" value="Valider">
        
    </form>
</body>
</html>