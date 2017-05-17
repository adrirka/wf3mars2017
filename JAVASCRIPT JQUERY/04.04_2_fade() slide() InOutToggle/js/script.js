// Attendre le chargement du DOM

$( document ).ready( function(){

        // fonction fadeOut() => fonction qui agit sur l'OPACITY / en display:block (affiché opacity 1) par défaut, et passe en display:none (transparent  opacity 0) au click
        $( 'section' ).eq(0).children( 'button' ).click( function(){ // eq en jQuery est l'équivalent du sélecteur nth-child en css (ici l'index commence à 0)
            
            $( 'section' ).eq(0).children( 'article' ).fadeOut(2000); //possibilité de préciser un paramètre durée en millisecondes
        });

        
        // fonction fadeIn() => fonction qui agit sur l'OPACITY/ est en display none par défaut, passe en display:block au click 
        $( 'section' ).eq(1).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(1).children( 'article' ).fadeIn(500); 
        });


         // fonction fadeToggle() => fonction qui agit sur l'OPACITY/ devient display:none au click si display:block initialement et inversement 
        $( 'section' ).eq(2).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(2).children( 'article' ).fadeToggle(500); 
        });


        // fonction slideUp() => fonction qui agit sur le HEIGHT / en display:block (affiché: height 100%) par défaut, et passe en display:none (height :0) au click
        $( 'section' ).eq(3).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(3).children( 'article' ).slideUp(1000); 
        });

        
        // fonction slideDown() => fonction qui agit sur le HEIGHT / est en display none par défaut, passe en display:block au click
        $( 'section' ).eq(4).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(4).children( 'article' ).slideDown(1000); 
        });


        // fonction slideToggle() => fonction qui agit sur le HEIGHT / devient display:none au click si display:block initialement et inversement
        $( 'section' ).eq(5).children( 'button' ).click( function(){ 
            
            $( 'section' ).eq(5).children( 'article' ).slideToggle(1000); 
        });

}); // Fin de la fonction d'attente du chargement du DOM