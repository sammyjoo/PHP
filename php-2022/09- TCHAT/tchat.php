<?php
/*
    ETAPE : Esapce de dialogue 
    1. Création de la BDD
            BDD : tchat
            TABLE : commentaire
                  id_commentaire        // INT(11) PK - AI (primary key | auto incrémenté)
                  pseudo                // VARCHAR(20)
                  date_enregistrement    // DATETIME 
                  message               // TEXT
    2. Connexion à la BDD 
    3. Création du formulaire HTML (pour l'ajout de message | sauf le champ date_enregistrement)
    4. Contrôler en PHP que l'on receptionne bien toute les données saisies dans le formulaire
    5. Requete SQL d'enregistrement (INSERT)
    6. Affichage des messages (date au format français)
    7. Afficher le nombre de messages
*/

    //* 1. Création de la BDD : 
    //? via l'interface phpMyAdmin (voir capture d'écran ./creation-table.PNG)

    //* 2. Connexion à la BDD 'tchat'
    $bdd = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    //* 3. Création du formulaire HTML
    //? ci-dessous en HTML

    //* 4. Contrôler en PHP que l'on receptionne bien toute les données saisies dans le formulaire
    if($_POST) {

        // Bloquer les tentatives d'injection de <script> et de <style> dans l'input
        foreach($_POST as $key => $value){
            // strip_tags() supprime les balises HTML de l'entrée formulaire, et conserve seulement le reste de son contenu
            // trim() supprime les espaces en début et en fin d'une chaîne de caractères
            // pour tester : <a href='www.wikipedia.org'>Lien</a> => ne conserver que la châine de caractères 'Lien'
            $_POST[$key] = strip_tags(trim($value));
            
        }

        echo "<pre>"; print_r($_POST); echo "</pre>";
        
        //* 5. Requete SQL d'enregistrement (INSERT)
        $req = "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)";
        // ':pseudo'
        // ':message'     ':' est un marqueur nominatif qui revient à écrire '$_POST[key]'
        $insert = $bdd->prepare($req);
        $insert->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $insert->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
        // bindValue() indique quelle valeur on envoie dans quel marqueur nominatif
        $insert->execute();
        // execute() exécute la valeur 
        
        
        //* 6. Affichage des messages (date au format français)
        $resultat = $bdd->query("SELECT pseudo, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS DateFR, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS HeureFR, message FROM commentaire ORDER BY date_enregistrement");
        // echo "<pre>"; print_r($resultat); echo "</pre>";
        while($data = $resultat->fetch(PDO::FETCH_ASSOC)){
            
            switch($data['pseudo']){
                case 'Gabriel': $bgColor = 'primary';break;
                case 'Anthony': $bgColor = 'success';break;
            }
            
            echo "<div class='col-md-5 mx-auto bg-$bgColor rounded text-white'>";
            
            echo "<p> $data[pseudo] ($data[DateFR] à $data[HeureFR]) : <b>$data[message]</b></p>";
            
            echo "</div>";
        }
        
        
        //* 7. Afficher le nombre de messages
        echo "<p class='text-center'>Nombre de messages enregistrés : " . $resultat->rowCount() . "</p>";
        
    }


?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>09 - TCHAT</title>
<style>
	body {
		margin-bottom: 290px;
	}
</style>

<body>
	<div class="container">

		<h1 class="display-4 text-center">09 - TCHAT</h1>
		<hr>

		<form method="post" action="" class="col-md-10 mx-auto fixed-bottom bg-secondary p-2 rounded">
			<div class="form-group">
				<label for="pseudo">Pseudo</label>
				<input type="text" class="form-control" id="pseudo" name="pseudo">
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea class="form-control" id="message" name="message" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-dark">Poster</button>
		</form>

	</div>
</body>