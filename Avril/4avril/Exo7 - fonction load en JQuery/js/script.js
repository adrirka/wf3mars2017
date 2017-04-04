//  Attendre le chargement du DOM

$( document ).ready( function(){
    
    // Capter le clic sur le premier bouton
    $( 'button:first' ).click( function(){
        
        // Charger le fichier home.html dans le main
        $( 'main' ).load( 'view/home.html' );
    });

}); // fin de la fonction d'attente du chargement du DOM