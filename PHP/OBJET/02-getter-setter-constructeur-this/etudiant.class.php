<?php

class Etudiant

{
    private $prenom
    
    public function__construct(){ //methode "magique" qui s'exécute au moment de l'instanciation

    }

    public function setPrenom($prenom){
        $this -> prenom = $prenom;
    }
        

    public function getPrenom(){
        return $this -> prenom;
    }

}

// -------------------------------
$etudiant = new Etudiant('adrien')
echo 'Prenom : ' .$etudiant -> getPrenom();
// EXERCICE : essayez d'affecter une valeur à un prénom en modifiant UNIQUEMENT l'intérieur de la classe
