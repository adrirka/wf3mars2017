<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 
    <div class="container">  <!-- class boostsrap qui permet de centrer le contenu -->
    <h1>Employés</h1>
    <div id="tableau_employes"></div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        // mise en place d'un timer
        setInterval("ajax()", 2000);
        // 2 arguments => la fonction à exéécuter, le timer en millisecondes

        function ajax(){
            var file = 'ajax.php';
            var xhttp = new XMLHttpRequest();

            xhttp.open('POST', file, true);
            xhttp.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
            // La methode setRequestHeader() définit la valeur d'un header http
            // Vous devrez appeler cette méthode entre la méthode open() et send()
            // Lors d'une requête HTTP, son état va varier, et nous pouvons récupérer chaque changement de cet état, avec l'événement onreadystatechange .

            xhttp.onreadystatechange = function(){
                console.log(xhttp.readyState);
                
                if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText) // propriété ajax qui permet de vérifier si le fichier cible contient une erreur
                    var obj = JSON.parse(xhttp.responseText);
                    document.getElementById('tableau_employes').innerHTML = obj.resultat 
                }
            }
            xhttp.send();
        }

    </script>
  </body>
</html>