<?php

    include_once('include/header.php');
    include_once('include/nav.php');
?>


    <h1 class="text-center m-4">Formulaire 3</h1>



    <!-- action="affichage.php" ==> il permet d'envoyer les données d'un formulaire sur un autre fichier -->

    <!-- method="post" -->

    <form method="post" action="affichage.php" class="col-md-4 mx-auto text-center">
    
        <div class="form-group">
        
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" class="form-control" placeholder="Saisir votre pseudo" name='pseudo'>

        </div>

        <div class="form-group">
        
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" placeholder="Saisir votre email" name='email'>

        </div>


        <div class="form-group">
            
            <label for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" placeholder="Saisir votre nom" name='nom'>

        </div>


        <!--


            le for="" du label est relié à l'id="" de l'input
            avec le même terme, c'est un effet front de cliquer sur le label et d'être dans l'input

            pour récupérer en PHP la valeur de l'input c'est grâce à l'attribut name=""
        -->
    
        <input type="submit" class="btn btn-success col-md-12" value="Valider">

        <!--<button type="submit" class="btn btn-success col-md-12">Connexion</button>-->

        <!-- Pour soumettre un formulaire il est nécessaire d'avoir un bouton / input ayant le type="submit"  -->


    </form>






<?php
    include_once('include/footer.php');

