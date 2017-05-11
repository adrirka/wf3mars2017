<!DOCTYPE html>
<html>

    <head <?php language_attributes(); // langue du site ?>>
    <title><?php bloginfo('name'); /*nom du site*/ wp_title('_', true, 'left'); ?></title>
    <meta charset="<?php bloginfo('charset'); // encodage du site  ?>"
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); //chemin vers le dossier du thème actif ?>/css/boostrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); //chemin vers le dossier du thème actif ?>/style.css">
    <script type="text/javascript" src="<?php bloginfo('template_directory'); //chemin vers le dossier du thème actif ?>/js/js.js">
    </head>

    <body <?php body_class(); ?>>

        <?php wp_nav_menu(array( 'theme_location' => 'primary' )) ?>

     

   
    