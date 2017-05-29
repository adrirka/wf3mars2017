<?php
/* 
    1- afficher dans une table HTML la liste des restaurants avec les champs nom et téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact

    2- afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autre info"
*/ 

$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



$query = $pdo->query('SELECT id_restaurant, nom, telephone FROM restaurant');
$contenu .= '<h1>Liste des restaurants</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Téléphone</th>
						<th>Autres infos</th>
					</tr>';

while ($contacts = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>' . $contacts['nom'] .'</td>
						<td>' . $contacts['telephone'] . '</td>
                        <td><a href="?id_restaurant='. $contacts['id_restaurant'] .'">Autre infos</a>
					</tr>';
}

        $contenu .= '</table>';


			
			


if(isset($_GET['id_restaurant'])){
	
	$query = $pdo->prepare('SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant');
	$query->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT);
	$query->execute();
	$contact = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détail d\'un restaurant</h1>';
	if (!empty($contact)) {
		$contenu .= '<p>Adresse : '. $contact['adresse'] .'</p>';
		$contenu .= '<p>Type : '. $contact['type'] .'</p>';
        $contenu .= '<p>Note : '. $contact['note'] .'</p>';
        $contenu .= '<p>Avis : '. $contact['avis'] .'</p>';
		
	} else {
		$contenu .= '<div>Ce contact n\'existe pas</div>';
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des contacts</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>


