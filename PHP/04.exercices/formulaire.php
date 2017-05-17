<?php 

//Exercice 

/*
    -Realiser un formulaire permettant de sélectionner un fruit dans un sélecteur , et de saisir un poids quelquonque exprimé en gramme
    -Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué en passant par la fonction calcul 
    -Faire en sorte de garder le fruit 
*/


// Question 2

include('fonctions.inc.php');

if(!empty($_POST)){
    echo calcul($_POST['fruit'], $_POST['poids']) . '<hr>';
}


?>


<!--Question 1 et 3 -->
<form method="post" action="">

    <select name="fruit" id="fruit">
        <option value="pommes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') echo 'selected'; ?> >Pommes</option>
        <option value="peches" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'peches') echo 'selected'; ?> >Peches</option>
        <option value="bananes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'bananes') echo 'selected'; ?> >Bananes</option>
        <option value="cerises"<?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'cerises') echo 'selected'; ?> >Cerises</option>
    </select>

    <input type="text" name="poids" placeholder="poids en grammes" value="<?php echo $_POST['poids'] ?? ''; ?>">
    <input type="submit" value="calculer">


</form>


