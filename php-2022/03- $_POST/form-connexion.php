<div class="container">
    
    <form method="POST" action="" class="col-md-6 mx-auto">
        <!-- method: comment vont circuler les données  -->
        <!-- action: URL de destination des données saisies dans le formulaire -->
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" minlength="8" required>
            <!-- il ne faut SURTOUT PAS oublier les attributs 'name'  des inputs, qui deviennent les indices de nos données dans le tableau $_POST -->
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary m-5">Connexion</button>
        </div>
    </form>
    <?php
    if($_POST) {
        /*
            En PHP, les données saisies dans un formulaire sont stockées automatiquement dans la superglobale $_POST.
            Ce tableau $_POST a pour indice les attributs 'name' des inputs du formulaire HTML.
        */ 
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // EXO : Afficher de façon conventionnelle sur la page web les données saisies dans le formulaire en passant par la superglobale $_POST
        echo "<div class='alert alert-success col-md-4 mx-auto text-center'>";
        echo "<h6 class='display-6 text-center'>Bienvenue</h6>";
        echo '<p>Votre pseudo est <b>' . $_POST['pseudo'] . '</b></p>';
        echo '<p>Votre mot de passe est <b>' . $_POST['password'] . '</b></p>';
        echo "</div>";
    }
    
    ?>
</div>