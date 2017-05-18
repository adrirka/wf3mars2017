<?php
    require_once('inc/init.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="conteneur">
            <h2 id="moi">Bonjour <?php echo $_SESSION['pseudo']; ?></h2>
            <div id="message_tchat"></div>
            <div id="liste_membre_connecte"></div>
            <div class="clear"></div>
            <div id="smiley">
                <img src="smil/smiley1.gif" alt="smiley1">
                <img src="smil/smiley2.gif" alt="smiley2">
            </div>

            <!-- formulaire -->
            <div id="formulaire_tchat">
                <form id="form">
                    <textarea name="message" id="message" row="5" maxlength="300" value=""></textarea>
                    <input type="submit" name="envoi" value="envoi" class="submit">
                </form> 
            </div>
            <div id="postMessage"></div>  
        </div>

        <script>    
            
            // faire en sorte que si l'utilisateur appuie sur la touche "entrée" cela enregistre le messazge
            // code de la touche "entrée" => 13
                document.addEventListener( 'keypress', function(event){
                    if( event.keyCode == 13 ){ // =>touche entrée
                    
                    event.preventDefault();
                    var messageValeur = document.getElementById( 'message' ).value;
                    ajax( 'postMessage', messageValeur );
                    ajax( 'message_tchat' );
                    document.getElementById( 'message' ).value = '';
                    }

                } );

            // ajout de :smiley: dans le message lors du clic sur le smiley
            document.getElementById("smiley").addEventListener("click", function(event) {
                /*
                document.getElementById("message").value = document.getElementById("message").value + event.target.alt;
                document.getElementById("message").focus(); // focus permet de remettre le curseur
                */

                document.getElementById("message").value = document.getElementById("message").value + ' <img src="'+event.target.src+'" :> ';
                document.getElementById("message").focus(); // focus permet de remettre le curseur

                console.log(event);
            });

            // pour récupérer la liste des membres connectés
            setInterval("ajax(liste_membre_connecte)", 11000);

            //Enregistrement du message via le bouton submit
            document.getElementById( 'form' ).addEventListener( 'submit', function(e){
                e.preventDefault(); // on bloque le rechargement de la page lors de la soumission 
           

            // pour récuper l'information du message 
            // ajax( 'postMessage', message.value );
            var messageValeur = document.getElementById( 'message' ).value;

            // on envoi notre ajax
            ajax( 'postMessage', messageValeur );

            ajax( 'message_tchat' );

            // on vide le champs
            document.getElementById( 'message' ).value = '';
            } );


            // FERMETURE DE LA PAGE PAR L'UTILISATEUR
            // on le retire du fichier prenom.txt

            window.onbeforeunload = function(){
                ajax('liste_membre_connecte', '<?php echo $_SESSION['pseudo']; ?>');
            }


            // déclaration de la fonction ajax
            function ajax(mode, arg = ''){
                if(typeof(mode) == 'object'){
                    mode = mode.id;
                    // l'argument mode recevra les ids des différents éléments de notre page. Sacahnt que l'on peut sélectionner des éléments html directement par leur id (sans getElementBy...) il y a un risque de récupérer un objet représentant l'élément html. Dans ce cas il y a un risque de récupérer un objet représentant l'élément html. Dans ce cas nous récupérons juste l'id de l'élément (mode = mode.id)
                }
            console.log('mode actuel :' + mode); // nous affichons la tâche en cours dans la console

            var file = "ajax_dialogue.php";
            var parametres = "mode=" + mode + "&arg=" + arg;

            var file = "ajax_dialogue.php";

            if(window.XMLHttpRequest){
                var xhttp = new XMLHttpRequest();
            }else{
                var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE < V7
            }

            xhttp.open('POST', file, true);

             xhttp.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
            


            xhttp.onreadystatechange = function(){
                if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText);
                    var obj = JSON.parse(xhttp.responseText);
                    document.getElementById(mode).innerHTML = obj.resultat;

                    var boiteMessage = document.getElementById( 'message_tchat' );
                    document.getElementById(mode).scrollTop = boiteMessage.scrollHeight
                    // permet de descendre l'ascenceur de ce div et de voir les derniers messages
                }
            }

            xhttp.send(parametres);
            
         
        }
        </script>
    </body>
</html>