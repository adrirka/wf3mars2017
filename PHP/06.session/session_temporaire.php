<?php
//Contexte : souvent sur les sites bancaires, vous êtes déconnecté automatiquement au bout de 10minutes d'inactivité.$_COOKIE

session_start(); // on crée une session

echo '<pre>'; print_r($_SESSION); echo '</pre>'; 

if(isset($_SESSION['temps']) && isset($_SESSION['limite'])){

    //on vérifie si les 10secondes d'inactivité sont écoulées : 
    if(time() > ($_SESSION['temps'] + $_SESSION['limite'])){
        session_destroy(); // si les 10 secondes sont écoulées, on supprime la session 
        echo '<hr>Votre session a expiré, vous êtes déconnecté<hr>';
    }else{
        $_SESSION['temps'] = time(); // sinon on remet à jour le temps pour relancer les 10secondes
        echo '<hr>Connexion mise à jour<hr>'; 
    }


}else{
    $_SESSION['temps'] = time(); // on remplit la session avec un indice 'temps' qui contient le timestamp de l'instant présent
    $_SESSION['limite'] = 10; // on fice la durée limite de la session à 10 seconde
    echo '<hr>Vous êtes connecté<hr>';

}




