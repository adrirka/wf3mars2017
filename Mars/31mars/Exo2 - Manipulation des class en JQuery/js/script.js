/* Attendre le chargement du DOM
-sélectionner mon dom 
-capter la fonction ready
-à laquelle j'ajoute une fonction callback
*/
    
$( document ).ready( function(){

    
// Méthode création burger menu

    // Supprimer la class active de ma balise h1
    $( 'h1' ).removeClass( 'active' );

    // Ajouter la class active à la balise h2
    $( 'h2 ').addClass( 'active' );

    // Ajouter ou supprimer la class hidden sur la balise p lorsqu'on clique sur la balise h2
    $( 'h2' ).click( function(){
         $( 'p' ).toggleClass( 'hidden' );
    });
    

}); // fin de la fonction d'attente de chargement du DOM 