<?php

/*

Créer une fonction permettant de convertir un montant en euros vers un montant en dollars américains. 
 
Cette fonction prendra deux paramètres :  ● Le montant de type int ou float ● La devise de sortie (uniquement EUR ou USD).  
 
Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :  1 euro = 1.085965 dollars américains 
 
Il faut effectuer les vérifications nécessaires afin de valider les paramètres. 

*/ 

//définition de mes variables globales

$contenu = ''; //variable d'affichage du contenu
$resultat = ''; // variable resultat 



//defintion de la fonction 

function conversion($montant, $devise){
    switch($devise){
        case 'eur' : $conversion = 1.085965; break;
		case 'usd' : $conversion = 0.920839; break;
		default : return 'Il y a un problème sur la devise';
    }

$resultat = $montant * $conversion;

    if($devise == 'eur'){
        return 'Le montant ' . $montant . 'EUR correspond à ' . $resultat . 'USD';
    }elseif($devise == 'usd'){
        return 'Le montant ' . $montant . 'USD correspond à ' . $resultat . 'EUR';
    }else{
        return 'Impossible d\'effectuer la conversion';
    }

}

//On contrôle le formulaire

if(!empty($_POST)){
	

	if(!is_numeric($_POST['montant']) && !ctype_digit($_POST['montant']) && $_POST['montant'] <= 0){
		$contenu .= '<div>Le montant doit être un chiffre supérieur à 0</div>'; 
	} 
	 
	if($_POST['devise'] != "eur" && $_POST['devise'] != "usd"){
		$contenu .= '<div>Il faut cocher l\'un des champs devise</div>';
	}

	// Puis on vérifie s'il n'y a pas de messages d'erreur :
	if (empty($contenu)) {

		// On appelle la fonction avec des variables
		$resultat = conversion($_POST['montant'], $_POST['devise']);	

	}

}

	
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Conversion EUR-USD</title>
    </head>
    <body>
        <h1>Calculatrice de conversion</h1>
        
        <p><?php echo $contenu ?></p>

        <form method="post" action="">

            <div class="input-group">
				<label for="montant">Montant à convertir</label>
				<input type="text" name="montant" id="montant">
			</div>

			<div class="input-group">
				<input type="radio" name="devise" id="devise" value="eur" checked><label for="devise">EURO</label>
				<input type="radio" name="devise" id="devise" value="usd"><label for="devise">US DOLLARS</label>
			</div>

			<button type="submit">Convertir</button>

        </form>

        <h2><?php echo $resultat ?></h2>

    </body>
</html>



