//  Créer un objet contenant 4 propriétés 
var users = {
    first: 'Nesta',
    second: 'Bunny',
    third: 'Peter',
    fourth: 'Lee'
};

//  Faire une boucle for ... in sur l'objet
for( var prop in users ){ // PROP pour propriété IN 'monObjet'

    //  Afficher le nom de la propriétés
    console.log( prop );

    // Afficher la valeur des propriétés 
    console.log( users[prop] );

};