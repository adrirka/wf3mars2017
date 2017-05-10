<?php

$contenu = ''; // variable d'affichage du contenu

// Connection à la BDD

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


if(isset($_GET['id_film'])){
	
	$query = $pdo->prepare('SELECT * FROM movies WHERE id_film = :id_film');
	$query->bindParam(':id_film', $_GET['id_film'], PDO::PARAM_INT);
	$query->execute();
	
	
	$film = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détail d\'un film</h1>';
	if (!empty($film)) {
		$contenu .= '<p><b>Titre : </b>'. $film['title'] .'</p>';
		$contenu .= '<p><b>Acteurs : </b>'. $film['actors'] .'</p>';
		$contenu .= '<p><b>Producteur : </b>'. $film['producer'] .'</p>';
        $contenu .= '<p><b>Langue : </b>'. $film['language'] .'</p>';		
        $contenu .= '<p><b>Catégorie : </b>'. $film['category'] .'</p>';
		$contenu .= '<p><b>Synopsis : </b>'. $film['storyline'] .'</p>';
		$contenu .= '<p><b>Lien bande annonce :</b> <a href="'. $film['video'] .'">Lien</a></p>';


	} else {
		$contenu .= '<p>Ce film n\'existe pas en base</p>';
	}

}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des films</title>
    </head>
    <body>
        <?php echo $contenu; ?>
    </body>
</html>
