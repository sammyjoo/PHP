<?php

add_action('widgets_init', 'theme_perso');

function theme_perso() {
    register_sidebar(array(
        'name' => 'Colonne haut gauche',
        'id' => 'colonne-haut-gauche',
        'description' => 'Ceci est ma colonne de gauche associée au header',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>'
    ));
    register_sidebar(array(
        'name'          => 'Colonne haut droit',
        'id'            => 'colonne-haut-droit',
        'description'   => 'Ceci est ma colonne de droite associée au header',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widgettitle">',
        'after_title'   => '</h1>',


    ));
    register_sidebar(array(
        'name'          => 'colonne bas gauche',
        'id'            => 'colonne-bas-gauche',
        'description'   => 'Ceci est ma colonne de droite associée au footer',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widgettitle">',
        'after_title'   => '</h1>',


    ));
    register_sidebar(array(
        'name'          => 'colonne bas droit',
        'id'            => 'colonne-bas-droit',
        'description'   => 'Ceci est ma colonne de droite associée au footer',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widgettitle">',
        'after_title'   => '</h1>',


    ));
}

add_action('init', 'theme_perso_menu');

function theme_perso_menu() {
    register_nav_menu('primary', __('Primary Menu', 'theme_perso') ); 
}

/*
création widget en haut à droite

*/
