<?php
register_sidebar(array(
    'name'              => 'region du bas',
    'id'                => 'region-du-bas',
    'description'       => 'region en bas à gauche',
    'before_widget'     => '<aside id="%1$s" calss="widget %2$s">',
    'after_widget'      => '</aside>',
    'before_title'      => '<h1 class="widget-title">',
    'after_title'       => '</h1>',
));

/*
Explications :
name : nom de la région
id : nom informatique de la région
description : description de la région, utile pour rendre explicite auprès de l'administrateur
before_widget : balise de début qui englobera chaque widget placé dans cette région
after_widget : balise de fin qui englobera chaque widget placé dans cette région
before_title : balise de début qui englobera chaque titre placé dans cette région
after_title : balise de fin qui englobera chaque titre placé dans cette région

*/




dynamic_sidebar('region-du-bas');

// Ajouter un logo en haut à gauche
// création d'une nouvelle région
// placer dans le header entre les balises <hgroup></hgroup> sans supprimer le contenu


register_sidebar(array(
    'name'              => 'region du haut',
    'id'                => 'region-du-haut',
    'description'       => 'region en haut à gauche',
    'before_widget'     => '<aside id="%1$s" calss="widget %2$s">',
    'after_widget'      => '</aside>',
    'before_title'      => '<h1 class="widget-title">',
    'after_title'       => '</h1>',
));

dynamic_sidebar('region-du-haut');


register_sidebar(array(
    'name'              => 'region du milieu',
    'id'                => 'region-du-milieu',
    'description'       => 'region au milieu ',
    'before_widget'     => '<aside id="%1$s" calss="widget %2$s">',
    'after_widget'      => '</aside>',
    'before_title'      => '<h1 class="widget-title">',
    'after_title'       => '</h1>',
));

dynamic_sidebar('region-du-milieu');