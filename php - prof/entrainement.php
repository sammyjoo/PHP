<!--
    bldlr170289@gmail.com

    site PHP :  php.net

    PHP est un langage de programmation côté serveur
    donc il est "traduit" sur un serveur.
    Il faut donc installer en local un serveur

    sur window : wamp ou xampp
    sur mac : mamp
    sur linux : lamp

    Il faut allumer le Control Panel
    - Apache : "start" => lecture du php 
        => Admin pour ouvrir le localhost
    - MySQL : "start" => base de données
        => cliquez sur admin pour ouvrir la page phpMyAdmin

    Les dossiers (sites) doivent se situer dans le fichier htdocs ou www (wamp)

    l'extension pour "lire" du PHP est .php

    Pour lancer le projet sur le navigateur il y a 2 manières :

    1- écrire dans l'url le cheminement pour accéder au fichier
        exemple : htdocs/php/entrainement.php 
        sauf qu'on n'utilise pas le terme htdocs mais localhost
        ==> localhost/php/entrainement.php

    2- dans htdocs se trouve un fichier index.php qui est lu sur le navigateur, il suffit de renommer ce fichier, le plus simple est de rajouter un caractère tel que le dash (-)
    Ne pouvant trouver le fichier index.php il va afficher la liste des dossiers dans le dossier HTDOCS
 -->
 <?php // Ouverture de la balise PHP

echo 'bonjour'; 
// echo : "affiche sur le navigateur"  
//+ entre entre quote ou double quote la chaîne de caractère (string)
// sans quote ou double quote : number
// attention toujours terminer par un POINT VIRGULE

// quote : '
// double : "
// - (tiret 6) : dash
// _ (tiret 8) : underscore
// | (chiffre 6) : pipe

echo "<br>";
echo 18;
echo "<br>";
print('bonsoir');

echo "<br> salut"
// echo + $variable;




?> <!-- Fermeture de la balise PHP 
la fermeture n'est pas obligatoire s'il n'y a que du PHP dans le fichier. 
En revanche s'il y a un autre langage, comme par exemple HTML, il faut bien évidemment fermer la balise.
-->

<h2>bonjour <?php echo "ça va ?" ?></h2>

<h2>Salut <?= "ça va ?" ?></h2>
<!-- on peut remplacer les termes : php echo par le terme : = 
C'est une manière plus courte d'afficher -->

<?php 

echo "<h2>Les variables</h2>";

// la variable est un espace de stockage 
$prenom = "Louis"; // string = avec quote
$prenom = "Marie";
// si on affecte une nouvelle valeur à une variable
// c'est la dernière qui est retenue

$age = 12; // number = sans quote

// syntaxe : $ accolé au nom de la variable définie 
// évitez de débuter la variable par une majuscule
// ne pas commencer par un chiffre

echo "<div style='border:1px solid red'>";

echo $prenom;

echo "</div>";

?>

<p>Je m'appelle <?= $prenom ?> et j'ai <?= $age ?> ans</p>

<?php
 // Il existe plusieurs types de variables
 // string / integer etc

 // fonction prédéfinie PHP => gettype();
// fonction = méthode

$type1 = "10";
$type2 = 10;
$type3 = 10.5; // la virgule est un POINT 
$type4 = true;
$type5 = ["louis", 10, "dupont"];
$type6 = NULL;

