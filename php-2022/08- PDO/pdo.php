<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>08- PDO</title>
</head>
<body>
    <div class="container">
    <h1>PDO</h1>
    <?php
        echo "<h2 class='display-5 text-center'> 01. Connexion </h2>";

        $bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
            /*
                PDO est une classe prédéfinie en PHP qui permet de se connecter à une base de données (ici: entreprise) et de pouvoir l'interroger.
                args : 
                    1. serveur + bdd
                    2. identifiant (root en local)
                    3. mot de passe ( '' (vide) sur Windows | 'root' sur MacOS)
                    4. options PDO (alerte warning, encodage utf8, exceptions PDO)  
            */

        echo '<pre>'; print_r(get_declared_classes()); echo '</pre>';
        // echo '<pre>'; var_dump($bdd); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($bdd)); echo '</pre>';
        // get_class_methods    retourne les noms des méthodes d'une classe


        echo "<h2 class='display-5 text-center'> 02. PDO </h2>";
        echo "<h3 class='display-6 text-center'> EXEC / INSERT / UPDATE / DELETE </h2>";
        // SQL : Structured Query Language
        // gérer la base de données à l'aide de requêtes

        //* Pour l'exemple, on a mis en condition de chaque opération des variables test $insert, $update, $delete. Pour ne pas effectuer ses opérations durant le test, il suffit de mettre la déclaration de la variable concernée en commentaire.

        // $insert = '';
        if(isset($insert)){
            
            $data = $bdd -> exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Anthony', 'Fieve', 'm', 'web', '2021-11-30', 30000)");
            
            echo "Nombre d'enregistrements affectés par la requête INSERT : <strong>$data</strong>" . '<br>';
            
        }


        // $update = '';
        if(isset($update)){
            
            $data = $bdd -> exec("UPDATE employes SET salaire = 2600 WHERE id_employes = 388");
            
            echo "Nombre d'enregistrements affectés par la requête UPDATE : <strong>$data</strong>" . '<br>';
            
        }


        // $delete = '';
        if(isset($delete)){
            
            // supprimer l'entrée que l'on vient de créer
            $data = $bdd -> exec("DELETE FROM employes WHERE id_employes = 991");
            
            echo "Nombre d'enregistrements affectés par la requête DELETE : <strong>$data</strong>" . "<br>";
            
        }

        if(!isset($insert) && !isset($update) && !isset($delete)){
            echo "<i>Note: pour effectuer et afficher les opérations, il faut décommenter les variables concernées dans le code.</i>" . '<br>';
        }

        echo '<br>';
        
        
        echo "<h2 class='display-5 text-center'> 03. PDO </h2>";
        echo "<h3 class='display-6 text-center'> QUERY - SELECT + FETCH_ASSOC</h3>";
        
        $req = $bdd -> query("SELECT * FROM employes WHERE id_employes = 509");
        // query  est une méthode issue de la classe PDO. Comme avec exec(), on peut formuler et exécuter des requêtes SQL (INSERT, UPDATE, DELETE).
        // query  ne retourne pas le nombre d'enregsitrements affectés par la requête SQL.
        echo '<pre>'; print_r($req); echo '</pre>'; 
        echo '<pre>'; print_r(get_class_methods($req)); echo '</pre>';
        
        /*
            Quand on exécute une requête de sélection avec la méthode query, on obtient:
                =>  un autre objet issu d'une autre classe PDOStatement. Cette classe possède ses propres propriétés et méthodes.
                
                $req est un objet issu de la classe PDOStatement qui est inexploitable en l'état. Pour rendre ce résultat exploitable, on exécute la méthode fetch() issue de la classe PDOStatement.
        */

        $employe = $req -> fetch(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($employe); echo '</pre>';
        
        echo "<h3 class='display-6'> Exercice 1 </h3>";
        echo "<p>Afficher les données de l'employé 509 de façon conventionnelle (mise en page pour un lecteur lambda)</p>";

        // Exercice : Afficher les données de l'employé 509 de façon conventionnelle (mise en page pour un lecteur lambda
        echo "<h4 class='display-8'> Fiche employé </h4>" . '<hr>';
        foreach($employe as $key => $value){
            echo "<p style='line-height:0.85rem;'>$key : <b>$value</b></p>";
        }
        
        echo "<table class='table table-success' style='width:30%;'><thead><tr><b>Fiche employé</b></tr></thead><tbody>";
        foreach($employe as $key => $value){
            echo "<tr><td>$key</td><td><b>$value</b></td></tr>";
        }
        echo "</tbody></table>";

        echo "<div class='alert alert-success col-md-4 mx-auto text-center'>";
        foreach($employe as $key => $value){
            echo "$key : $value<br>";
        }
        echo "</div><hr>";

        echo "<h2 class='display-5 text-center'> 04. PDO </h2>";
        echo "<h3 class='display-6 text-center'> QUERY - WHILE - SELECT + FETCH_ASSOC (plusieurs résultats)</h3>";

        $resultat = $bdd -> query("SELECT * FROM employes");
        echo '<pre>'; print_r($resultat); echo '</pre>';

        echo "Nombre d'employés dans l'entreprise : <strong>" . $resultat->rowCount() . "</strong>";
        // rowCount() est une méthode issue de la classe PDOStatement, qui retourne le nombre de lignes récupérées par la requête de sélection
        echo "<hr>";
        
        echo "<h3 class='display-6'> Exercice 2 </h3>";
        echo "<p>Afficher les données de tous les employés <b>avec une boucle while</b></p>";

        echo "<h3 class='display-6'> Exercice 3 </h3>";
        echo "<p>Afficher les données de tous les employés <b>avec un foreach</b></p>";
        while($data = $resultat->fetch(PDO::FETCH_ASSOC)) {

            
            //echo '<pre>'; print_r($data); echo '</pre>';
            //* Afficher les données de tous les employés avec le while
            
            echo "<div class='col-md-4 mx-auto p-2 text-dark'>";
            echo $data['prenom'] . " " . $data['nom'] . "<br>";
            
            echo "</div>";
            
            
            //* Exercice : Afficher la même chose mais avec un foreach
            echo "<div class='col-md-4 mx-auto p-2 bg-primary text-white rounded nb-2'>";
            echo "<table class='table table-sm table-borderless text-white'><thead><tr><td><b>Fiche employé</b></td></tr></thead><tbody>";
            foreach($data as $key => $value) {
                // echo $data[$key] . " : " . $value . "<br>";
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
            echo "</tbody></table>";
            echo "</div><br>";
        }
        

        //* Exercice : Afficher successivement les données de chaque employé en passant par le tableau multidimensionnel ($data) (utiliser la méthode FetchALL) à l'aide de deux boucles foreach
        echo "<h3 class='display-6'> Exercice 4 </h3>";
        echo "<p>Afficher les données de tous les employés en parcourant un tableau multidimensionnel des données de la BDD <b>avec <u>deux boucles foreach</u></b></p>";


        $resultat = $bdd->query("SELECT * FROM employes");
        $data = $resultat -> FetchALL(PDO::FETCH_ASSOC);
        // FetchALL() est une méthode de la classe PDOStatement qui retourne un tableau multidimensionnel avec chaque tableau Array qu'il contient

        // echo '<pre>'; print_r($data); echo '</pre>';
        // echo "<hr>";
        
        foreach($data as $value) {
            echo "<div class='col-md-4 mx-auto p-2 bg-danger text-white rounded nb-2'>";
            echo "<table class='table table-sm table-borderless text-white'><thead><tr><td><b>Fiche employé</b></td></tr></thead><tbody>";
            // echo '<pre>'; print_r($key); echo '</pre>';
            foreach($value as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
            // echo "<hr>";        
            echo "</tbody></table>";
            echo "</div><br>";
        };


        //* Avec une boucle for & foreach
        echo "<h3 class='display-6'> Exercice 5 </h3>";
        echo "<p>Afficher les données de tous les employés en parcourant un tableau multidimensionnel des données de la BDD avec <b>une boucle for <u>et</u> une boucle foreach</u></b></p>";

        echo "<div class='container d-flex flex-wrap justify-content-center'>";
        for($i=0; $i<count($data); $i++) {
            // count(array) retourne le nombre d'éléments présents dans le tableau (ici multidimensionnel)
            echo "<div class='col-md-3 m-2 p-2 bg-secondary text-center rounded'>";
            foreach($data[$i] as $key => $value) {
                echo "$key : $value <br>";
            }
            echo "</div>";
        };
        echo "</div>";
        
        
        echo "<h2 class='display-5 text-center'> 05. PDO </h2>";
        echo "<h3 class='display-6 text-center'> QUERY - BDD </h3>";
        
        //* Exercice : Afficher la liste des bases de données (SHOW DATABASES), puis la mettre dans une liste html.
        echo "<h3 class='display-6'> Exercice 1 </h3>";
        echo "<p>Afficher la liste des bases de données (SHOW DATABASES), puis la mettre dans une liste html.</p>";

        $resultat = $bdd -> query("SHOW DATABASES");
        // echo '<pre>'; print_r($resultat); echo '</pre>';

        // $data = $resultat -> fetch(PDO::FETCH_ASSOC);
        // echo '<pre>'; print_r($data); echo '</pre>';
        
        echo "<ul class='col-md-3 mx-auto list-group'>";
        while($data = $resultat -> fetch(PDO::FETCH_ASSOC)){
            echo "<li class='list-group-item'> $data[Database] </li>";
        }
        echo "</ul>";

        echo '<hr><hr>';


        // Obtenir un tableau de toutes les infos employés
        echo "<p>Afficher les données de tous les employés dans un tableau</p>";
        
        $resultat = $bdd -> query("SELECT * FROM employes");
        /*
            - columnCount() est une méthode issue de la classe PDOStatement qui retourne le nombre de colonnes sélectionnés via la requête SELECT
            - getColumnMeta() est une méthode qui retourne les informations liées à chaque colonne (ex: primary key, nom de la table, nom de la colonne, etc...)
        */
        echo "<table class='table table-striped'>";
        echo "<thead><tr>";
        for($i=0; $i<$resultat->columnCount(); $i++){
            $colonne = $resultat -> getColumnMeta($i);
            
            echo "<th>$colonne[name]</th>";   
        }
        echo '</tr></thead>';
        echo '<tbody>';
        
        // $data = $resultat -> fetch(PDO::FETCH_ASSOC);
        while($data = $resultat -> fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach($data as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";

        // $data = $resultat -> FetchALL(PDO::FETCH_ASSOC);
        // while($data = $resultat -> FetchALL(PDO::FETCH_ASSOC)){
        //     echo "<tr>";
        //     foreach($data as $value){
        //         echo "<td>$value</td>";
        //     }
        //     echo "</tr>";
        // }
        // echo "</tbody></table>";


        



    ?>
    

</body>
</html>