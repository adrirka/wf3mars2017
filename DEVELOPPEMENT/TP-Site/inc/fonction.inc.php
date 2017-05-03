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
//(isset($_SESSION['membre']); car un isset retourne déjà true ou false


// -----------
function internauteEStConnecteEtEstAdmin(){
    //cette fonction indique si le membre connecté est admin
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
        return true;
    }else{
        return false;
    }
}

// -----------
function executeRequete($req, $param = array()){ // $param est un array vide par défaut : il est donc optionnel

    // htmlspecicalchars : 
    if(!empty($param)){
        // si on a bien reçu un array, on le traite:
        foreach($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // transforme en entité HTML chaque caractères spéciaux dont les quotes
        }

    }

    // La requête préparée :
    global $pdo; // $pdo est déclarée dans l'espace global (fichier init.inc.php). Il faut donc faire 'global $pdo' pour l'utiliser dans l'espace local de cette fonction.
    $r = $pdo->prepare($req);
    $succes = $r->execute($param); // on exécute la requête en lui passant l'array $param qui permet d'associer chaque marqueur à sa valeur 

    // Traitement erreur SQL éventuelle
    if(!$succes) { //si $succes vaut false, il y a une erreur sur la requête
    die('Erreur sur la requête SQL : ' . $r->errorInfo[2]); // die arrête le script et affiche un message. Ici on affiche le message d'erreur SQL donné par errorInfo(). Cette méthode retourne un array, dans lequel le message se situe à l'indice [2]

    }

    return $r; // retourne un objet PDOStatement qui contient le résultat de la recherche

}

//********************************** fonctions du panier ***************************************

function creationDuPanier(){
    if(!isset($_SESSION['panier'])){
        // si le panier n'existe pas dans SESSION on le crée :
        $_SESSION['panier'] = array(); // le panier est un array vide
        $_SESSION['panier']['titre'] = array(); 
        $_SESSION['panier']['id_produit'] = array(); 
        $_SESSION['panier']['quantite'] = array(); 
        $_SESSION['panier']['prix'] = array(); 

    }
}

function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){ // ces arguments sont en provenance de panier.php

    creationDuPanier(); // pour créer la structure si elle n'existe pas

    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); // array_search retourne un chiffre si l'id_produit est présent dans l'array $_SESSION['panier'], qui correspond à l'indice auquel se situe l'élément (rappel : dans un array le premier indice vaut 0). Sinon retourne FALSE

    if($proposition_produit === false){
        // Si le produit n'est pas dans le panier on l'y ajoute : 
        $_SESSION['panier']['titre'][] = $titre; // les crochets vides pour ajouter l'élément à la fin de l'array (équivalent .push en js)
        $_SESSION['panier']['id_produit'][]= $id_produit; 
        $_SESSION['panier']['quantite'][]= $quantite; 
        $_SESSION['panier']['prix'][] = $prix; 
    }else {
        // si le produit existe , on ajoute la quantite nouvelle à la quantité déjà présente dans le panier
        $_SESSION['panier']['prix']

    }

}