// true / false et NULL peuvent en minuscule et majuscule

    echo gettype($type1); // => string

    echo "<br>";
    echo gettype($type2); // => integer
    // un nombre entre quote n'est pas un integer mais une string
    echo "<br>";
    echo gettype($type3); // => double

    echo "<br>";
    echo gettype($type4); // => BOOLEAN : TRUE, 0 / FALSE, 1

    echo "<br>";
    echo gettype($type5); // => ARRAY (tableau)

    echo "<br>";
    echo gettype($type6); // => NULL


    echo "<h2> la concaténation </h2>";

    // concaténer est l'action de mettre bout à bout au moins de chaînes de caractères.

    // Pour concaténer on utilise le POINT . 
    // Il existe une 2e possibilité c'est la VIRGULE ,
    $nom = 'MARTIN'; 
    $prenom = "Louis";

    echo $nom . " " , $prenom . "<br>";
    // la concaténation colle
    // si on veut mettre un espace on rajoute une string comprenant un espace.

    echo "$nom $prenom <br>";
    // entre DOUBLE QUOTE, les variables sont "traduites", les valeurs sont retournées, comme elles sont entre double quote, cad string l'espace est donc pris en compte


    echo '$nom $prenom';
    // entre QUOTE (simple) les variables ne sont plus reconnues comme telles, ce ne sont ques des chaînes de caractères, leur nom est affiché sur la navigateur et pas leur valeur.
    echo "<br>"; 
    $personne = $prenom;
    // $personne = Louis
    $personne .= " ";
    // $personne = $personne . " ";
    $personne .= $nom;
    // $personne = $personne  $nom;
    echo $personne;

    // ça ne modifie la valeur initiale de la variable
    // on rajoute un complément

    echo "<br><h2>Les constantes</h2>";

    // une constante est une variable qui ne subira jamais de modification

    // on utilise une fonction prédéfinie PHP
    // define()
    // cette fonction a besoin de 2 arguments

    define("NOM", "Dupont");

    echo NOM;
    echo "<br>";
    // constantes magiques

    echo __LINE__ . "<br>";
    // affiche le numéro de la ligne

    echo __FILE__ . "<br>";
    // Chemin complet du fichier


    echo "<h2>les opérateurs</h2>";

    ?>
       <pre style='font-size:2em'>
       =          égal à / Affectation
       ==         Comparaison de valeurs
       ===        Comparaison STRICTE de valeurs et de types
       !=         différent de
       !          n'est pas
       <          Strictement inférieur
       <=         Inférieur ou égal
       >          Strictement supérieur
       >=         Supérieur ou égal
       AND / &&   ET
       OR / ||    OU
       XOR        OU exclusif

        </pre>
<?php

    $a = 6;
    $b = 4;

    echo $a + $b . "<br>"; // echo 6 + 4 = 10
    echo $a - $b . "<br>"; // echo 6 - 4 = 2
    echo $a * $b . "<br>"; // echo 6 * 4 = 24
    echo $a / $b . "<br>"; // echo 6 / 4 = 1.5

    echo $a += $b; // $a = $a + $b, $a = 10
    echo "<br>";
    echo $a -= $b; // $a = $a - $b;
    echo "<br>";
    echo $a *= $b; // $a  = $a * $b 6*4 = 24
    echo "<br>";
    echo $a /= $b; // $a = $a / $b = 24 / 4 = 6




    echo "<h2> les conditions </h2>";


    // fonction qui permet d'effectuer des tests et de fournir des instructions en fonction de la valeur

    
    // if (si) elseif(sinon si)  else(sinon)

    $ageCondition = 18;


    if($ageCondition >= 18) // 18 ans ou +
    {
        echo "majeur";
    }
    else { // moins de 18 
        echo "mineur";
    }


    echo "<br>";
    // condition ternaire


    $ageConditionTernaire = 10;
    echo ($ageConditionTernaire >= 18) ? "tu es majeur" : "tu es mineur";
    // on commence par mettre la condition dans la parenthèse 
    // si l'âge est supérieur ou égal à 18
    // après le ? exécution du IF
    // après les : exécution du ELSE



    echo "<br>";


    $ageCondition2 = 6;

    if($ageCondition2 < 0) // un âge ne peut être négatif
    {
        $resultat = "impossible";
    }
    elseif($ageCondition2 >= 0 && $ageCondition2 < 18) // âge entre 0 et 18 (non comprit)
    {
        if($ageCondition2 >= 0 && $ageCondition2 <= 3) // 0 1 2 3
        {
            $resultat = "bébé";
        }
        elseif($ageCondition2 > 3 && $ageCondition2 <= 11) // 4 5 6 7 8 9 10 11
        {
            $resultat = "enfant";
        }
        else // 12 13 14 15 16 17
        {
            $resultat = "ado";
        }
    }
    else {
        $resultat = "majeur";
    }


    if($resultat == "impossible")
    {
        echo $resultat;
    }
    else
    {
        echo "Tu es un " . $resultat . "<hr>";
    }
    


    // SWITCH

    $car = "FIAT";
    // fonction prédéfinie PHP strtolower
    switch(strtolower($car))
    {

        case "mercedes" : // case c'est comme un IF
        case "bmw" : // on peut définir plusieurs cases pour une même exécution
            echo "Marque Allemande";
        break; // break est comme le point virgule, c'est un séparateur de case


        case "citroen" :
            echo "Marque Française";
        break;

        case "fiat" :
            echo "Marque italienne";
        break;

        case "austin martin" :
            echo "Marque anglaise";
        break;

        default : // si on rentre dans aucune case
            
            echo "marque inconnue";



    }

