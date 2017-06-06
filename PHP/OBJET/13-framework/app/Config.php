<?php
//app/Config.php

class Config
{
	protected $parameters;
	
	public function __construct(){
		require __DIR__ . '/Config/parameters.php';
		$this -> parameters = $parameters;
		// A l'instanciation de Config, on r�cup�re les parameters d�clar�s dans parameters.php et on les stocke dans notre propri�t� $parameters. 
	}

	public function getParametersConnect(){
		return $this -> parameters['connect'];
		// cette m�thode va retourner seulement la partie 'connect' de mes parametres
	}
}
//----------------------
// $config = new Config; 
// echo '<pre>';
// print_r($config -> getParametersConnect());
// echo '</pre>';


