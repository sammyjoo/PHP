<?php 
    include_once("../include/init.php");



    include_once("../include/header.php");
?>
    <?php if(membreConnecte()): ?>
        <div class="col-md-10 mx-auto">

            <h1 class="text-center">Profil de <?= $_SESSION['membre']['prenom'] ?></h1>
            <div class="col-md-6 mx-auto">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Email</li>
                    <li class="list-group-item w-50"><?= $_SESSION['membre']['email'] ?></li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Nom</li>
                    <li class="list-group-item w-50"><?= $_SESSION['membre']['nom'] ?></li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Prénom</li>
                    <li class="list-group-item w-50"><?= $_SESSION['membre']['prenom'] ?></li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Statut</li>
                    <li class="list-group-item w-50">

                        <?php if($_SESSION['membre']['statut'] == 0): ?>
                            Client
                        <?php elseif($_SESSION['membre']['statut'] == 1): ?>
                            Admin
                        <?php endif; ?>

                    </li>
                </ul>

                <div class="row justify-content-between">
                    <div class="col-md-5">
                        <a class="btn btn-outline-info" href="">Modifier mon profil</a>
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-outline-danger" href="">Modifier mon mot de passe</a>
                    </div>
                </div>
                
            </div>

        </div>
    <?php else: ?>
        <?php include_once("../include/erreur403.php") ?>
    <?php endif; ?>

<?php 
    include_once("../include/footer.php");