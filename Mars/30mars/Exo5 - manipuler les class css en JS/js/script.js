// Ajouter une class à une balise
var myTitle = document.querySelector( 'h1' );

// Ajouter une class à la balise h1
myTitle.classList.add( 'error' ); // on ne répète pas le . de la class avec la fonction classList.add car on est déjà au niveau d'une class.

// Sélectionner la dernière balise p
var myLastP = document.querySelector( 'p:last-of-type' );

// Supprimer la class "hidden"
myLastP.classList.remove( 'hidden' );

// Sélectionner la balise button
var myButton = document.querySelector( 'button' );

//  Sélectionner la première balise h2
var myFirstH2 = document.querySelector( 'h2' ); // inutile de préciser 'h2:first-of-type' puisque la fonction querySelector prendre par défaut le premier élément (versus le querySelector All)  

// Capter le clic sur le bouton
myButton.onclick = function(){
    
    // Ajouter ou supprimer la class move sur la première balise h2
myFirstH2.classList.toggle( 'move' );

}; 

