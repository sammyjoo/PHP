<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo();?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/style.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!--
        le blog_info une fonction qui permert de recupérer plusieurs paramètre
        dont template_directory et template_url qui permet de afficher et executer les url les chemeins acces css js ou autre 
    -->

    <header>
        <div class="row">
            <div class="col-md-6 rouge haut-gauche">
                <?php dynamic_sidebar('colonne-haut-gauche') ?>
            </div>
            <div class="col-md-6 bleu haut-droit">
            <?php dynamic_sidebar('colonne-haut-droit') ?>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

              <?php wp_nav_menu(array('container_class' => 'menu-header' , 'theme-location' => 'primary')) ?>

            </div>
          </div>
        </nav>
    </header>
    <section>
      