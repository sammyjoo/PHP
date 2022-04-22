<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre commande</title>
    <style>
        body {
            margin: 0 auto;
            text-align: center;
        }
        #msg-confirm {
            margin: 20vh 16vw;
            padding: 40px;
            font-family:'Tajawal', sans-serif;
            font-weight: 600;
            font-size: 1.4rem;
            border: 5px solid green;
            color: green;
        }
    </style>
</head>
<body>
    <?php
        require('../function.php');
        if($_POST) {
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';

            $commande = calcul($_POST['fruit'], $_POST['poids']);
            extract($commande);

            // echo $prix;
            // echo '<p>';
        }
    ?> 
    
    <p id="msg-confirm">
        <?php 
        if(isset($commande)) {
            echo "Vos $poids" . "g de $fruit vous coûteront $prix €.";
        }
        ?>
    </p>
            
    <?php
        
    ?>
    
</body>
</html>

