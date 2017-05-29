<?php
// Exercice : créer le formulaire indiqué au tableau, récupérer les données saisies et les afficher dans la même page.

print_r($_POST);

if(!empty ($_POST)){ 
    echo 'ville : ' . $_POST['ville'] . '<br>';
    echo 'code postal : ' . $_POST['codepostal'] . '<br>';
    echo 'adresse : ' . $_POST['adresse'] . '<br>';
}

?>

<h1>Formulaire2</h1>
<form method="post" action="">
    
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville"><br>
    
    <label for="codepostal">Code postal</label>
    <input type="text" id="codepostal" name="codepostal"><br>

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse"><br>

    <input type="submit" name="validation" value="Valider">
</form>