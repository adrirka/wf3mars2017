<?php

class Vehicule
{
    private $litreEssence;  // Nbre de litres d'essence dans le véhicule
    private $reservoir;  // Capacité max du réservoir

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function getReservoir(){
        return $this -> reservoir;
    }

    public function setReservoir($res){
        $this -> reservoir = $res;
    }

}


class Pompe 
{
    private $litreEssence;

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function donneEssence(Vehicule $v){
        $v -> getLitreEssence();
        $litre_a_mettre = $v -> getLitreEssence() - $v -> getLitreEssence();
        // 45 - 5 

        // affecter la nouvelle valeur de litreEssence à notre objet Véhicule(50)
        $v -> setLitreEssence($v -> getLitreEssence() + $litre_a_mettre);
        // Affecte 50 au véhicule;

        // Affecter la nouvelle valeur de litreEssence à notre objet Pompe (755)
        $this -> setLitreEssence($this -> getLitreEssence() - $litre_a_mettre);
    }

}

//-----------

// 1- Création d'un véhicule
$vehicule = new Vehicule('yamaha');

// 2- Attribuer un nombre de litre d'essence au véhicule (5L)
$vehicule -> setLitreEssence(5);

// 3- Attribuer la capacité max du réservoir du véhicule est de 50L (50)

$vehicule -> setReservoir(50);

// 4- Afficher le nombre de litre d'essence dans le véhicule

echo 'Nbre de litres d\'essence dans le véhicule' . $vehicule -> getLitreEssence() . 'litres<br>';

// 5- creation d'une pompe
$pompe= new Pompe;

//6- Attribuer un nombre de litre d'essence à la pompe (800L)
$pompe -> setLitreEssence(800);

// 7- Afficher le nombre de litre d'essence dans la pompe

echo 'Dans le véhicule il y a : ' .$vehicule -> getLitreEssence() . 'litres<br>';
echo 'Dans la pompe il y a : ' . $pompe -> getLitreEssence() . 'litres<hr>';

// 8- La pompe donne de l'essence au véhicule et fait le plein

$pompe -> donneEssence($vehicule);

// 9- Afficher le nombre de litre d'essence dans le véhicule après ravitaillement

echo 'Après ravitaillement : <br> : ';
echo 'dans le véhicule il ya :' . $vehicule -> getLitreEssence() . 'litres<br>';

// 10- Afficher le nombre de litre d'essence dans la pompe après ravitaillement

echo 'Après ravitaillement : <br> : ';
echo 'dans le pompe il ya :' . $pompe -> getLitreEssence() . 'litres<br>';



