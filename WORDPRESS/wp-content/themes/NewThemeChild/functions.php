<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles(){
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

//ce code permet de récupérer le fichier css du thème parent 
//La fonction add_action permet d'accrocher le fichier style du thème parent, fichier style du theme enfance, ce que l'on appel un 'hook' => utile dans le cas de MAJ du thème parent 