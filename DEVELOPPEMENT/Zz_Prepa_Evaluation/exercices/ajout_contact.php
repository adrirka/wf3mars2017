<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	3- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

// -------------------------------------- TRAITEMENT -----------------------------------------------


// 3 - connection à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// 4 - verification des champs du form

$message = '';

//echo '<pre>';  print_r($_POST); echo '</pre>';

if(!empty($_POST)){

	if(strlen($_POST['nom']) < 2){
		$message .= 'Le nom doit comporter au minimum 2 caractères' . '<br>';
	}
		
	if(strlen($_POST['prenom']) < 2){
		$message .= 'Le prenom doit comporter au minimum 2 caractères' . '<br>';
	}

	if (!is_numeric($_POST['telephone']) || $_POST['telephone'] <= 10){
		$message .= 'Le numéro est incorrect' . '<br>';
	}
		
	if(checkdate(1, 1, $_POST['annee']) < 1917 && checkdate(1, 1, $_POST['annee']) > 2017){
		$message .= 'Veuillez sélectionner une date valide' . '<br>';
	}

	if(empty($message)){


		// 5 -requete BDD
		$resultat = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES(:nom, :prenom, :telephone, :annee, :email, :contact)");

		$resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR); 
		$resultat->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
		$resultat->bindParam(':annee', $_POST['annee'], PDO::PARAM_STR);
		$resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$resultat->bindParam(':contact', $_POST['contact'], PDO::PARAM_STR);


		// 6 - execution de la requete execute()

			$req = $resultat->execute();

			// 7 - Afficher un message pour signifier ou non l'ajout du contact à la BDD
			if($req){ 
				echo 'L\'employé a bien été ajouté';
			}
	}else{
		echo 'Une erreur est survenue lors de l\'enregistrement';
	}
}





// -------------------------------------- AFFICHAGE -----------------------------------------------

?>


<!-- 2 - Creation du formulaire -->

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Formulaire</title>

		<style>
			input, label{
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
		</style>

	</head>

	<body>
		
		<h1>Formulaire : ajout de contact</h1>
		
		<form method="post" action="">

			<p><?php echo  $message ?></p>
			
			<label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">

			<label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom">

			<label for="telephone">Telephone</label>
                <input type="number_format" name="telephone" id="telephone">
            
			<label for="annee">Annee de rencontre</label>
				<select name="annee" id="annee">
					<?php
						$annee = date('Y');
							while($annee >= (date('Y') -100)){
								echo "<option>$annee</option>"; 
								$annee--;
    						}
						echo '<br>';
				
					?>
				</select>

			 <label for="email">Email</label>
    			<input type="text" id="email" name="email" value="">
			
			<label for="contact">Type de contact</label>
				<select name="contact" id="contact">
					<option value="ami">Ami</option>
					<option value="Famille">Famille</option>
					<option value="Professionnel">Professionnel</option>
					<option value="Autre">Autre</option>
				</select>
			
			<input type="submit" value="Ajouter">
		</form>

	</body>
</html>


	






