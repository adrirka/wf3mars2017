<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/

// Liaison
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// Requête
$resultat = $pdo->query("SELECT nom, prenom, telephone FROM contact");

$req = $resultat->fetch(PDO::FETCH_ASSOC);

echo '<pre>'; print_r($req) ;echo '</pre>';


// creation de la table html


echo '<table border="1">';
    foreach(){ 

        echo '<tr>'; 
            $_POST['nom'];
			$_POST['prenom'];
			$_POST['telephone'];
        echo '</tr>';

    }
echo '</table>';

