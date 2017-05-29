<?php

//EXERCICE:
//Principe : crééer un formaulaire qui permet d'enregistrer un nouvel employé dans la base entreprise

/* Les étapes : 
    1- création du formulaire HTML
    2- Connexion à la BDD
    3- Lorsque le formulaire est posté, insertion des informations du formulaire en BDD. 
        >Faites-le avec une requête préparée
    4- Afficher à la fin un message "L'employé a bien été ajouté"    
*/

$message = ''; // variable d'affichage des messages d'erreur de validation du formulaire 

// connection à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//Vérification que les champs du formulaire existent 

// echo '<pre>'; var_dump($_POST); echo '</pre>';
// permet de checker la nature et les éléments de la superglobale $_POST : ici on est sur un array comme toute les superglobales

if(!empty($_POST)){ //si le formulaire est posté, il y a des indices dans $_POST, il n'est donc pas vide. Il n'est pas ainsi pas nécéssaire de faire vérifier champs par champs comme fait ci dessous la totalité des champs remplis, mais de minimiser les echo dans le traitemen : voir plutôt la partie 
     if(empty ($_POST['id_employes'])){
            echo 'Champs obligatoire1' . '<br>';
        }elseif(empty ($_POST['prenom'])){
            echo 'Champs obligatoire2' . '<br>';
        }elseif(empty ($_POST['nom'])){
            echo 'Champs obligatoire3' . '<br>';
        }elseif(empty ($_POST['sexe'])){
            echo 'Champs obligatoire4' . '<br>';
        }elseif(empty ($_POST['service'])){
            echo 'Champs obligatoire5' . '<br>';
        }elseif(empty ($_POST['date_embauche'])){
            echo 'Champs obligatoire6' . '<br>';
        }elseif(empty ($_POST['salaire'])){
            echo 'Champs obligatoire7' . '<br>';
    }else{

            // contrôle du formulaire 
            if (strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .= '<div>le prenom doit comporter au moins 3 caractères</div>'; // ".=" est un opérateur d'affectation, l'équivalent du "+=" en javascript. strlen mesure la longueur d'un string, indique le nbre de caractère

            if (strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .= '<div>le nom doit comporter au moins 3 caractères</div>';
            
            if ($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .= '<div>Le sexe n\'est pas correct</div>'; // ici il ne s'agit pas d'un string, du coup on cherche juste à savoir si un des deux choix a été choisi en proposant une condition OU '||' entre les deux choix soumis à un '!=' différent de 

             if (!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .= '<div>Le salaire doit être supérieur à 0</div>'; // le numeric() teste si c'est un nombre

             $tab_date = explode('-',  $_POST['date_embauche']); //met le jour, le mois et l'année dans un array pour les passer à la fonction checkdate ($mois, $jour, $annee)
             if(! (isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[0], $tab_date[1], $tab_date[2]))); 

            // preparation de la requete (prepare() + marqueurs nominatifs :nom / :prenom / :sexe ...)
            $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

            // bindParam (autant de bindParam que de marqueurs nominatifs )

            $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR); // PDO::PARAM_STR indique qu'il s'agit d'un STRING
            $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
            $resultat->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
            $resultat->bindParam(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
            $resultat->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_STR);


            // execution de la requete execute()

            $req = $resultat->execute();

            //Afficher un message "l'employé a été ajouté"
            if($req) { // execute() ci-dessus renvoie soit un TRUE si la requête a fonctionné. Sinon il renvoie un booléen false. Si $req contient un objet, il vaut true implicitement : on entre donc dans la condition
                echo 'L\'employé a bien été ajouté';
            }else{
                echo 'Une erreur est survenue lors de l\'enregistrement';
            }
    }
}

?>

<!-- creation du formulaire -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Formulaire PHP</title>
    
        <style>
            label,input{
                display:block;
                margin: 10px;
            }

            h1{
                margin-bottom: 15px;
            }

           
        </style>
    
    </head>
    <body>
        
        <h1>Enregistrer un employé</h1>

        <!-- Mon code -->

        <form action="#" method="post">
            
            <label for="id_employes">ID Employe</label>
                <input type="number_format" name="id_employes" id="id_employes">
            <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom">
            <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">
            <label for="sexe">Sexe</label>
                <select name="sexe" id="sexe">
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            <label for="service">Service</label>
                <select name="service" id="service">
                    <option value="informatique">Informatique</option>
                    <option value="commercial">Commercial</option>
                    <option value="assistant">Assistant</option>
                    <option value="juridique">Juridique</option>
                    <option value="direction">Direction</option>
                    <option value="secretariat">Secretariat</option>
                    <option value="comptabilite">Comptabilite</option>
                    <option value="communication">Communication</option>
                    <option value="production">Production</option>  
                </select>
            <label for="date_embauche">Date Embauche</label>
                <input type="date_format" name="date_embauche" id="date_embauche">
            <label for="salaire">Salaire</label>
                <input type="number_format" name="salaire" id="salaire">

            <input type="submit" value="Soumettre">
        


        <!-- Code correction -->
        <!-- Ici nous pouvions utiliser aussi des boutons radio pour les choix multiples -->

        <h2>correction : exemple bouton radio</h2>
        <input type="radio" name="gender" id="homme" value="m" checked><label for="homme">Homme</label>
        <input type="radio" name="gender" id="femme" value="f"><label for="femme">Femme</label>
        
        </form>

    </body>
</html>
