<?php

// la supergloobale $_GET permet de véhiculer des valeurs par l'URL
// Pour véhiculer, des données dans l'URL
// on y place des paramètres
// on doit utiliser un séparateur entre le nom du fichier.php et le ou les paramètre(s)
// ==> ?
// à la suite on nomme le paramètre  et avec le signe "=" on lui affecte une valeur
// on peut faire passer autant de paramètres voulues
// entre chaque paramètre il faut placer le séparateur qui est &
// ficheProduit.php?parametre1=valeur1=&parametre2=valeur2

$notification = "";

// S'il y a qqch dans l'url
// si le paramètre est "message"
// et si ce paramètre "message" a pour valeur "erreur"
if($_GET && isset($_GET['message']) && $_GET['message'] == "erreur" )
{
    $notification .= "<div style='background:red; border:1px solid black'>Ce produit n'existe pas</div>";
}

?>

<a href="ficheProduit.php?nom=bague&prix=100">Bague</a>

<a href="ficheProduit.php?nom=boucle&prix=100">Boucle</a>

<a href="ficheProduit.php?nom=bracelet&prix=100">Bracelet</a>

<a href="ficheProduit.php?nom=collier&prix=100">Collier</a>

<a href="ficheProduit.php?nom=montre&prix=100">Montre</a>