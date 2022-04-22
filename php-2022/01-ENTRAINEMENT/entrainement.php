<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PHP - Entrainement</title>
</head>
<body>
    <div class="container">
        <!-- 
            1 - Instructions d'affichage
            2 - Variable : Types / Déclarations / Affectations
            3 - Concaténation 
            4 - Constante 
            5 - Conditions et opérateurs
            6 - Fonction prédéfinie
            7 - Fonction utilisateur
            8 - Boucles
            9 - Tableau de données (Array)
            10 - Classes et Objets
        -->
        <h2 class="display-5">Instructions d'affichage</h2>
        <p><?php echo "Hello World"; ?></p>
        <?php
        echo "<br>"; 
        echo "<h2 class='display-5'> Afficher une balise </h2>";

        // Documentation : https://www.php.net
        echo "<br>";
        echo "<h2 class='display-5'> Variable : Type / Déclaration / Affectation </h2>";

        // gettype() est une fonction prédéfinie qui retourne le type d'une valeur
        $a = 127;
        echo gettype($a);
        echo '<br>';

        $b = "une chaîne de caractères";
        echo gettype($b);
        echo '<br>';

        $c = 1.5;
        echo gettype($c);
        echo '<br>';

        $d = '127';
        echo gettype($d);
        echo '<br>';
        
        $de = true;
        echo gettype($d);
        echo '<br>';

        echo "<h2 class='display-5'> Les variables ( & concaténation )</h2>";
        
        $nom = "Nicolas";
        $nom .= " II de Russie";
        echo $nom; // Nicolas II de Russie

        echo "<h2 class='display-5'> Constantes et constantes magiques </h2>";
        // Une constante ne peut pas voir sa valeur modifiée durant l'éxécution du script (retourne une erreur)
        define("BIRTH_YEAR", 1868);
        echo $nom . " est né en " . BIRTH_YEAR;
        echo "<br>";

        // Les constantes magiques ont toujours une valeur, dans n'importe quel fichier
        echo "<br><b>Les constantes magiques</b>" . '<br>';
        echo __FILE__ . '<br>'; // Le chemin d'accès du fichier
        echo 'ligne ' . __LINE__ . '<br>'; // Le numéro de cette ligne
        // echo __FUNCTION__ . '<br>';
        echo __DIR__ . '<br>';
        // echo __METHOD__ . '<br>';
        // echo __NAMESPACE__ . '<br>';
        // echo __CLASS__ . '<br>';

        echo '<hr>';

        // EXERCICES
        echo "<h3 class='display-5 text-center'> Exercice </h3>";
        echo "<h4 class='display-6'> Exercice 1 </h3>";
        // EXO 1 :  Afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable
        $vert = '#3a9d23';
        $jaune = '#ffe436';
        $rouge = '#f00020';
        ?>
        <p style="background-color: black;color:white;"><span style="color:<?php echo $vert; ?>">Vert</span>-<span style="color:<?php echo $jaune; ?>">Jaune</span>-<span style="color:<?php echo $rouge ?>">Rouge</span></p>
        <?php
        echo    "<p style='background-color:black;color:white;'>
        <span style='color:".$vert."'>Vert</span>
        -
        <span style='color:".$jaune."'>Jaune</span>
        -
        <span style='color:".$rouge."'>Rouge</span>
        </p>";
        
        
        $vert = "<span style='color:green'>Vert</span>";
        $jaune = "<span style='color:yellow'>Jaune</span>";
        $rouge = "<span style='color:red'>Rouge</span>";
        
        echo "<p style='background-color:black;color:white'>". $vert . '-' . $jaune . '-' . $rouge . '</p>';
        
        echo '<hr>';

        echo "<h2 class='display-5 text-center'> Les opérateurs arithmétiques </h3>";
        $a = 10;
        $b = 2;
        echo $a + $b . '<br>';
        echo $a - $b . '<br>';
        echo $a * $b . '<br>';
        echo $a / $b . '<br>';

        echo '<br>';
        // Opération / Affectation
        $a += $b;
        echo $a . '<br>';

        $a -= $b;
        echo $a . '<br>';

        $a *= $b;
        echo $a . '<br>';

        $a /= $b;
        echo $a . '<br>';
        
        echo "<h2 class='display-5 text-center'> Structure conditionnelle et opérateurs de comparaison </h3>";
        
        $var1 = 0;
        $var2 = "";

        // empty() définit si une variable contient 0, si elle est vide ou non définie.
        // empty() nous permettra plus tard de vérifier si les champs d'un formulaire sont renseignés ou non
        if(empty($var1)){
            echo "0, vide ou non défini" . '<br>';
        }
        
        // isset() teste l'existence d'une variable, si elle est définie ou non
        if(isset($var2)){
            echo "la variable est définie, elle est de type " . gettype($var2) . " et sa valeur est " . $var2;
            echo "isset teste l'existence d'une variable, si elle est définie ou non" . "<br>";
        }
        
        /*
            OPERATEURS DE COMPARAISON
            (les mêmes qu'en javascipt)
            (à l'exception de )
            !=      différent de  
            OR ||   si l'une des conditions est vraie
            xor     si l'une des conditions est vraie, mais pas les deux en même temps
        */
        $a = 10;
        $b = 5;
        $c = 2;
        
        if($a == 10 xor $b == 6) {
            echo "Ok condition exclusive" . "<br>";
        } else if ($a == 10 || $b ==6) {
            echo "l'une des deux conditions est vraie" . "<br>";
        }

        // Ecriture ternaire de la condition
        $var3 = ($a == 10) ? 'vrai' : 'faux';

        // SWITCH
        echo "<h2 class='display-5 text-center'> Condition SWITCH </h3>";

        $perso = 'Mario';
        $couleur = "";

        switch($perso) {
            case 'Luigi':
                $couleur = 'green';
                break;
            case 'Mario':
                $couleur = 'red';
                break;
            case 'Daisy':
                $couleur = 'yellow';
                break;
            case 'Peach':
                $couleur = 'pink';
                break;
            default:
                echo "Vous n'avez pas choisi de personnage";
        }    
        // EXERCICE : Refaire la boucle switch ci-dessus sous la forme IF / ELSE IF / ELSE
        if($perso == 'Luigi') {
            $couleur = 'green';
        } else if ($perso == 'Mario') {
            $couleur = 'red';
        } else if ($perso == 'Daisy') {
            $couleur = 'yellow';
        } else if ($perso == 'Peach') {
            $couleur = 'pink';
        } else {
            echo "Vous n'avez pas choisi de personnage !";
        }
        echo "<p>Vous avez choisi <span style='font-weight:800;color:".$couleur."'>".$perso."</span> <b>!</b></p>";

        echo "<h2 class='display-5 text-center'> Fonction prédéfinie </h3>";
        
        // Une fonction prédéfinie permet de rélisation un traitement spécifique
        echo "Date: <strong>" . date('d/m/Y') . "</strong><hr>";
        
        // Lorsqu'on utilise une fonction prédéfinie, il faut toujours se demander quels arguments l'on doit lui envoyer et quel genre de valeurs elle retourne
        echo "<h2 class='display-6'> Traitement des chaînes (iconv_strlen, iconv_strpos, iconv_substr) </h3>";
        
        // strpos() : retourne la position d'un caractère sur une string
        echo 'strpos() : ';
        $email = 'jean.dupont@orange.fr';
        echo 'Le caractère @ se trouve à la position : <strong>' . strpos($email, '@') . '</strong><br>';
        // Succès : INT
        // Echec : BOOLEAN FALSE
        
        $string = "une chaîne";
        echo strpos($string, '@'); // Cette ligne ne sert pas à grand chose, pourtant il y a bien quelque chose à l'intérieur : FALSE !
        var_dump(strpos($string, '@')); // var_dump() est une instruction d'affichage que l'on utilise régulièrement en phase de développement (il existe aussi print_r())
        echo "<br>";
        // iconv_strlen() : retourne la longueur d'une string
        echo 'iconv_strlen() : ';
        $phrase = "Une chaîne de caractères";
        echo "La longueur de la chaîne est de <strong>".iconv_strlen($phrase)."</strong> caractères.";

        echo '<br>';
        // substr() : retourne une partie d'une string selon un index de départ et un index d'arrivée
        echo 'substr() : ';
        $texte = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam sed facilis pariatur at deleniti a. Totam eius veniam ipsa obcaecati eveniet, dolorem ut, laborum distinctio repellendus excepturi optio sit doloremque?';
        echo substr($texte, 0, 11); // Lorem ipsum
        // substr() est souvent utilisé pour afficher l'accroche d'une actualité sur internet, ou un extrait d'article 

        echo "<h2 class='display-5 text-center'> Les fonctions utilisateurs </h3>";
        // déclaration
        function exemple() {
            echo "chaine de caractères" . '<br>';
        }
        exemple(); // appel
        $qui = "Pierre";
        function bonjour($qui = 'Pierre') {
            // ($qui = 'Pierre') définit une valeur par défaut à la variable de réception $qui
            echo 'Bonjour ' . $qui . ' !' . '<br>';
        }
        bonjour(); // 'Bonjour Pierre !' // Pierre = valeur par défaut de l'argument ('la variable de réception') $qui de la fonction bonjour()
        bonjour('Gabriel'); // 'Bonjour Gabriel !'
        
        echo "<h2 class='display-5 text-center'> Exercice </h3>";
        echo '<b>Calculateur de TVA</b>' . '<br>';
        function appliqueTva($prixHT) {
            $prixTTC = $prixHT * 1.2;
            return 'Prix HT: '. $prixHT . ' € ; Prix TTC : ' . $prixTTC . ' €' . '<br>';
        }
        echo appliqueTva(150);


        // exercice : améliorer cette fonction afin que l'on puisse calculer un nombre avec les taux de notre choix
        function calculTva($prixHT, $taux) {
            $facteur = 1 + $taux / 100;
            $prixTTC = $prixHT * $facteur;
            return 'Prix HT: '. $prixHT . ' € ; TVA : '.$taux.' % ; Prix TTC : ' . $prixTTC . ' €' . '<br>';
        }
        echo calculTva(150,19.7);
        echo calculTva(300,5.5);
        
        echo '<hr>';

        function exoMeteo($saison, $temperature) {
            if($temperature < -1 || $temperature > 1)
                $degre = "degrés";
            else
                $degre = "degré";
            // ------------------------------------ // les accolades dans les IF / ELSE ne sont pas obligatoires
            if($saison == "printemps")
                $art = 'au';
            else
                $art = 'en';
            
            echo "Nous sommes $art $saison et il fait $temperature $degre <br>"; // Cette notation est possible si la string est entre double quotes
        }
        exoMeteo('été', 30);
        exoMeteo('printemps', 22);
        exoMeteo('hiver', 1);

        echo '<br>';

        // Scope global et local
        function jourSemaine() {
            $jour = 'lundi';
            return $jour;
        }

        $recup = jourSemaine();
        echo $recup . '<br>';

        $pays = 'France';
        function affichagePays() {
            // Espace global : à l'extérieur d'une fonction
            // Espace local : à l'intérieur d'une fonction
            global $pays;
            // Contrairement à ce qu'on trouve en javascript, le PHP ne permet pas de faire entrer 
            // dans une fonction une variable qui n'a pas été définie dans son espace local
            // sans d'abord :           - faire appel au mot-clé "global"
            //                      OU  - la passer comme argument lorsqu'on appelle la fonction
            echo $pays;
        }
        affichagePays();
        echo '<hr>';

        function identite(string $nom, int $age) {
            return "$nom a $age ans";
        }
        echo identite('Paul', 25);  // 'Paul a 25 ans'
        // echo identite(['Jean', 'Thierry'], 25)   // syntax error: ERREUR car le premier argument n'est pas une string comme imposé par la fonction définie
        // echo identite(true, 25);     // ERREUR (même raison)

        echo "<h2 class='display-5 text-center'> Les boucles </h3>";
        
        echo "<h2 class='display-6'> WHILE </h3>";
        
        $i = 0;
        $max = 5;
        while($i < $max) {
            if($i != $max-1)
                echo "$i---";
            else
                echo $i;
            $i++;
        }
        
        echo "<h2 class='display-6'> FOR </h3>";
        
        $tableau = ['Pierre','Paul','Jacques'];
        for($i = 0; $i < count($tableau); $i++) {
            echo $tableau[$i] . ". ";
        }

        echo '<hr>';
        
        // EXO : afficher un selecteur de 30 options via la boucle FOR
        // <select> <option>
        echo "<h2 class='display-6'> EXERCICE </h3>";
        echo "<p>afficher un selecteur de 30 options via la boucle FOR</p>";
        echo '<select>';
        for($i=1;$i<=30;$i++){
            echo '<option>' . $i . '</option>';
            // OU
            echo "<option> $i </option>";
        }
        echo '</select>' . '<hr>';        
        ?>
        <!-- peut s'écrire également -->
        <select>
            <?php for($i=1;$i<=30;$i++) : ?>
                <option><?= $i ?></option>
            <?php endfor; ?>
        </select><hr>

        <?php 
        echo "<table class='table table-bordered text-center'><tr>";
        for($j=0; $j<10; $j++) {
            echo "<td> $j </td>";
        }
        echo "</tr></table>";
        
        // avec une boucle for() : créer un tableau de 10 x 10 où les valeurs vont de 0 à 100
        echo "<table class='table table-bordered text-center'>";
        $count = 0;
        for($tr=0;$tr<10;$tr++) {
            echo '<tr>' . $tr;
            for($td = 0; $td < 10; $td++) {
                echo "<td> $count </td>";
                $count++;
            }
            echo '</tr>';
        }
        echo "</table>";


        // ARRAYS
        $persos = array("Mario", "Luigi", "Yoshi", "Bowser");
        //  echo $persos : // ERREUR : il n'est pas possible d'afficher le contenu d'un array avec un simple echo $array
        echo "<pre>";
        print_r($persos); // pre() imprime le tableau avec un rendu plus lisible
        echo "</pre>";
        // OU 
        echo "<pre>";
        var_dump($persos); // var_dump() donne des informations supplémentaires sur l'objet qu'il affiche
        echo "</pre>";

        echo "<hr>";

        // EXERCICE
        echo "<h2 class='display-6'> EXERCICE </h2>";
        echo "<p>Afficher 'Espagne' en passant par le tableau, sans faire un echo 'Espagne'</p>";
        echo $pays[1];
        
        // BOUCLE FOREACH
        echo "<h2 class='display-5 text-center'> Boucle FOREACH </h3>";
        $pays = ["France", "Espagne", "Italie", "Suisse"];
        foreach($pays as $value) {
            echo $value . " ";
        }
        echo "<br>";
        // déclarer nos propres indices dans un tableau
        $couleur = array(
            "r" => "rouge",
            "v" => "vert",
            "b" => "bleu",
            "j" => "jaune"
        ); // C'est un tableau associatif, c'est ) dire avec un indice associé à chaque valeur
        echo "<pre>";
        print_r($couleur);
        echo "</pre>";
        echo $couleur["r"]; // "rouge"

        echo "<div class='alert alert-success col-md-4 mx-auto text-center'>";
        foreach($couleur as $key => $value) {
            echo "$key : $value<br>";
        }
        echo "</div>";

        echo 'Taille du tableau $couleur: ' . count($couleur) . "<br>";
        // ou
        echo 'Taille du tableau $couleur: ' . sizeof($couleur) . "<br>";
        

        // implode() rassemble les élément d'un tableau dans une string
            // prend pour paramètre le tableau et un séparateur
        echo implode("-", $couleur);
        // l'inverse : explode() transforme une string en tableau
        
        echo "<hr>";
        
        // TABLEAUX MULTIDIMENSIONNELS
        echo "<h2 class='display-4 text-center'>Les tableaux multidimensionnels</h2>";

        $multiTab = array(
            0 => array("prenom" => "Anthony", "nom" => "Fieve"),
            1 => array("prenom" => "Gabriel", "nom" => "Patric"),
            2 => array("prenom" => "Jean-Claude", "nom" => "Van Damme")
        );
        
        echo "<pre>";
        print_r($multiTab);
        echo "</pre>";
        
        // EXERCICE
        echo "<h2 class='display-6'> EXERCICE </h2>";
        echo "<p>Afficher 'Van Damme' en passant par le tableau, sans faire un echo 'Van Damme'</p>";
        echo $multiTab[2]["nom"];
        echo "<br>";
        
        // boucle FOR: récupérer tous les prénoms
        echo "Tous les prénoms : ";
        for($i = 0; $i < count($multiTab); $i++) {
            echo $multiTab[$i]["prenom"] . " ";
        }
        echo '<br>';
        // boucle FOR + FOREACH : récupérer l'identité de chaque personne
        echo "Identités : ";
        for($i = 0; $i < count($multiTab); $i++){
            echo "<div class='alert alert-success col-md-4 mx-auto text-center'>";
            foreach($multiTab[$i] as $index => $identite) {
                echo "$index : $identite<br>";
            }
            echo "</div>";
        }

        echo "<h2 class='display-4 text-center'>Les variables superglobales</h2>";
        
        /*
            $_SERVER: permet de véhiculer des informations liées au serveur
            $_POST: permet de véhiculer des données saisies dans un formulaire
            $_GET: permet de véhiculer des données transmises dans l'URL
            $_COOKIE: permet de véhiculer des informations liées au fichier cookie
            $_SESSION: permete de véhiculer les informations au fichier session, à la session en cours. Utile pour maintenir une connexion avec un internaute sur le site web.

            Toutes les superglobales sont écrites en majuscules et précédés d'un $_,
            excepté $GLOBALS
            $GLOBALS: stocke toutes les variables globales déclarées dans le script
            $_ENV:
            $_FILES:

        */
        echo "<pre>";
        echo '<b>$_SERVER</b><br>';
        var_dump($_SERVER);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_POST</b><br>';
        var_dump($_POST);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_GET</b><br>';
        var_dump($_GET);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_COOKIE</b><br>';
        var_dump($_COOKIE);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_SESSION</b><br>';
        var_dump($_SESSION);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_ENV</b><br>';
        var_dump($_ENV);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_FILES</b><br>';
        var_dump($_FILES);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$_REQUEST</b><br>';
        var_dump($_REQUEST);
        echo "</pre>";

        echo "<pre>";
        echo '<b>$GLOBALS</b><br>';
        var_dump($GLOBALS);
        echo "</pre>";

        
        echo "<h2 class='display-4 text-center'>Classes et objets</h2>";
        class Etudiant
        {
            public $prenom = "Anthony";
            public $age = 27;
            public function pays() {
                echo "France";
            }
        
        }
        $objet = new Etudiant('');
        echo '<pre>';
        var_dump($objet);
        echo '</pre>';
        
        echo '<pre>';
        var_dump(get_class_methods($objet)); // retourne les noms (strings) des méthodes de la classe
        echo '</pre>';

        echo $objet->prenom . "<br>";
        echo $objet->age . "<br>";
        echo $objet->pays() . "<br>";
        
            
        
        ?>


    </div>
</body>
</html>