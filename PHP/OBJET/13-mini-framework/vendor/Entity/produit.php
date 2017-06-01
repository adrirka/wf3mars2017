<?php

// /Vendor/Entity/produit.php

namespace Entity;

class Produit
{
    private $id_produit;
    private $reference;
    private $categorie;
    private $titre;
    private $description;
    private $couleur;
    private $taille;
    private $public, $photo, $prix, $stock; // on peut aussi écrire la syntaxe ainsi.


    /*
    * GETTERS *
    *
    */ 

    public function getId_produit(){
        return $this -> id_produit;
    }


    public function getReference(){
        return $this -> reference;
    }


    public function getCategorie(){
        return $this -> categorie;
    }

    
    public function getTitre(){
        return $this -> titre;
    }

    
    public function getDescription(){
        return $this -> description;
    }


    public function getCouleur(){
        return $this -> couleur;
    }


    public function getTaille(){
        return $this -> taille;
    }


    public function getPublic(){
        return $this -> public;
    }


    public function getPhoto(){
        return $this -> photo;
    }


    public function getPrix(){
        return $this -> prix;
    }


    public function getStock(){
        return $this -> stock;
    }


     /*
    * SETTERS *
    *
    */ 

    public function setId_produit($id_produit){
        return $this -> id_produit = $id_produit;
    }


    public function setReference($reference){
        return $this -> reference = $reference;
    }


    public function setCategorie($categorie){
        return $this -> categorie = $categorie;
    }

    
    public function setTitre($titre){
        return $this -> titre = $titre;
    }

    
    public function setDescription($description){
        return $this -> description = $description;
    }


    public function setCouleur($couleur){
        return $this -> couleur = $couleur;
    }


    public function setTaille($taille){
        return $this -> taille = $taille;
    }


    public function setPublic($public){
        return $this -> public = $public;
    }


    public function setPhoto($photo){
        return $this -> photo = $photo;
    }


    public function setPrix($prix){
        return $this -> prix = $prix;
    }


    public function setStock($stock){
        return $this -> stock = $stock;
    }


}