<?php

/*

    1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
    Cette fonction prends deux paramètres : une date (valide) et le format de conversion "US" ou "FR"

    2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.

*/ 

// MON CODE 

/*
$date = '';
$format = ''; 

function date_conversion($date, $format){
    if($format == 'US'){
        echo strftime ('%d-%m-%Y');
    }
    elseif($format == 'FR'){
        echo strftime('%Y-%m-%d');
    }
}

date_conversion('19/10/2016', 'FR');

*/

// CORRECTION

function afficheDate($date, $format){

    // Version avec objet date
    $objetDate = new DateTime($date);

    if($format == 'FR'){
        return $objetDate->format('d-m-Y') . '<br>';
    }elseif($format == 'US'){
        return $objetDate->format('Y-m-d') . '<br>';
    }else{
        echo 'le format de date n\'est pas reconnu';
    }
}

    // Autre version 
    if($format == 'FR'){
        return strftime('%d-%m-%Y', strtotime($date)); // strtotime retourne la date donnée en timestamp. strftime retourne le timestamp formaté selon le format indiqué avec des %
    }elseif($format == 'US'){
        return strftime('%Y-%m-%d', strtotime($date)) .'<br>';
    }else{
        return 'le format de date n\'est pas reconnu';
    }

// execution de la fonction (valable pour les deux versions)

echo afficheDate('05-05-2017', 'US');
echo afficheDate('2017-05-05', 'FR');



