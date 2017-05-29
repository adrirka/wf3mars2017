<?php 

class Membre 
{
    private $pseudo;
    private $mdp;

    public function setPseudo($pseudo){
        if(!empty($pseudo) && is_string($pseudo)) {
            $this -> pseudo = $pseudo;
        }else{
            return FALSE;
        }
    }

    public function getPseudo(){
        return $this -> pseudo;
    }

    public function setMdp ($mdp){
        if(!empty($mdp) && is_string($mdp)) {
            $salt = 'adrien' . time();
            $salt = md5($salt);
            // on enregistre le salt dans la BDD par membre
            $mdp_a_crypter = $salt . $mdp;
            $mdp_a_crypter = md5($mdp_a_crypter);
            $this -> mdp = $mdp_a_crypter;
        }else{
            return FALSE;
        }
    }

    public function getMdp(){
        return $this -> mdp;
    }
}


// ------------------------------
// EXERCICE : au regard de cette classe, veuillez crééer un membre, affecter des valeurs à pseudo et mdp et les afficher 

$membre = new Membre;

$membre = setPseudo('adri');
echo 'Pseudo : ' . $membre -> getpseudo(); 

$membre = setMdp('password');
echo 'Mdp : ' . $membre -> getMdp(); 