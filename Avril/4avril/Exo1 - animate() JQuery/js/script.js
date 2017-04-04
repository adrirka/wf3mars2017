// Attendre le chargement du DOM

$( document ).ready( function(){

    // Fonction animate ()
    $( 'section:first button' ).click( function(){

        // Changer la largeur et la hauteur

        $( 'section:first article' ).animate({ // la fonction animate() va prendre un {objet} en paramètre
            width: '20rem',
            height: '20rem'
        });
    });

    
    //  Fonction animate() valeurs dynamiques (avec opérateur d'affectation)
    $( 'section:nth-child(2) button' ).click( function(){
        
        $( 'section:nth-child(2) article' ).animate({
            
            // Pas d'espace entre l'opérateur d'affectation += et la valeur
            left: '+=.5rem', // nouvelle valeur après addition
            top: '-=.5rem' // nouvelle valeur après soustraction
        });
    });

    
    // Fonction animate() : toggle/show/hide
    $ ('section:nth-child(3) button' ).click( function(){
        
        $('section:nth-child(3) article' ).animate({
            width: 'toggle',
        });
    });

    
    // Fonction animate() avec callback
    $( 'section:last button').click( function(){
        
        $( 'section:last article' ).animate({
            width: '20rem',
            height: '20rem'
        }, 2000, function(){ // ici la fonction animate définit une durée en millisecondes avant la fonction de callback
           $( this ).hide();
        } );
    });





}); // Fin de la fonction d'attente du chargement du DOM