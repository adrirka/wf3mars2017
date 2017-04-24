<?php
// ********************************
// La superglobale $_GET
// ********************************
// $_GET représente l'URL : il s'agit d'une superglobale, et comme toutes les superglobales d'un ARRAY. Superglobale signifie qu'il est disponible dans tous les contextes du script, y compris dans les fonctions : il n'est pas nécessaire de faire global $_GET

// Les infos transitent dans l'url de la manière suivante : 
//page.php?indice1=valeur1&indice2=valeur2 (sans espace)
// Chaque indice de cette URL corrspond à un indice de l'array $_GET et chaque valeur aux arrays correspondants aux indices'


// print_r($GET);

if(isset $_GET['article']) &&isset($_GET['couleur']) &&  isset($^_GET['prix'])){
    // si existent les indices articles, couleur et prix, on peut les afficher

echo 'Article : ' . $_GET['article'] . '<br>';
echo 'Couleur : ' . $_GET['couleur'] . '<br>';
echo 'Prix : ' . $_GET['prix'] . '<br>';
}else{
    echo 'aucun produit sélectionné';
}


