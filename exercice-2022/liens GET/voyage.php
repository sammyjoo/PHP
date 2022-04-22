
Création de plusieurs liens  en  HTML  avec  une  récupération  des  paramètres  en  PHP.

Créer un fichier 'voyage.php' avec les exemples suivants :

. France

. Allemagne

. Etats-Unis

. Japon

. Chine

. Royaume-Uni

L'objectif  est  de  récupérer  les  paramètres vehiculées  sur  la  page 1 (voyage.php) et les afficher sur la page 2 (fiche_voyage.php) en adressant un message correspondant au choix de l'internaute.  

Exemple : si l'on a cliqué sur France : "Vous avez choisi la France comme pays de destination"

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>la samobile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center">AIR SAM - le voyage de riche</h1>
        
        <div class="d-flex align-items-center justify-content-center">
            <a href="fiche_voyage.php?id=1&pays=france" class="btn btn-info">france</a>
            <a href="fiche_voyage.php?id=2&pays=allemagne" class="btn btn-danger">allemagne</a>
            <a href="fiche_voyage.php?id=3&pays=EtatUni" class="btn btn-success">Etat-unis</a>
            <a href="fiche_voyage.php?id=1&pays=Japon" class="btn btn-info">Japon</a>
            <a href="fiche_voyage.php?id=2&pays=Chine" class="btn btn-danger">Chine</a>
            <a href="fiche_voyage.php?id=3&pays=RoyaumeUni" class="btn btn-success">Royaume-uni</a>
        </div>

    </div>
</body>
</html>