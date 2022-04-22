<?php

    echo '<pre>';
    print_r($_COOKIE);
    echo '</pre>';

    if(isset($_GET['pays'])){
        $pays = $_GET['pays'];
    } elseif(isset($_COOKIE['pays'])) {
        $pays = $_COOKIE['pays'];
    } else {
        $pays = 'fr'; // Par défaut, tant que l'utilisateur n'a pas choisi de langue (tant que $_GET['pays'] n'est pas défini), le site sera en français.
    }

    $expiration = 365 * 24 * 3600; // un cookie expire un an après son enregistrement (soit un an après la dernière 
    setcookie("pays", $pays, time() + $expiration); // args: nom du cookie, valeur, durée de vie
    echo $pays . " " . time();

    $msg = '';
    switch($pays){
        case 'fr': $msg = "<p class='col-md-5 mx-auto text-center text-primary display-4'>Bonjour</p>";
        break;
        case 'es': $msg = "<p class='col-md-5 mx-auto text-center text-warning display-4'>Hola muchacho ! Bienvenido a la Casa Bonita</p><img src='./Slaver-Cartman.png'>";
        break;
        case 'en': $msg = "<p class='col-md-5 mx-auto text-center text-danger display-4'>Welcome</p>";
        break;
        case 'it': $msg = "<p class='col-md-5 mx-auto text-center text-success display-4'>Benvenuto a te viaggiatore ! La pasta ! La pasta !</p>";
        break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>$_COOKIE - Pays</title>
</head>
<body>

    <div class="container text-center">
        <h1 class="display-4 text-center">06-COOKIE</h1>
        <hr>
        <a href="?pays=fr" class="col-md-3 p-2 m-2 btn btn-primary">France</a>
        <a href="?pays=es" class="col-md-3 p-2 m-2 btn btn-warning">Espagne</a>
        <a href="?pays=en" class="col-md-3 p-2 m-2 btn btn-danger">Angleterre</a>
        <a href="?pays=it" class="col-md-3 p-2 m-2 btn btn-success">Italie</a>

    </div>
    <?php if(isset($msg)) echo $msg; ?>

</body>
</html>