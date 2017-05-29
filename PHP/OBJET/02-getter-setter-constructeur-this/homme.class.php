<?php 

class Homme
{
    private $prenom; // propriété private
    private $nom; // propriété private
    
    public function setPrenom ($arg){
        if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20) {
            $this -> prenom = $arg;
        }
    }

    public function getPrenom(){
        return $this -> prenom;
    }

    public function setNom ($arg){
        if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20) {
            $this -> nom = $arg;
        }
    }

    public function getNom(){
        return $this -> nom;
    }
}


// -------------------------
$homme = new Homme;
// $homme -> prenom = 'Adrien'; // ERREUR : propriété private donc innaccessible à l'extérieur de la classe
// echo $homme -> prenom;

$homme -> setPrenom('adrien');
echo 'Prénom : ' . $homme -> getPrenom(); 

$homme -> setNom('rka');
echo 'Nom : ' . $homme -> getNom(); 

/*
Commentaires:

    Pourquoi faire des getters et des setters ?
        -Le PHP est un langage qui ne type pas ses variables. Il faut systématiquement controler l'intégrité des données renseignées.
        -Donc utiliser la visibilité PRIVATE est une très bonne contrainte. Tout dev' devra OBLIGATOIREMENT passer par le setter pour affecter une valeur, et donc par les contrôles !

    Setter : affecter une valeur
    Getter : récupérer une valeur

*/


