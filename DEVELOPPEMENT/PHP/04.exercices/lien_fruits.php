<?php 
// Exercice :

/*
-Faire 4 liens HTML avec le nom des fruits
-Quand on clique sur un lien, on affiche le prix pour 1000g de ce fruit, dans cette page lien_fruits.php
*/ 

include('fonctions.inc.php');


// mon code 

if(isset($_GET['fruit'])){
    
    if ($_GET['fruit'] == 'bananes'){
        echo calcul('bananes', 1000) . '<br>';
    }elseif ($_GET['fruit'] == 'pommes'){
        echo calcul('pommes', 1000) . '<br>';
    }elseif ($_GET['fruit'] == 'peches'){
        echo calcul('peches', 1000) . '<br>';    
    }elseif ($_GET['fruit'] == 'cerises'){
        echo calcul('cerises', 1000) . '<br>';
    }else{
        echo 'Ce fruit n\'existe pas <br>';
    }
}else{
    echo 'Aucun fruit sélectionné';
}

// code simplifié (correction)

//  if (isset($GET['fruit'])){
//      echo calcul($_GET['fruit'], 1000) . '<br>';
//  }

?>

<h1>Les fruits :</h1>
<a href="lien_fruits.php?fruit=bananes">Bananes</a>
<br>
<a href="lien_fruits.php?fruit=pommes">Pommes</a>
<br>
<a href="lien_fruits.php?fruit=cerises">Cerises</a>
<br>
<a href="lien_fruits.php?fruit=peches">Peches</a>