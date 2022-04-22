

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    require('function.php');

    $commande1 = calcul('peches', 4578);
    $commande2 = calcul('cerises', 1244);
    echo '<pre>';
    print_r($commande1);
    print_r($commande2);
    echo '</pre>';

    ?>
    </body>
</html>