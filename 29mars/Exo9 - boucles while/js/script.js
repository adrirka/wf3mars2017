//  Créer un tableau contenant 4 prénoms
var users = [ 'John', 'Georges', 'Paul', 'Ringo' ];
    console.log( users );

//  Faire une boucle WHILE sur le tableau pour saluer chacun des prénoms 
//  La boucle While est plus permissive dans l'erreur car elle n'a pas besoin d'être exécutée pour être lancée

// Definir une varialbe i à 0
var i = 0;

// Limiter la boucle à la tailleur du tableau
while( i < users.length ){
    console.log( 'Salut' + users[i] );

    // Incrémenter la variable i 
    i++;
};
