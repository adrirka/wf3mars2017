<?php 

class Animal
{
    protected function deplacement(){
        return 'je me déplace';
    }

    public function manger(){
        return 'je mange';
    }

}

// --------------------------

class Elephant extends Animal
{
    // tout le code de Animal est ici !

    public function quiSuisJe(){
        return 'Je suis un elephant et ' $this -> deplacement(); 
        //je peux appeler la méthode déplacement() avec $this car en tant que méthode protected elle est accessible dans la classe où elle est déclarée et dans les classes héritières
    }
}

// --------------------------

class Chat extends Animal
{
    // tout le code de Animal est ici !
    public function quiSuisJe(){
        return 'Je suis un chat';
    }

    public function manger(){ // redéfinition de méthode seulement pour la classe Chat
        return 'Je mange peu !';
    }
}

// --------------------------
$eleph = new Elephant;
echo $eleph -> manger() . '<br>';
echo $eleph -> quiSuisJe() . '<br>';

$chat = new Chat;
echo $chat -> manger() . '<br>';
echo $chat -> quiSuisJe() . '<br>';


/*
Commentaires : 
    
    L'héritage est l'un des fondements de la programmation orientée objet.
    Lorsqu'une classe classe hérite d'une autre classe, comme si tout le code était importé. Les éléments (non private) sont donc accessbiel avec $this

    Redéfinition : une classe enfant (héritière) peut modifier le comportement global d'une méthode héritée
    Surcharge : une classe enfant (héritière) peut modifiier en partie le comportement d'une méthode héritée (voir chap 6, fichier surcharge.php)

    L'interprêteur va d'abord regarder si une méthode existe dans la classe qui l'exécute et s'il ne la trouve pas, il va ensuite regarder dans la classe mère

*/ 
