// Attendre le chargement du DOM

$( document ).ready( function(){

        // fonction fadeOut()
        $( 'section' ).eq(0).children( 'button' ).click( function(){ // eq en jQuery est l'équivalent du sélecteur nth-child en css (ici l'index commence à 0)
            
            $( 'section' ).eq(0).children( 'article' ).fadeOut(2000); //possibilité de préciser un paramètre durée en millisecondes
        });

        
        // fonction fadeIn()
        $( 'section' ).eq(1).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(1).children( 'article' ).fadeIn(500); 
        });


         // fonction fadeToggle()
        $( 'section' ).eq(2).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(2).children( 'article' ).fadeToggle(500); 
        });


        // fonction slideUp()
        $( 'section' ).eq(3).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(3).children( 'article' ).slideUp(1000); 
        });

        
        // fonction slideDown()
        $( 'section' ).eq(4).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(4).children( 'article' ).slideDown(1000); 
        });


        // fonction slideToggle()
        $( 'section' ).eq(5).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(5).children( 'article' ).slideToggle(1000); 
        });

}); // Fin de la fonction d'attente du chargement du DOM