// Attendre le chargement du DOM

$( document ).ready( function(){



    // Capter la soumission du formulaire 

    $( 'form' ).submit( function(evt){

        // Bloquer le comportement naturel du formulaire

        evt.preventDefault();

        // Récupérer les valeurs dans les champs du formulaire

        var userName = $( 'input[type="text"]' ).val();
            console.log( userName );

        var userEmail = $( 'input[type="email"]' ).val();
            console.log( userEmail );

        var userContact = $( 'input[type="text"]#userContact' ).val();
            console.log( userContact );

        var userMessage = $( 'textarea' ).val();
            console.log( userMessage );
            
        // Vérifier si la taille des valeurs

        if( userName, userEmail, userContact, userMessage < 1){
            
            // Afficher le message d'erreur
            $( ' form b' ).text( 'Champs obligatoire' )
        
            }else{
            console.log( 'champs OK' );
            }

            

    }); // fin de la soumission du form

}); // fin de la fonction d'attente du chargement du DOM 