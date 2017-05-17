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
            <h2 id="moi">Bonjour<?php echo $_SESSION['pseudo']; ?></h2>
            <div id="message_tchat"></div>
            <div id="liste_membre_connecte"></div>
            <div class="clear"></div>
            <div id="smiley">
                <img src="smil/smiley1.gif" alt=":)">
            </div>

            <!-- formulaire -->
            <div id="formulaire_tchat">
                <form id="form">
                    <textarea name="message" id="message" row="5" maxlength="300"></textarea>
                    <input type="submit" name="envoi" value="envoi" class="submit">
                </form> 
            </div>
            <div id="postMessage"></div>  
        </div>
    </body>
</html>