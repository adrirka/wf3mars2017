//  Créer un tableau contenant 4 prénoms
var users = [ 'John', 'Georges', 'Paul', 'Ringo' ];
    console.log( users );

/* Saluer chacun des prénoms dans la console : methode manuelle fastidieuse sans boucle ...
console.log( 'Salut ' + users[0] ); // pour rappel l'index d'un tableau commence toujours à 0
console.log( 'Salut ' + users[1] );
console.log( 'Salut ' + users[2] );
console.log( 'Salut ' + users[3] );
*/

//  Faire une boucle FOR sur le tableau pour saluer chacun des prénoms 

for( var i = 0; i < users.length; i++ ){ // i pour "itération", elle commence toujours à 0 ; la variable i est toujours inférieure à la taille de mon tableau ; que l'on incrémente de 1 à chaque fois

    console.log( i );

    //  code à exécuter à chaque itération (boucle)
    console.log( 'Salut '+ users [i] );

};