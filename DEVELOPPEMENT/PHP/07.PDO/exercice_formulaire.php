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

// connection à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//Vérification que les champs du formulaire existent 

echo '<pre>'; var_dump($_POST); echo '</pre>';

if(!empty($_POST)){
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
        echo 'Le formulaire a bien été envoyé';

// preparation de la requete (prepare() + marqueurs nominatifs :nom / :prenom / :sexe ...)
$resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, :embauche, :salaire)");

// bindParam (autant de bindParam que de marqueurs nominatifs )

$resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
$resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
$resultat->bindParam(':service', $service, PDO::PARAM_STR);
$resultat->bindParam(':prenom', $prenom, PDO::PARAM_STR);



// execution de la requete (execute())

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
            }
        </style>
    
    </head>
    <body>
        
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
        </form>

    </body>
</html>

