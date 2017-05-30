<?php

class Membre 
{
    public $id_membre;
    public $pseudo;
    public $email; 

    public function inscription(){
        return 'je m\'inscris!';

    }

    public function connexion(){
        return 'je me connecte !';
    }

}
//------------------------

class Admin extends Membre // extends signifie "hérité de"
{
    // tout le code de Membre est ici !!!

    public function accesBackOffice(){
        return 'J\'ai accès au backoffice';
    }

}
//------------------------

$admin = new Admin
echo $admin -> inscription() . '<br>';
echo $admin -> connexion() . '<br>';
echo $admin -> accesBackOffice() . '<br>';


/*
Commentaires : 
    
    Dans notre site, un Admin est avant tout un membre, avec quelques fonctionnalités supplémentaires (accès backOffice, suppresion de membre, etc ...)
    Il est donc naturel que la classe Admin soit héritière (extends) de la classe Membre et qu'on ne ré-écrive pas tout le code ...

*/ 

