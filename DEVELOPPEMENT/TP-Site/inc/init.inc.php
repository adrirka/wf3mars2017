<?php
/*
    Le fichier init.inc.php sera inclus dans tous les scripts (hors les fichiers inc eux-mêmes) pour initialiser les éléments suivants : 
    -connexion à la bdd
    -création ou ouverture de session
    -definir une constante pour le chemin du site
    -et une inclusion du fichier fonction.inc.php systématiquement dans tous les scripts 
*/ 

// Connexion à la bdd
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// session
session_start();

// chemin du site
define('RACINE_SITE', '/Adrien Rousselet/DEVELOPPEMENT/TP-Site/'); // indique le dossier dans lequel se situe le site sans 'localhost'

// Déclaration des variables d'affichages du site :
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// autre inclusion 
require_once('fonction.inc.php');