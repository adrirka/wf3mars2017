<?php

/*

Créer un tableau en PHP contenant les infos suivantes :  ● Prénom ● Nom ● Adresse ● Code Postal ● Ville ● Email ● Téléphone ● Date de naissance au format anglais (YYYY-MM-DD) 
 
A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML. La date sera affichée au format français (DD/MM/YYYY). 
 
Bonus :  Gérer l’affichage de la date de naissance à l’aide de la classe DateTime 
 
 
*/ 



$myInfo = array('prenom' => 'Adrien', 'nom' => 'Rousselet', 'adresse' => '158avenue Marx Dormoy', 'code_postal' => '92120', 'ville' =>'Montrouge', 'email' =>'rousselet.adrien@gmail.com', 'telephone' => '0672810925'); // variable de type array
//var_dump($myInfo);

$contenu = ''; // variable d'affichage du contenu

$contenu .='<h1>Tableau infos</h1>
            <ul>';

foreach($myInfo as $key => $value){
    
    echo "<li><b>$key</b> : $value<br></li>";
}

$date = new DateTime('1986-01-04');
    echo '<li><b>date de naissance :</b>' . $date->format('d-m-Y');

$contenu .= '</li></ul>';
         
?>


