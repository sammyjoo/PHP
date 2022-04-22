<?php


if($_POST) // si j'ai cliqué sur le bouton submit
{
    echo '<pre>';print_r($_POST);echo '</pre>';


    echo $_POST['pseudo'];



    
}





    include_once('include/header.php');
    include_once('include/nav.php');
?>


    <h1 class="text-center m-4">Formulaire 1</h1>



    <!-- action="contact.php" ==> il permet d'envoyer les données d'un formulaire sur un autre fichier -->

    <!-- method="post" -->

    <form method="post" action="" class="col-md-4 mx-auto text-center">
    
        <div class="form-group">
        
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" class="form-control" placeholder="Saisir votre pseudo" name='pseudo'>

        </div>


        <div class="form-group">
        
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp" class="form-control" placeholder="Saisir votre mot de passe" name='mdp'>

        </div>


        <!--


            le for="" du label est relié à l'id="" de l'input
            avec le même terme, c'est un effet front de cliquer sur le label et d'être dans l'input

            pour récupérer en PHP la valeur de l'input c'est grâce à l'attribut name=""
        -->
    
        <input type="submit" class="btn btn-success col-md-12" value="Connexion">

        <!--<button type="submit" class="btn btn-success col-md-12">Connexion</button>-->

        <!-- Pour soumettre un formulaire il est nécessaire d'avoir un bouton / input ayant le type="submit"  -->


    </form>






<?php
    include_once('include/footer.php');

