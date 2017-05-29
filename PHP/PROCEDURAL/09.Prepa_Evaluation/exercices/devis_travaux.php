<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/



// ------------------------------------------ TRAITEMENT ------------------------------------------

$message = ''; // affichage du message d'erreur 
$resultat = ''; // affichage des résultats 
$montantHT = $_POST['montant'];
$dateConstruction = $_POST['date'];


// Fonction de calcul
function montantTTC($montantHT, $dateConstruction){
	switch($dateConstruction) {
		case 'moins' : $TVA = (1+20/100); break;
		case 'plus' : $TVA = (1+10/100); break;
		default : return 'Il y a un problème sur le montant';
	}

$montantTTC = $montantHT * $TVA;
	
	return 'Le montant TTC de vos travaux sera de ' . $montantTTC . '€ avec une TVA de ' . ($TVA -1)*100 . '%';
	
}


//var_dump($_POST);

//On contrôle le formulaire

if(!empty($_POST)){
	

	if(!is_numeric($_POST['montant']) && !ctype_digit($_POST['montant']) && $_POST['montant'] <= 0){
		$message .= '<div>Le montant doit être supérieur à 0</div>'; 
	} 
	 
	 
	if($_POST['date'] != "plus" && $_POST['date'] != "moins"){
		$message .= '<div>Il faut cocher l\'un des bouton radio</div>';
	}

	// Puis on vérifie s'il n'y a pas de messages d'erreur :
	if (empty($message)) {

		// On appelle la fonction 
		$resultat = montantTTC($montantHT, $dateConstruction);	

	}

}



// ------------------------------------------ AFFICHAGE -------------------------------------------
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Devis travaux</title>

		
	</head>
	<body>
		
		<h1>Devis Travaux</h1>

		<?php 
			echo '<h2>' . $resultat . '</h2>';
		?>

		<form method="post" action="">

			<div class="input-group">
				<label for="montant">Montant des travaux</label>
				<input type="text" name="montant" id="montant">
			</div>

			<div class="input-group">
				<input type="radio" name="date" id="date" value="plus" checked><label for="date">Plus de 5ans</label>
				<input type="radio" name="date" id="date" value="moins"><label for="date">Moins de 5ans</label>
			</div>

			<button type="submit">Calculer</button>

		</form>

		<?php 
			echo $message;
		?>

	</body>
</html>