/*
Alternative au querySelector : getElement (possibilité de sélection par type de balise, par class ou par id)
*/ 


// Sélecteur de balise HTML (tag) => sélectionne l'ensemble des balises 'p' de la page 
var myParaTag = document.getElementsByTagName( 'p' );
console.log( myParaTag );

 // Sélecteur de class => sélectionne l'ensemble des balises associées à la class
var myClass = document.getElementsByClassName( 'myClass' );
console.log( myClass );

// Sélecteur d'id => sélectionne LA balise (car id unique) associée à l'id
var myId = document.getElementById( 'myId' );
console.log( myId );

/*
Selecteur querySelector
*/ 

// Sélecteur querySelector classique => sélectionne uniquement la première de la page (ici 'p')

console.log( document.querySelector( 'p' ) );

// Sélecteur querySelectorAll => sélectionne l'ensemble des balises 

console.log( document.querySelector( '.myClass') );

