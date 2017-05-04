<?php
require_once('inc/init.inc.php');

// ---------------------------- TRAITEMENT ---------------------------------
//si visiteur non connecté, on l'envoie vers connexion.php
if(!internauteEstConnecte()){ 
    header('location:connexion.php'); //nous l'invitons à se connecter
    exit();
}

//echo '<pre>'; print_r($_SESSION);echo '</pre>'; // on voit qu'il s'agit d'un array multidimension (=premier array Membre suivi de sous array)

$contenu .= '<h2>Bonjour ' . $_SESSION['membre']['pseudo'] .' ! </h2>';

// On affiche le statut du membre 
if($_SESSION['membre']['statut'] == 1){
    $contenu .= '<p>Vous êtes un administrateur</p>';
}else{
    $contenu .= '<p>Vous êtes un membre</p>';  
}

$contenu .= '<div><h3>Voici vos informations de profil</h3>';
    $contenu .= '<p>Votre email :'. $_SESSION['membre']['email'] . '</p>';
    $contenu .= '<p>Votre code postal :'. $_SESSION['membre']['code_postal'] . '</p>';
    $contenu .= '<p>Votre ville :'. $_SESSION['membre']['ville'] . '</p>';
$contenu .= '</div>';



//Exercice 

/*  1- afficher le suivi des commandes du membre (s'il y'en a ) dans une liste <ul><li> : id_commande, date et état de la commande. S'il n'y en a pas, vous affichez "aucune commande en cours"

    -------------------------------
    4 grandes étapes
    -requêtes BDD via le PDO
    -requête préparée
    -fetch
    -echo
    -------------------------------
*/

    //echo '<pre>'; print_r($_SESSION); echo '</pre>';

    $suiviCommande = $pdo->prepare("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = :id_membre");
 
    $suiviCommande->execute(array(':id_membre' => $_SESSION['membre']['id_membre']));
    
    
    
    $contenu .= '<ul>';
    while($resultat =  $suiviCommande->fetch(PDO::FETCH_ASSOC)){
       // echo '<pre>'; print_r($resultat); echo '</pre>';
            $contenu .='<li>';
                $contenu .=  $resultat['id_commande'];
               $contenu .=  $resultat['date_enregistrement'];
                $contenu .= $resultat['etat'];
            $contenu .= '</li>';
    }
    $contenu .= '</ul>';
    





// ---------------------------- AFFICHAGE ----------------------------------
require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');