<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

// ce code permet de récupérer le fichier css du parent 
// la fonction add_action permet d'accrocher le fichier style du thème parent, fichier style du thème enfant, ce que l'on appelle un 'hook'
