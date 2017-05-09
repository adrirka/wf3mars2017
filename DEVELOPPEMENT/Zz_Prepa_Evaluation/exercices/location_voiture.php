<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/



// ------------------------------------ TRAITEMENT ----------------------------------------

$categorie_voiture = array('CategorieA', 'CategorieB', 'CategorieC', 'CategorieD');

$message = ''; // variable d'affichage des messages d'erreur

$resultat = ''; //variable d'affichage du résultat 

if(!empty($_POST)){

    // Contrôle du formulaire 

    if (!in_array($_POST['categorie_voiture'], $categorie_voiture)){
		$message .= '<p>La catégorie choisie n\'est pas valide</p>';
	}
    
    if (!(is_numeric($_POST['duree_location'])) && !(is_float($_POST['duree_location']))){
		$message .= '<p>La durée de location n\'est pas valide</p>';
	}

    if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20 ){
        $message .= '<p>Le nom doit comporter au minimum 2 caractères</p>';
    }

    if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20 ){
        $message .= '<p>Le prénom doit comporter au minimum 2 caractères</p>';
    }

    if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
        $message .= '<p>Le téléphone est incorrect</p>';
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$message .= '<p>L\'email n\'est pas valide</p>';
	}

}

if(empty($message)) {

// fonction calcul du prix


    function prixLoc($categorie_voiture, $duree_location){

        if($_POST['categorie_voiture'] == 'CategorieA'){
            $prix_location = 30;
        }elseif($_POST['categorie_voiture'] == 'CategorieB'){
            $prix_location = 50;
        }elseif($_POST['categorie_voiture'] == 'CategorieC'){
            $prix_location = 70;
        }elseif($_POST['categorie_voiture'] == 'CategorieD'){
            $prix_location = 90;
        }
        
        return $prix_location * $duree_location;
    }         	
    
}










// ------------------------------------ AFFICHAGE -----------------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Location voiture</title>
    
        <style>
            input, label, button{
				display: block;
				margin: 10px 0 10px 0;
			}

			label{
				font-weight: bold;
				color: green;
			}

            p{
                color:red;
            }

            h2{
                text-align: center;
            }

        </style>
    
    </head>
    <body>

      <form method="post" action="">
		
	
            <label for="categorie_voiture">Catégorie de voiture</label>
                <select name="categorie_voiture" id="categorie_voiture">
                    <?php 
                    foreach($categorie_voiture as $key => $value){
                        echo "<option value=$value>$value</option>";
                    } 
                    ?>	
                </select>	
            
            <label for="duree_location">Durée de la location en jour</label>
                <select name="duree_location" id="duree_location">
                    <?php 
                        for($d=1; $d<=30; $d++){
                            echo "<option value=$d>$d</option>";
                        }
                    ?>
                </select>
        

            <label for="nom">Nom</label>
			<input type="text" name="nom" id="nom">
	
			<label for="prenom ">Prénom</label>
			<input type="text" name="prenom" id="prenom">
	
			<label for="telephone">Téléphone</label>
			<input type="text" name="telephone" id="telephone">
	
            <label for="email">Email</label>
			<input type="text" name="email" id="email">
	
		<button type="submit">Envoyer</button>

        <?php 
        echo $message;
        echo '<h2>Le prix sera de ' . prixLoc($_POST['categorie_voiture'], ($_POST['duree_location'])) . '€ pour ' . ($_POST['duree_location']) . 'jours de location</h2>'; 
        ?>

    </body>
</html>
