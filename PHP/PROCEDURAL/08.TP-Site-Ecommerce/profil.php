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
    // Mon CODE : OK il fonctionne

    //echo '<pre>'; print_r($_SESSION); echo '</pre>'; Pour vérifier les champs à sélectionner dans la requête préparée depuis la SuperGlobale $_SESSION, array par définition. Soit id_commande, date_enregistrement et etat.

    $suiviCommande = $pdo->prepare("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = :id_membre");
    
    $suiviCommande->execute(array(':id_membre' => $_SESSION['membre']['id_membre']));

    if($suiviCommande->rowCount() > 0){

        $contenu .= '<ul>';
            while($resultat =  $suiviCommande->fetch(PDO::FETCH_ASSOC)){

            //echo '<pre>'; print_r($resultat); echo '</pre>'; // ici mon objet PDO Statement $suiviCommande est bien transformé en array grâce au fetch

                    $contenu .='<li>';
                        $contenu .=  '<p>Votre numero de commande est le ' . $resultat['id_commande'] . '</p>';
                        $contenu .=  '<p>La commande a été passée le ' . $resultat['date_enregistrement'] . '</p>';
                        $contenu .= '<p>L\'etat de la commande est ' . $resultat['etat'] . '</p>';
                    $contenu .= '</li>';
            }
        $contenu .= '</ul>';
    }else{
        $contenu .= "<p>Aucune commande en cours</p>";
    }
    
    /*CORRECTION du prof = ALTERNATIVE

    $id_membre = $_SESSION['membre']['id_membre'];

    $resultat = executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'"); // dans une requête SQL, on met les variables entre quotes. Pour mémoire si on y met un array, celui-ci perd ses quotes autours de l'indice. A savoir : on ne peut pas le faire avec un array multidimensionnel. 

    //  S'il y a des commandes dans $resultats on les affiche, c'est donc une condition :
    if($resultat->rowCount() > 0){ // $resultat est un objet donc on utilise pas de [] comme dans un array, de plus une méthode (ici rowCount) prend toujours des parentheses, sans paramètre
        // on affiche les commandes
        $contenu .= '<ul>'
        while($commande = $resultat->fetch(PDO::FETCH_ASSOC)){
            $contenu .= '<li>Votre commande n° ' . $commande['id_commande'] . ' du ' . $commande['date_enregistrement'] . 'est actuellement ' . $commande['etat'] . '</li>';
        }else{
            $contenu .= 'Aucune commande en cours';
        }

    }
    */
    





// ---------------------------- AFFICHAGE ----------------------------------
require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');