<?php
require_once('inc/init.inc.php');

$tab = array();
$tab['resultat'] = '';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$arg = isset($_POST['arg']) ? $_POST['arg'] : '';

if($mode == 'liste_membre_connecte' && empty($arg)){
    // récupérer le contenu du fichier prenom.txt (file())
    // placer ds $tab['resultat'] le contenu de ce fichier sous la forme '<p>pseudo1</p><p>pseudo2</p>'

$liste_membre = file("prenom.txt"); // la fonction file() place chaque ligne du fichier précisé en argument dans un tableau array

    foreach($liste_membre as $valeur){
        $tab['resultat'] .= '<p>' . $valeur . '</p>';
    }

}
elseif($mode == 'postMessage' ){

    // on teste s'il y'a bien un message à enregistrer 
    $arg = trim($arg); // on enlève les espaces avant et apr_s la chaine de caractères ainsi que si le message ne possède que des espaces.
    if(!empty($arg)){ // si le message n'est pas vide. Alors on lance un insert into'
        
        
        //$position = strpos($arg, ">");
        //$arg = substr($arg, $position);
        //Les deux lignes précédentes sont à déconnecter si l'on enregistre avec le pseudo et le >'

        // Mathieu > Bonjour à tous 
        // Bonjour à tous 

        // enregistrement du message
        $pdo->query("INSERT INTO dialogue (id_membre, message, date) VALUES ($_SESSION[id_membre], '$arg', NOW())");

        $tab['resultat'] .= 'Message enregistré!';
    } 
}
elseif($mode == 'message_tchat'){
    // récupérer tous les messages de la table dialogue
    // traitement de l'objet resultat avec un while pour placer la réponse dans $tab['resultat']

    $query = $pdo->query("SELECT membre.pseudo, membre.civilite, dialogue.message FROM dialogue, membre WHERE membre.id_membre = dialogue.id_membre ORDER by dialogue.date");
    
    while($resultat = $query->fetch(PDO::FETCH_ASSOC)){
        
        if($resultat['civilite'] == 'm'){
            $tab['resultat'] .= '<p class="bleu">' . ucfirst($resultat['pseudo']) . '>' . $resultat['message'] . '</p>'; // ucfirst pour upperCase first
        }else{
            $tab['resultat'] .= '<p class="rose">' . ucfirst($resultat['pseudo']) . '>' . $resultat['message'] . '</p>';
        }
        
    }
    
}elseif($mode == 'liste_membre_connecte' && !empty($arg)){
    // si $arg n'est pas vide alors on a u n pseudo et nous devons le retirer du fichier prenom.txt
    $contenu = file_get_contents('prenom.txt'); // on récupère le contenu du fichier prenom.txt dans la variable $contenu
    $contenu = str_replace($arg, '', $contenu); // on remplace le pseudo recherché par rien
    file_put_contents('prenom.txt', $contenu); // on écrase l'ancien contenu par le nouveau pseudo concerné
}

echo json_encode($tab);