<?php

// ******************************* fonctions membres ****************************************

function internauteEstConnecte(){
    // Cette fonction indique si l'internaute est connecté : si la session 'membre' est définie, c'est que l'internaute est passé par la page de connexion azvec le bon mot de passe '
    if(isset($_SESSION['membre'])){
        return true;
    }else{
        return false;
    }
}

// on pourrait directement écrire 
//(isset($_SESSION['membre']); car un isset retourne déjà un true ou un false


// -----------
function internauteEStConnecteEtEstAdmin(){
    //cette fonction indique si le membre connecté est admin
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
        return true;
    }else{
        return false;
    }
}