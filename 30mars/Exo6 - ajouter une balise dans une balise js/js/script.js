//  Sélectionner la balise dans la quelle ajouter une autre balise
var myNavUl = document.querySelector( 'ul' );

//  Créer un tableau contenant 4 titres 
var myArray = [ 'Home', 'About', 'Portfolio', 'Contact' ];

for( var i = 0; i < myArray.length; i++ ){

    // Créer une variable pour générer une balise HTLM
    var myNewTag = document.createElement( 'li' );

    // Ajouter du contenu dans la balise générée
    myNewTag.innerHTML = '<a href="#">' + myArray[i] + '</a>';

    // Ajouter un enfant dans myMain
    myNavUl.appendChild( myNewTag );

};



