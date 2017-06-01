<?php
session_start();
require_once(__DIR__ . '/../vendor/autoload.php');

// TEST1 : Entity produit
//$produit = new Entity\produit;
//$produit -> setTitre('Mon produit');
//echo $produit -> getTitre();

// TEST2 : PDOManager
//$pdom = Manager\PDOManager::getInstance();
//$resultat = $pdom -> getPdo() -> query("SELECT * FROM produit");
//$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//print_r($produits);
//echo '</pre>';

// TEST 3 : EntityRepository;
$er = new Manager\EntityRepository;

//$resultat = $er -> find(25);
$resultat = $er -> delete(25);


//$produit = array(
    //"id_produit" => NULL

//)
