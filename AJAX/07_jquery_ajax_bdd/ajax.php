<?php
     $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

     $id_employes = 350;
     if(isset($_POST['personne'])){
         $id_employes = $_POST['personne'];
     }
     $employes = $pdo->query("SELECT * FROM employes WHERE id_employes = $id_employes"); // attention de bien utiliser des guillemet sinon la variable est interprétée en tant que STRING

     $informations_employes = $employes->fetch(PDO::FETCH_ASSOC);

    $tab = array();
    $tab['resultat'] = '<table border="1"><tr>';
    $tab['resultat'] .= '<th>' . implode('</th><th>', array_keys($informations_employes)) . '</th></tr>';
    
    $tab['resultat'] .='<tr>';

    foreach($informations_employes as $valeur){
        $tab['resultat'] .='<td>' . $valeur . '</td>';

    }

    $tab['resultat'] .= '</tr>';
    $tab['resultat'] .= '</table>';
    

     echo json_encode($tab);

