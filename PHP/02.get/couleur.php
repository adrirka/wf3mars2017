<h1>Couleur du fruit</h1>
<?php
// Exercice : 

/*

-Dans le fichier listeFruits.php : créer 3 liens banane, kiwi et cerise. Quand on clique sur les liens, on passe le nom du fruit dans l'url a la page couleur.php
-Dans couleur.php : vous récupérez le nom du fruit et afficher sa couleur
-Notez que vous ne passez pas la couleur dans l'url mais vous la déduisez dans couleur.php

*/

if(isset($_GET['fruit'])){
    echo 'fruit : ' . $_GET['fruit'] . '<br>';
    
    if ($_GET['fruit'] == 'banane'){
        echo 'Couleur : jaune <br>';
    }elseif ($_GET['fruit'] == 'kiwi'){
        echo 'Couleur : vert <br>';
    }elseif ($_GET['fruit'] == 'cerise'){
        echo 'Couleur : rouge <br>';
    }else{
        echo 'Ce fruit n\existe pas <br>';
    }
}else{
    echo 'Aucun fruit sélectionné';
}

