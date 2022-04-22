<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>fiche voyage</title>
</head>
<body>
<div class="container">

<h1 class="display-4 text-center">DESTINATION CHOISI PAR VOUS</h1>
<P>Félicitation pour votre choix</P>

<?php


if($_GET){

    echo " Vous avez choisi cette destination : ".$_GET['pays'];


}


?>



</div>
</body>
</html>