echo "<br>";

    $ageSwitch = 53;

    switch($ageSwitch)
    {
        case ($ageSwitch < 0):
            echo 'impossible';
        break;

        case ($ageSwitch >= 0 && $ageSwitch < 3):
            echo 'bébé';
        break;

        case ($ageSwitch >= 3 && $ageSwitch < 12):
            echo 'enfant';
        break;

        case ($ageSwitch >= 12 && $ageSwitch < 18):
            echo 'ado';
        break;

        default :
             echo 'majeur';




    }

echo "<br>";

    $nb1 = 10; // int

    $nb2 = "10"; // str

    if($nb1 == $nb2)
    {
        echo "oui"; // == OUI
    }
    else {
        echo 'non'; // === NON
    }



    echo "<h2>Structure itérative</h2>";

    // l'itération en mathématiques est l'action de répétition (boucle)
    // il existe 2 itérations :
    // FOR et WHILE

    // il faut 3 arguments pour boucler 
    // 1- la valeur de départ
    // 2- jusqu'à qu'à quelle valeur (arrivée)
    // 3- l'incrémentation => $i+2 => $i + 1
    

    for($i = 0; $i <= 10; $i++ ) // les 3 arguments sont séparés par un point virgule
    {
        echo $i . "<br>";
    }

    echo "<hr>";
    
    for($i = 10; $i >= 0; $i-- ) // les 3 arguments sont séparés par un point virgule
    {
        echo $i . "<br>";
    }


    // créer dans une balise SELECT des balises options allant de la valeur 1 à 10 sans les écrire une par une mais en utilisant la boucle for

    echo "<select>";

        for($i = 1; $i <=10; $i++) // 1 2 3 4 5 6 7 8 9 10
        {
            echo "<option value='$i'>$i</option>";
        }

    echo "</select>";



    echo "<hr>";



    $w = 10;

    while($w <= 20)
    {
        echo $w++ . "<br>";
    }



    echo "<h2> Les fonctions </h2>";

    // une fonction est un programme / un algorythme qui permet d'éffectuer un ensemble d'instructions


    // Il existe 2 sortes de fonctions
    // celles déjà créées par PHP (fonction prédéfinie PHP)
    // celles que vous allez créer

    // ISSET() / EMPTY()

    // EMPTY() : Détermine si une variable est vide 
    // ISSET() : Détermine si une variable est définie mais aussi différente de NULL




    $nom = ""; //"", NULL et 0  = vide 

    if(!empty($nom)) // si la variable $nom n'est pas vide
    {
        // alors je rentre dans cette condition
        echo "qqch";
    }
    else 
    {
        echo "vide";
    }


    // les dates 

    echo "<hr>";

    echo "Date du jour : " . date('d/m/Y');

    echo "<hr>";

    echo "Heure du jour : " . date('H') . " heures " .  date('i') . " minutes et " .  date('s')  . " secondes.";

    echo "<hr>";
    // d = jour 
    // m = chiffre du mois
    // M = le nom du mois en anglais les 3 premières lettres 
    // F = le nom du mois en anglais en entier

    // la fonction date() a besoin à l'intérieur un argument jour mois année heure minutes secondes

    echo "Date du jour : " . date('d/m/Y H:i:s');


    echo "<hr>";

    echo time(); // fonction : nombre de secondes depuis le 1er janvier 1970. // 1 milliard 600 millions etc..
    echo "<hr>";

    // traitement d'une string

    // strpos()

    // permet de retourner si oui ou non un caractère existe dans une string, si oui, définir sa position

    // 2 arguments :
    // la variable dans laquelle on veut chercher
    // c'est ce qu'on cherche le caractère

    $email = 'louisgmail.com';
    // une position commence à 0 // ATTENTION

    

    echo strpos($email, "@"); // retourne 5 car c'est la position 5
    // s'il n'y a pas @, echo n'affiche rien
    echo "<hr>";
    var_dump(strpos($email, "@")); 
    // var_dump ==> developpeur, 
    // si il n'y a pas de @ var dump retourne un boolean FALSE sinon il retourne type et position


    //iconv_strlen() vs strlen()
    // les 2 fonctions permettent de calculer le nombre de caractère dans une string (les espaces comprit)

    // la difference est que strlen() prend en compte les accents


    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";

    $mot1 = "ou";
    $mot2 = "où";


    echo iconv_strlen($mot1); // 2 : o + u
    echo "<br>";
    echo strlen($mot1); // 2 : o + u

    echo "<hr>";

    echo iconv_strlen($mot2); // 2 : o + u
    echo "<br>";
    echo strlen($mot2); // 3 : o + u + accent
    echo "<br>";

    // fonction substr()

    // cette fonction permet de retourner une partie de la chaîne de caractère
    // 3 arguments :
    // 1- la variable / chaîne de caractère dans laquelle on veut récupérer une partie
    // 2- la position du début de la partie récupérée
    // 3- le nombre de caractère voulu

    $texte = "Une métropole est la ville principale d'une région géographique ou d'un pays, qui, à la tête d'une aire urbaine importante, par sa grande population et par ses activités économiques et culturelles, permet d'exercer des fonctions organisationnelles sur l'ensemble de la région qu'elle domine";

    echo substr($texte, 0, 79 ) . "... pour savoir la suite <a href=''>cliquez ici</a>";

    // attention le 3e argument est un NOMBRE DE CARACTÈRE !!!! et pas de mots


    // création de fonction


    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";


    function bonjour() // création d'une fonction
    // syntaxe : function + un nom défini + ()
    // attention le nom doit être UNIQUE
    {
        echo "bonjour";
    }

    bonjour(); // Exécution de la fonction, le fait de l'appeler va l'afficher

    echo "<hr>";

    echo salut("Michel");// éxécute la fonction salut() et on lui passe un argument
    // pour info il n'y a pas d'ordre pour les fonctions
    // on peut appeler la fonction avant la création
    // car lors de l'appel il va chercher dans le code si cette fonction existe 


    function salut($prenom) // cette fonction a un argument qui reprend la valeur lors de l'appel
    // les arguments sont séparés par une virgule
    {
        // echo "salut " . $prenom;
        return "salut " . $prenom;
    }
    echo "<hr>";




    function multiplication($nb1, $signe, $nb2)
    {
        if($signe == "+")
        {
            return $nb1 + $nb2 ;
        }
        elseif($signe == "-")
        {
            return $nb1 - $nb2 ;
        }
        elseif($signe == "*")
        {
            return $nb1 * $nb2 ;
        }
        elseif($signe == "/")
        {
            return $nb1 / $nb2 ;
        }
        
    }

    echo multiplication(3, "*" , 15);


    // si dans la fonction on utilise le echo on appelle la fonction sans echo
    // si dans la fonction on utilise le return on appelle la fonction avec un echo
    echo "<hr>";


    // exercice tva

    // valeur HT 
    // créer une fonction qui affecte la TVA 20%
    // 1 10 1.2 12
    // 12 € HT
    // 38
    // 100.89

    function tva($ht)
    {
        return $ht * 1.2;
    }

    echo round(   tva(100.89)     ,  0     );

    // la fonction prédéfinie round() permet d'arrondir un nombre
    // elle accepte 2 arguments
    // 1- valeur à arrondir
    // 2- nombre de chiffre après la virgule 0 1 2 
    // superieur ou = à 5 : arrondi au supérieur
    echo "<hr>";

    // Convertion monétaire

    // pour 1 euro
    $yen = 118.15; // 1 euro = 118.15 yen
    $dollars = 1.13;
    $dinarAlgerien = 135.4;

    // création d'une fonction permettant de convertir d'une somme en euro à une des 3 monnaies proposées.

    function convertion($value, $unite)
    {
        return $value*$unite;
    }


    echo convertion(10, $yen);


    echo "<hr>";



    function convertion2($value)
    {
        $yen = 118.15; 
        $dollars = 1.13;
        $dinarAlgerien = 135.4;

        return $value . " euros est égal à : <br>
        
        " . $value*$yen . " yens <br>
        " . $value*$dollars . " dollars <br>
        " . $value*$dinarAlgerien . " dinars Algérien <br>
        
        ";
    }


    echo convertion2(10);

    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
    // les tableaux
    echo "<h2>les tableaux (array)</h2>";


    // pour simplifier, un tableau est une variable contenant plusieurs valeurs

    // pour déclarer un tableau
    // $tab = [];
    // $tab = array();


    // ne pas confondre une variable et un tableau

    // variable ====> echo (affichage pour le site) // var_dump (dev)
    // tableau =====> print_r (voir en tant que developpeur)
    $tab = [];

    $tab[] = "mercedes";


    print_r($tab); // Array ( [0] => mercedes )

    echo "<br>";

    $tab[] = "audi";

    echo "<br>";

    print_r($tab); // Array ( [0] => mercedes [1] => audi )


    $tab[] = "opel"; // 0
    $tab[] = "bmw";
    $tab[] = "citroen";
    $tab[] = "fiat";
    $tab[] = "lada"; // 6

    $last = end($tab);
    // la fonction end() permet de retourner la dernière valeur d'un tableau (array)
    echo "<br>";
    echo $last;

    echo "<br>";
    echo '<pre>';print_r($tab);echo '</pre>';


    echo " Je m'appelle Gabriel et ma voiture est une " . $tab[6] ;

    echo "<br>";
    echo "<hr>";
    echo "<hr style='margin-bottom:80px'>";
    // FOREACH
    // Foreach est une fonction qui permet de boucler un array (tableau)



    foreach($tab as $value) // extraire du tableau chaque ligne dans une variable
    {
       // echo  "<div style='border: 1px solid black; margin-top:10px'>" . $value . "</div><br>";

       

       if($value == $last)
       {
            echo  $value;
       }
       else
       {
            echo  $value . "<hr>";
       }

       
    }

    echo "<br>";


    // retirer le HR de la dernière ligne // indice : $last 
    // si la valeur est la dernière j'applique "qqch" sinon j'applique autre chose
    // exercice du dessus




    foreach($tab as $key => $value) // extraire du tableau chaque ligne dans une variable
    {
        // position : indice : key

       // $tab le tableau
       // à l'intérieur du tableau on récupère la $key (la position) et sa valeur $value

       if($value == $last)
       {
            echo  " $key : $value";
       }
       else
       {
            echo  " $key : $value <hr>";
       }

    }



    $tableau = [
        "kiwi" , 
        "banane", 
        "pomme"
    ]; // on définit le tableau et on lui attribue des valeurs



    $espece = [

        "dog" => "chien",
        "cat" => "chat",
        "snake" => "serpent"

    ];

    echo "<br>";
    echo '<pre>';print_r($espece);echo '</pre>';

    //count() et sizeof()
    // ces 2 fonctions permettent de calculer la taille d'un tableau


    echo 'taille du tableau : ' . count($tab) . "<hr>";
    echo 'taille du tableau : ' . sizeof($espece) . "<hr>";


    // implode()
    // cette fonction permet de définir un tableau en une chaîne de caractères

    // 2 arguments :
    // 1- définir le caractère séparateur
    // 2- le tableau


    echo implode(" -- ",$espece);
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";

    // Tableau multidimentionnel


    $raceEspece = [

        "chien" => ["berger allemand", "bichon", "beagle"],
        "chat" => ["main coon", "chartreux", "siamois"],
        "serpent" => ["cobra", "python", "vipère"]

    ];

    echo '<pre>';print_r($raceEspece);echo '</pre>';


    // Afficher python dans le tableau raceEspece

    $python = $raceEspece['serpent'][1];

    
    echo $python;
    // pour cibler une position d'un tableau qui se trouve lui même dans un tableau
    // on cible le tableau multi $raceEspece
    // premier crochet je vais dans le sous tableau soit le numéro de la position par défaut soit par le nom qu'on lui affecté
    // deuxième crochet : on est maintenant dans le sous tableau et on va pointer sur la position qui nous intéresse
    // ...


    // afficher les 9 lignes du tableau multidimentionnel
    // indice : regardez l'ancien foreach
    echo "<br>";

    foreach($raceEspece as $tabRace) // 3 tableaux de race (chien chat serpent)
    // j'extrais de mon tableau multi ce qu'on "trouve" tout de suite : des sous tableaux
    {
        foreach($tabRace as $valueVariable) // boucle dans chaque tableau race
        // j'extrais de chaque sous tableau leurs variables
        {
            echo $valueVariable . "<br>";
        }
    }


    echo "<h2> Les class et les objets </h2>";

    // Une class est un regroupement d'informations
    // on peut y trouver des variables des constantes et des fonctions 
    // une class ne s'utilisent directement, c'est un modèle, un patron,
    // on peut déclarer une variable sans donner de valeur

    // pour exploiter on créé des objets (object)
    // pour créer un objet on emploie le terme new devant le nom de la class

    // pour déclarer une class on écrit class + nom {}
    // par convention le nom en majuscule

    class CAR
    {
        public $marque = "mercedes";
        public $modele;
        public $carburant;

    }


    $tabObject = new CAR;
    echo $tabObject->marque;
    $tabObject->modele = "class C xx";
    $tabObject->carburant = "essence";

    // class PDO pour se connecter à la base de données


    echo "<h2>superglobales</h2>";
    // Ce sont des variables internes de PHP
    // Créées par PHP automatiquement
    // Il en existe 9
    // syntaxe $_NOM;

    // $GLOBALS : elle permet de garder même tous les variables définies

    // $_POST : permet de récupérer les valeurs dans un formulaire 
    // $_GET : permet de véhiculer une info/une donnée par l'url
    // $_SESSION : permet de conserver des valeurs sur toutes les pages
    // $_FILES : permet de récupérer des fichiers
    // $_COOKIE : contient les données du cookie
    // $_SERVER : données sur le serveur
    // $_REQUEST : contient les données de $_POST $_GET $_COOKIE
    // $_ENV contient les données liées à l’environnement dans lequel s’exécute le script


    if($_POST) // si j'ai cliqué sur envoyer
    {

        print_r($_POST);

        echo $_POST['prenomForm'];
    }
?>

    <form action="" method="post">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenomForm">

        <input type="submit" value="envoyer">
    </form>






























