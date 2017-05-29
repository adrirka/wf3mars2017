<?php 

/*

Vous travaillez pour un cinéma et devez créer une base de données de film. Votre base de données s’appellera « exercice_3 ». Vous devrez ensuite créer un script qui permettra d’ajouter et d’afficher des films. Suivez les étapes. 
 
Étape 1 : 
 
Cette table, nommée “movies” sera composée des champs suivants : 
 ● title ​(varchar)​ : le nom du film ● actors ​(varchar)​ : les noms d’acteurs ● director ​(varchar)​ : le nom du réalisateur ● producer ​(varchar)​ : le nom du producteur ● year_of_prod ​(year)​ : l’année de production ● language ​(varchar)​ : la langue du film ● category ​(enum)​ : la catégorie du film ● storyline ​(text)​ : le synopsis du film ● video ​(varchar) ​: le lien de la bande annonce du film 
 N’oubliez pas de créer un ID pour chaque film et de l’auto-incrémenter. 
 
 
Étape 2 : 
 
Créer un formulaire permettant d’ajouter un film et effectuer les vérifications nécessaires. 
 
Prérequis : ● Les champs “titre, nom du réalisateur, acteurs, producteur et synopsis” comporteront au minimum 5 caractères. ● Les champs : année de production, langue, category, seront obligatoirement un menu déroulant ● Le lien de la bande annonce sera obligatoirement une URL valide ● En cas d’erreurs de saisie, des messages d’erreurs seront affichés en rouge 
 
 
Chaque film sera ajouté à la base de données créée. Un message de réussite confirmera l’ajout du film. 

 
 
 
Évaluation pratique PHP Temps imparti : 4h00 
 
Étape 3 : 
 
Créer une page listant dans un tableau HTML les films présents dans la base de données.  Ce tableau ne contiendra, par film, que le nom du film, le réalisateur et l’année de production. 
 Une colonne de ce tableau contiendra un lien ​« plus d’infos »
​  permettant de voir la fiche d’un film dans le détail. 
 
 
Étape 4 : 
 
Créer une page affichant le détail d’un film de manière dynamique. Si le film n’existe pas, une erreur sera affichée. 

*/ 


// ------------------------------------------ TRAITEMENT ------------------------------------------

// définition de mes array pour les listes déroulantes

$language = array('FR', 'EN', 'ES', 'IT', 'DE', 'PT');
$category = array('action', 'science-fiction', 'horreur', 'policier', 'autre');

$message = ''; // variable d'affichage des messages (erreur / succès)

// Connection à la BDD

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// On contrôle que le formulaire est bien rempli et rempli les conditions 

if(!empty($_POST)){

     if(strlen($_POST['title']) < 5 || strlen($_POST['title']) > 20){
        $message .= '<p>Le nom du film doit comporter au minimum 5 caractères</p>';
    }

    if(strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 100){
        $message .= '<p>Les noms des acteurs doivent comporter au minimum 5 caractères</p>';
    }

    if(strlen($_POST['director']) < 5 || strlen($_POST['director']) > 20){
        $message .= '<p>Le nom du réalisateur doit comporter au minimum 5 caractères</p>';
    }

    if(strlen($_POST['producer']) < 5 || strlen($_POST['producer']) > 20){
        $message .= '<p>Le nom du producteur doit comporter au minimum 5 caractères</p>';
    }

    if($_POST['year_of_prod'] <= 1956 || $_POST['year_of_prod'] >= 2018){
		$message .= '<p>L\'année sélectionnée n\'est pas valide</p>';
    }

    if(!in_array($_POST['language'], $language)){
		$message .= '<p>La langue sélectionnée n\'est pas valide</p>';
	}

    if(!in_array($_POST['category'], $category)){
		$message .= '<p>La catégorie sélectionnée n\'est pas valide</p>';
	}

    if(strlen($_POST['storyline']) < 5 || strlen($_POST['storyline']) > 255){
        $message .= '<p>Le synopsis doit comporter au minimum 5 caractères et ne peut excéder 255 caractères</p>';
    }

    if(!filter_var($_POST['video'], FILTER_VALIDATE_URL)){
        $message .= '<p>L\'URL n\'est pas valide</p>';
    }


    // Si aucun message d'erreur n'est détecté alors on poursuit le script pour injecter les données en base
    if(empty($message)){

        // pour éviter l'échappememnt des données et se prémunir des injections SQL on déclare une boucle afin d'exclure les caractères spéciaux
        foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

        // On initialise une requête préparée avec des marqueurs 

		$query = $pdo->prepare('INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');


		// On caste l'ensemble des valeurs en String pour éviter toute erreur en base

        $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
		$query->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
		$query->bindParam(':director', $_POST['actors'], PDO::PARAM_STR);        
		$query->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
		$query->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_STR);
		$query->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
		$query->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
		$query->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
		$query->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

        // On exécute la requête

        $succes = $query->execute();


        // On vérifie la condition de succès pour afficher un message de confirmation

		if ($succes){
			$message .= '<p>L\'ensemble des caractéristiques du film ont été enregistrés avec succès</p>';
		} 
		
	}else {
			$message .= '<p>Erreur lors de l\'enregistrement</p>';	

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
        <title>Base de donnée Movies</title>

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

        <h1>Base de donnée Movies</h1>

        <p><?php echo $message ?></p>

        <form method="post" action="">

            <div class="input-group">
                <label for="title">Nom du film</label>
                <input type="text" name="title" id="title">
		    </div>

            <div class="input-group">
                <label for="actors">Nom des acteurs</label>
                <input type="text" name="actors" id="actors">
            </div>

            <div class="input-group">
                <label for="director">Nom du réalisateur</label>
                <input type="text" name="director" id="director">
            </div>

            <div class="input-group">
                <label for="producer">Nom du producteur</label>
                <input type="text" name="producer" id="producer">
            </div>

            <div class="input-group">
                <label for="year_of_prod">Année de production</label>
        
                <select name="year_of_prod" id="year_of_prod">
                    <?php 
                    for($i=date('Y'); $i>=date('Y')-60; $i--) {
                        echo "<option value=$i>$i</option>";
                    } 
                    ?>
                    
                </select>
            </div>

            <div class="input-group">
                <label for="language">Langue du film</label>
        
                <select name="language" id="language">
                    <?php 
                    foreach($language as $key => $value){
                        echo "<option value=$value>$value</option>";
                    } 
                    ?>
                </select>
            </div>

            <div class="input-group">
                <label for="category">Categorie</label>
        
                <select name="category" id="category">
                    <?php 
                    foreach($category as $key => $value){
                        echo "<option value=$value>$value</option>";
                    } 
                    ?>
                </select>
            </div>

            <div class="input-group">
                <label for="storyline">Synopsis</label>
                <textarea name="storyline" id="storyline"></textarea>
            </div>

            <div class="input-group">
                <label for="video">Lien de la bande annonce (sous la forme 'http://www.adresse.com')</label>
                <input type="text" name="video" id="video">
		    </div>

            <button type="submit">Ajouter à la base</button>

        </form>
        
    </body>
</html>
