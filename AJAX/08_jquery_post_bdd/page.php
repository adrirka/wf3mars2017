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
                margin: auto;
                text-align: center;
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

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        
        <script>
            $(document).ready(function(){
                // lorsque le document est prêt (chargé)
                $('#mon_form').on('submit', function(event){
         
                    event.preventDefault();

                    var parametre = 'personne=' + $( '#choix' ).val();

                    var valeur = $( '#choix' ).val();

                    $.post( 'ajax.php', parametre, function(response){
                        $('#resultat').html(response.resultat);
                    }, 'json' ); 
                });
            });
        </script>

    </body>
</html>