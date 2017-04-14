// Attendre le chargement du DOM

$( document ).ready( function(){

    // Ouvrir la modal 
    $( 'button' ).click( function(){
        $( 'section' ).fadeIn();
    });

    // Fermer la modal 
    $( '.fa' ).click( function(){
        $( this ) // je suis toujours dans cette class
        .parent() // je remonte sur le premier parent à savoir h3
        .parent() // je remonte encore sur le parent soit article
        .parent() // et enfin je remonte encore d'un parent je suis sur section
        .fadeOut(); // Transparent
    });

    // Capter les touches du clavier - s'applique généralement sur l'ensemble du DOM
    $( document ).keyup( function(evt){
        console.log( evt.keyCode ); // Le KeyCode se récupère dans les propriétés de l'objet keyup

        if( evt.keyCode == 27 ){
            $( 'section' ).fadeOut();
        };
    });

}); // Fin de la fonction d'attente du chargement du DOM