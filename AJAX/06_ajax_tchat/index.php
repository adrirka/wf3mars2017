<?php

require_once("inc/init.inc.php");

var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <fieldset class="cadre_accueil">  
            <div id="message"></div>
        </fieldset>
        <fieldset class="cadre_accueil">
            <form id="form" action="">
                
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" value=""><br>

                <label for="civilite">Civilité</label>
                <select name="civilite" id="civilite">
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select><br>

                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value=""><br>

                <label for="date_de_naissance">Date de naissance</label>
                <input type="date" id="date_de_naissance" name="date_de_naissance" value="" placeholder="YYYY-MM-DD"><br>

                <input type="submit" name="connexion" value="Se connecter">
            </form>
        </fieldset>

    <script>    
        // mise en place d'un événement sur la validation du formulaire

        document.getElementById( 'form' ).addEventListener( 'submit', function(event){ // on ajoute un écouteur d'événement addEventListener (ici le submit du form)
            event.preventDefault(); // on bloque la soumission du form pour éviter le rechargement de page 

            // on récupère la valeur du champs pseudo 
            var champPseudo = document.getElementById( 'pseudo' );
            var pseudo = champPseudo.value;

            // on récupère la valeur du champs civilite
            var champCivilite = document.getElementById( 'civilite' );
            var civilite  = champCivilite.value;

            // on récupère la valeur du champs ville
            var champVille = document.getElementById( 'ville' );
            var ville  = champVille.value;

            // on récupère la valeur du champs date_de_naissance
            var champDate = document.getElementById( 'date_de_naissance' );
            var date_de_naissance  = champDate.value;

            var parametres = "mode=connexion&pseudo=" + pseudo + "&civilite=" + civilite + "&ville=" + ville + "&date_de_naissance=" + date_de_naissance;

            var file = "ajax_connexion.php";

            if(window.XMLHttpRequest){
                var xhttp = new XMLHttpRequest();
            }else{
                var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE < V7
            }

            xhttp.open('POST', file, true);

             xhttp.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
            // Lors d'une requête HTTP, son état va varier, et nous pouvons récupérer chaque changement de cet état, avec l'événement onreadystatechange .

            xhttp.onreadystatechange = function(){
                if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText);
                    var obj = JSON.parse(xhttp.responseText);
                    document.getElementById( 'message' ).innerHTML = obj.resultat;

                    if(obj.pseudo == 'disponible'){

                        // si l'indice pseudo a la valeur disponible alors on peut connecter l'utilisateur .
                        // on le redirige donc vers dialogue.php
                        window.location.href = 'dialogue.php'; // window est un objet JS pour définir le navigateur auquel on applique un event .location.href pour la redirection 
                    }
                }
            }

            xhttp.send(parametres);

        } ); // fin du submit

    </script>

    </body>
</html>