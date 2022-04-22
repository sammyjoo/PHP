<?php
// 1er fichier à inclure : init.php(connexion à la bdd, session, variables, fonctions...)
    include_once("include/init.php");
    include_once("include/header.php");
?>

    <h1 class="text-center mt-3">Bienvenue<?php if(membreConnecte()) echo $_SESSION['membre']['prenom']?></h1>

    <?php
    include_once("include/footer.php");
    ?>