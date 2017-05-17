<?php
if(!empty ($_POST)){ // = si le formulaire est soumis , il y a les indices correspondants aux names.
        if(empty ($_POST['pseudo'])){
            echo 'Champs obligatoire' . '<br>';
        }else{
            echo 'pseudo : ' . $_POST['pseudo'] . '<br>';
        }
    echo 'email : ' . $_POST['email'] . '<br>';
}
?>