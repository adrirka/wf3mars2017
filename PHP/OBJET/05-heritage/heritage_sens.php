<?php

class A
{
    public function testA(){
        return 'test A';
    }
}
// ------------
class B extends A
{
    public function testB(){
        return 'test B';
    }

}
// ------------
class C extends A
{
    public function testC(){
        return 'test C';
    }

}
// ------------
$c = new C;
echo $c -> testA() . '<br>'; // methode A accessible par C (héritage indirect)
echo $c -> testB() . '<br>'; // methode B accessible par C (héritage direct)
echo $c -> testC() . '<br>'; //méthode C accessible par C

var_dump(get_class_methods($c));  // Affiche les 3 méthodes car elles appartiennent toutes à C


/*
Commentaires :
    Transitivité :
        Si B hérite de A
            Et que C hérite de B...
                ... alors C hérite de A
        Les méthodes protected de A sont également disponibles dans C, même si l'hériateg est indirect.

    L'héritage est :
        - non réflexif : class D extends D -> une classe ne peut pas hériter d'elle-même.
        - non symétrique : si class F extends E, alors E n'est pas extends de F automatiquement.
        - sans cycle : si class F extends E, alors il est impossible que E extends F.
        - non multiple : class N extends M, P : IMPOSSIBLE en PHP. Pas d'héritage multiple en PHP !


        Une classe parent (mère) peut avoir un nombre infini d'héritiers.
*/
