<?php

// /Vendor/Entity/commande.php

namespace Entity;

class Commande
{
    private $id_commande;
    private $id_membre;
    private $montant;
    private $date_enregistrement;
    private $etat;
  

    /*
    * GETTERS *
    *
    */ 

    public function getId_commande(){
        return $this -> id_commande;
    }


    public function getId_membre(){
        return $this -> id_membre;
    }


    public function getMontant(){
        return $this -> montant;
    }

    
    public function getDate_enregistrement(){
        return $this -> date_enregistrement;
    }

    
    public function getEtat(){
        return $this -> etat;
    }


     /*
    * SETTERS *
    *
    */ 

    public function setId_commande($id_commande){
        return $this -> id_commande = $id_commande;
    }


    public function setId_membre($id_membre){
        return $this -> id_membre = $id_membre;
    }


    public function setMontant($montant){
        return $this -> montant = $montant;
    }

    
    public function setDate_enregistrement($date_enregistrement){
        return $this -> date_enregistrement = $date_enregistrement;
    }

    
    public function setEtat($etat){
        return $this -> etat = $etat;
    }

}