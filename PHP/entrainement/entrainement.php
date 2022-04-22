<?php // ouverture de la balise HTML

echo 'bonjour';
// echo : "affiche dans le navigateur" + entre quote
//+ entre entre-quote ou double-quote la chaine de caractère (string)
// sans quote ou double quote : number
// attention toujours terminer par un POINT VIRGULE


// quote : '
// double quote : "
// dash : -
// underscore: _

echo "<br>";
echo 18;

echo "<br>";
print('bonsoir');
// pour la syntaxe PRINT il faut mettre les chaines de caractère entre parenthèse puis dans l'entre quote





?> <!-- fermeture de la balise PHP -->

<?php
echo "<h2>Les variables</h2>";

//la variable est un espace de stockage

$nomDeFamille = "machin";
$age = 12; 

// syntaxe : $ accolé au nom de la variable définie
// évitez de débuter la variable par une majuscule
//ne pas commencer par un chiffre
?>

<h3>bonjour je m'appel <?= $nomDeFamille ?> </h3> 
<h4>J'ai <?= $age ?> ans</h4>

<?php
    
    $type1 = "10";
    $type2 = 10;
    $type3 = 10.5;
    $type4 = true;
    $type5 = ["louis", 10, "dupont"];
    $type6 = NULL;
    
    echo gettype($type1);// string
    echo "<br>";
    echo gettype($type2);// integer
    echo "<br>";
    echo gettype($type3);// double
    echo "<br>";
    echo gettype($type4);//Boolean: TRUE, 0 / FALSE, 1
    echo "<br>";
    echo gettype($type5);// ARRAY (tableau)
     echo "<br>";
    echo gettype($type6);//NULL
    ?>







<?php

echo "<h2> la concaténation </2h>";

//concaténer est l'action de mettre bout à bout au moins de chaines de caractères.

$nom = 'louis';
$prenom='martin';


echo %nom . $prenom. "<br>";


echo "$nom $prenom <br>";

echo '$nom $prenom'
    //les var ne sont plus reconnues, ce ne sont que des chaine de caractères
    
    
$personne = $prenom;

$personne .= $nom;
//

echo $personne;


?>


<?php

echo "<br><h2>les constantes</h2>";

define("NOM", "Martin");

echo NOM;


?>

<?php

$a = 6;
$b = 4;

echo $a + $b . "<br>"; // echo 6 + 4 = 10
echo $a - $b . "<br>";
echo $a * $b . "<br>";
echo $a / $b . "<br>";
?>