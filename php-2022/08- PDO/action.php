<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Formulaire envoyé</title>
</head>
<body>
    
</body>
</html>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(isset($_POST)){
    echo '<pre>'; print_r($_POST); echo '</pre>';
    
    $bdd -> exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
    
    foreach($_POST as $key => $value){
        echo "$key : $value<br>";
    }
    
    $id = $bdd -> exec("SELECT id_employes FROM employes WHERE prenom = '$_POST[prenom]' AND nom = '$_POST[nom]' AND sexe = '$_POST[sexe]' AND service = '$_POST[service]' AND date_embauche = '$_POST[date_embauche]' AND salaire = '$_POST[salaire]'");
    


    echo "<div class='alert alert-success'>" . $_POST['prenom'] . " " . $_POST['nom'] . " a été ajouté à la base de données sous l'id : $id" . "</div>" ;
}



?>