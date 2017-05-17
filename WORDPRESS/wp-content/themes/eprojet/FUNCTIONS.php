<?php
//---- REGION/WIDGET
add_action('widgets_init', 'eprojet_init_sidebar'); // j'exécute la fonction nommée "eprojet_init_sidebar".
function eprojet_init_sidebar() //fonction qui contient la déclaration des mes régions

{


    if (function_exists('register_sidebar')){ // si la fonction register_sidebar_nav_menu existe (c'est une fonction interne à wordPress), alors je déclare des régions

        register_sidebar(array(
            'name'          => __('region-entete', 'eprojet'),
            'id'            => 'region-entet',
            'description'   => __('Add widgets here to appear in your entet region', 'eprojet')


        ));


        register_sidebar(array(
            'name'          => __('colone de droite', 'eprojet'),
            'id'            => 'colonne-droite',
            'description'   => __('Add widgets here to appear in your right column region', 'eprojet')


        ));

        register_sidebar(array(
            'name'          => __('region-footer', 'eprojet'),
            'id'            => 'region-footer',
            'description'   => __('Add widgets here to appear in your footer region', 'eprojet')


        ));

    }

     
}

// ---- MENU
add_action('init', 'eprojet_init_menu'); // j'exécute la fonction nommée "eprojet_init_menu()'
function eprojet_init_menu() // fonction qui contient la déclaration de mes régions
{
    if(function_exists('register_nav_menu')) // si la fonction register_sidebar_nav_menu existe (c'est une fonction interne à wordPress), alors je déclare des régions

    {
        register_nav_menu('primary', __('Primary Menu', 'eprojet'));
    }


}