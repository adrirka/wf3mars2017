<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/




// ------------------------------------ TRAITEMENT -----------------------------------------

$type = array('gastronomique', 'brasserie', 'pizzeria', 'autre');

$message = ''; // variable d'affichage des messages (erreur / succès)

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


if(!empty($_POST)){

//var_dump($_POST);

    // Contrôle du formulaire 

    if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100){
        $message .= '<p>Le nom doit comporter au minimum 2 caractères</p>';
    }

    if(strlen($_POST['adresse']) < 0 || strlen($_POST['adresse']) > 255 ){
        $message .= '<p>Le prénom doit comporter au minimum 2 caractères</p>';
    }

    if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
        $message .= '<p>Le téléphone est incorrect</p>';
    }

	if(!in_array($_POST['type'], $type)){
		$message .= '<p>La catégorie choisie n\'est pas valide</p>';
	}

	if($_POST['note'] < 0 || $_POST['note'] > 5){
		$message .= '<p>La note choisie n\'est pas valide</p>';
	}

	if(empty($_POST['avis'])){
		$message .= '<p>Avis : Champs obligatoire</p>';
	}

	if(empty($message)) {

		//Pour éviter les injections SQL
		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		//requête préparée 

		$query = $pdo->prepare('INSERT INTO restaurant (nom, adresse, telephone, type, note, avis) VALUES(:nom, :adresse, :telephone, :type, :note, :avis)');
		$query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$query->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		$query->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
		$query->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
		$query->bindParam(':note', $_POST['note'], PDO::PARAM_INT);
		$query->bindParam(':avis', $_POST['avis'], PDO::PARAM_STR);

		$succes = $query->execute();

		
		// message final
		if ($succes) {
			$message .= '<h2>Le restaurant a été enregistré avec succés</h2>';
		}
		
	}else {
			$message .= '<h2>Erreur lors de l\'enregistrement</h2>';
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
        <title>Ajout restaurant</title>
    
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

           textarea{
			   min-height:50px;
		   }

        </style>
    
    </head>
    <body>

	  <h1>Ajout Restaurant</h1>

      <form method="post" action="">

			<?php 
			echo $message;
			?>

			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom">

			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" id="adresse">

			<label for="telephone">Téléphone</label>
			<input type="text" name="telephone" id="telephone">

			<label for="type">Type de restaurant</label>
				<select name="type" id="type">
						<?php 
						foreach($type as $key => $value){
							echo "<option value=$value>$value</option>";
						} 
						?>	
				</select>	
			
			<label for="note">Note</label>
				<select name="note" id="note">
					<?php 
						for($note=0; $note<=5; $note++){
							echo "<option value=$note>$note</option>";
						}
					?>
				</select>
			
			<label for="avis">Avis</label>
			<textarea name="avis" id="avis"></textarea>

			<button type="submit">Envoyer</button>

		</form>
    </body>
</html>
