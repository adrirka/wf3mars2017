<?php 

// Design pattern : littéralement "patron de conception", est une réponse donnée à un problème que rencontre plusieurs (tout) développeurs

// Le singleton est la réponse à la question : comment créer une classe qui ne sera instanciable qu'une seule et unique fois 

class Singleton 
{
    private static $instance = NULL;

    private function__construct(){} // fonction private donc notre classe n'est plus instanciable
    
    private function__clone(){} // fonction private donc la classe n'est pas clonable

    public static function getInstance(){
        if(is_null(self::$instance)){ // ou if(!self::$instance)
            selft::$instance = new Singleton;
            //self::$instance = new self;
        }
        return selft::$instance;
    
    }
}

// $singleton = new Singleton; // IMPOSSIBLE d'instancier notre classe
$objet = Singleton::getInstance(); // $objet est le seul et unique objet de cette classe Singleton !!!
$objet2 = Singleton::getInstance();

echo '<pre>';
var_dump($objet);
var_dump($objet2);
echo '</prev>';

// il s'agit bien d'un objet similaire

// Le singleton est notamment utilisé pour la connexion à la BDD ! Cela est plus sûr ...
