<?php

// vendor/Repository/ProduitRepository.php

namespace Repository;

use Manager\EntityRepository; // /!\ Très important car l'héritage ne permet pas de charger le fichier.
use PDO;

class ProduitRepository extends EntityRepository
{

    //tout le code de EntityRepository est ici !

    public function getAllProduits(){
        return $this -> findAll();
    }

    public function getProduitById($id){
        return $this -> find($id);
    }

    public function deleteProduitById($id){
        return $this -> delete($id);
    }

    public function registerProduit($info){
        
    }

}