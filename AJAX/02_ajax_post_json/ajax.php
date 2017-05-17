<?php

// nous avons besoin d'un langage interprété côté server pour pouvoir communiquer

// methode ternaire (avec "?" pour "si" et ":" pour "sinon" )
//$prenom = isset($_POST['prenom'] ) ? $_POST['prenom'] : '';

$prenom = '';
if(isset($_POST['prenom'])){
    $prenom = $_POST['prenom']; //on récupere l'argument fourni via post
}

$tab = array(); // on prépare le tableau qui contiendra la réponse

$fichier = file_get_contents("fichier.json"); // on récupère le contenu du fichier.json
$json = json_decode($fichier, true); // on transforme en tableau array représenté la variable $json

foreach($json as $valeur){
    if($valeur['prenom'] == strtolower($prenom)){
        $tab['resultat'] = '<table border="1"><tr>';
        foreach($valeur as $informations){
            $tab['resultat'] .= '<td>' . $informations . '</td>'; 
        }
        $tab['resultat'] .= '</td></table>';
    }      
}

echo json_encode($tab); // la réponse