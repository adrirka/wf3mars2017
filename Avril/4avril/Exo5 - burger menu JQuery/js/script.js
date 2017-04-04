// Attendre le chargement du DOM

$( document ).ready( function(){

    // Burger menu classique
    $( '.fa-bars' ).click( function(){
        
        $( 'nav ul' ).fadeIn();
    });

    // Fermer le burger menu
    $( 'a' ).click( function(evt){

        evt.preventDefault();
        $( 'nav ul' ).fadeOut(500);
    });

}); // Fin de la fonction d'attente du chargement du DOM