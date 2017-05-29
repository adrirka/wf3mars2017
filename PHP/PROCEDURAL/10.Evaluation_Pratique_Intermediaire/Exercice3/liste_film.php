<?php

$contenu = ''; // variable d'affichage du contenu

// Connection à la BDD

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$query = $pdo->query('SELECT id_film, title, director, year_of_prod FROM movies');

$contenu .= '<h1>Liste des films</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Réalisateur</th>
                        <th>Année de production</th>
						<th>Plus d\'infos</th>
					</tr>';

while ($film = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $film['title'] .'</td>
						<td>'. $film['director'] .'</td>
						<td>'. $film['year_of_prod'] .'</td>
						<td>
							<a href="details_film.php?id_film='. $film['id_film'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';

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