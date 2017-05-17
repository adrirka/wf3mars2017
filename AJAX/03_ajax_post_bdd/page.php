<?php
    // connexion à la BDD
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // on récupère la donnée demandée via une requête SQL 
    $liste_prenom = $pdo->query('SELECT prenom, id_employes FROM employes');
    $liste = '';
    while($personne = $liste_prenom->fetch(PDO::FETCH_ASSOC)){
        $liste .= '<option value="' . $personne['id_employes'] . '">' . $personne['prenom'] . '</option>';
    }
?>
<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        
        <style> 
            *{
                font-family: sans-serif;
                text-align: center;
            }

            form{
                width: 50%;
                margin : 0 auto;
            }

            select, input{
                padding: 5px;
                width: 100%;
                border-radius:! 3px;
                border: 1px solid;
            }

            input{
                cursor: pointer;
            }

            table{
                border-collapse: collapse;
                width: 1px;
                mzrgin: auto;
            } 

            td{
                padding: 10px;
            }   


        </style>

    </head>
    <body>
        <form method="post" id="mon_form" action="">
            <label for="prenom">Prénom</label>
                <select id="choix">
                    <?php
                        // Récupérer tous les prénoms présents dans la BDD entreprise sur la table employes et mettre l'id_employes dans la value
                        echo $liste;
                    ?>
                </select>
                <br>
                <input type="submit" id="valider" value="valider">
        </form>
        <hr>
        <div id="resultat"></div>

        <script>    
            // Mettre en place un événement sur la validation du formulaire (submit)
            // Bloquer le rechargement de page consécutif à la validation du formulaire
            // et déclencher une requête ajax qui envoie sur ajax.php
            // sur ajax.php récupérer les informations de l'employés correspondant à l'id récupéré
            // et envoyer une réponse sous forme de tableau html. Le tableau doit avoir deuxlignes, une avec le nom des colonnes et l'autre avec les valeurs

            var formulaire = document.getElementById( 'mon_form' ).addEventListener( 'submit', ajax );

            function ajax(event){
                event.preventDefault();
                var champSelect = document.getElementById( 'choix' );
                var valeur = champSelect.value;
                // console.log(valeur);

                var file = "ajax.php"; //notre page cible

                var parametres = "personne=" + valeur;

                var xhttp = new XMLHttpRequest();

                xhttp.open('POST', file, true); // préparation
                xhttp.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
                // La methode setRequestHeader() définit la valeur d'un header http
                // Vous devrez appeler cette méthode entre la méthode open() et send()

                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(xhttp.responseText);
                        var reponse = JSON.parse(xhttp.responseText);
                        // La méthode parse de l'objet JSON permet d'évaluer la réponse et d'en faire un objet.
                        document.getElementById( 'resultat' ).innerHTML = reponse.resultat;
                    }
                }
                xhttp.send(parametres); // envoie

            }
        </script>

    </body>
</html>