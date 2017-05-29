<?php

class Panier
{
    public $nbProduit; // propriété (=variable)

    public function ajouterProduit(){
        //traitement de la méthode
        return 'L\'article a bien été ajouté au panier !';
    }

    protected function retirerProduit(){
        return 'L\'article a bien été retiré du panier !';
    }

    private function affichagePanier(){
        return 'Voici les produits dans le panier !';
    }

}

// -------------------------------------------------

$panier = new Panier(); // instanciation : $panier représente un objet de la classe Panier. les parenthèses sont facultatives induisant des 'arguments' entre quotes
var_dump($panier);
var_dump(get_class_methods($panier));

$panier -> nbProduit = 5;
echo 'Nombre de produits : ' . $panier -> nbProduit . '<br/>';
var_dump($panier);

echo 'Panier : ' . $panier -> ajouterProduit() .  '<br/>';
//echo 'Panier : ' . $panier -> retirerProduit() .  '<br/>'; // ERREUR : impossible d'accéder à un élément 'PROTECTED' à l'extérieur de la classe
// echo 'Panier : ' . $panier-> affichagePanier() . '<br/>'; // ERREUR : impossible d'accéder à un élément 'PRIVATE' à l'extérieur de la classe

$panier2 = new Panier
var_dump($panier2);

/*
Commentaires : 

    New : est un mot clé qui permet de créer un objet issu d'une classe (instanciation)

    On peut créer plusieurs objets d'une même classe. Et lorsqu'on affecte une valeur à une propriété d'un objet cela n' pas d'incidence sur les autres objets de la classe'

    Niveau de visibilité : 
        -public: accessible de partout !
        -protected: accessbile depuis la classe où l'élément a été déclaré ainsi que depuis les classes héritières
        -private: accessible uniquement depuis la classe où l'élément a été déclaré 

*/ 