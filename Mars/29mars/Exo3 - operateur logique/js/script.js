var first = 20;
var second = 20;
var third  = 10;

//  "et" logique   : vérifier que les deux variables ont la même valeur 
console.log ( (first == 20 && second == 20) ); // => TRUE / la condition ET impose que les deux variables aient la même valeur 
console.log ( (first == 10 && third == 10) ); // => FALSE 

// "ou" logique : vérifier qu'une de varaibles à la bonne valeur 
console.log( first == 20 || second == 15 ); // TRUE : la condition OU  va comparer l'une ou l'autre des deux variables 
console.log( first == 30 || first >= 20 ); // TRUE