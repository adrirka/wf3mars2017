//  Attendre la fonction de chargement du DOM

$( 'document' ).ready( function(){
console.log( 'dom ok' );
    
    
    // Afficher l'image du chat correspondant en captant l'événement change
            
    $( 'select' ).change( function(){

    //  Condition if pour modifier la valeur src de avatarStyleTop ou avatarStyleBottom
        if( $( this ).attr( 'value' ) == 'null' ){
            console.log( 'image 0' );
        }else{
            $( 'img:first' ).attr( 'src', 'img/' + $( this ).val() + '.jpg' );
        };

    });
    
    
    // Capter la soumission du formulaire 

    $( 'form' ).submit( function(evt){

        //  Bloquer le comportement naturel du formulaire
        evt.preventDefault();
        console.log( 'submit' );

        // variables globales
        var userChoice = $( 'select' ).val();
        console.log ( userChoice );
        
        var userReason = $( 'textarea' ).val();
        console.log ( userReason );

        var formScore = 0;

         // Vérifier que l'utilisateur a choisi un chat

        if( userChoice == 'null' ){
            console.log( 'veuillez choisir un chat' );

            // Ajouter la class error sur le select lorsque la condition est null
            $( 'select' ).addClass( 'error' );

        }else{
            console.log( 'Choix OK' );

            // Incrémenter la valeur de la variable formScore quand la condition est vérifiée
            formScore++;
 
        }; 
            
        // Vérifier que l'utilisateur a détailler ses raisons avec au moins 15 caractères

        if( userReason.length < 15 ){
            console.log( 'veuillez détailler vos motivations' );

            // Ajouter la class error sur le textarea
            $( 'textarea' ).addClass( 'error' );

        }else{
            console.log( 'Message OK' );

            // Incrémenter la valeur de la variable formScore quand la condition est vérifiée
            formScore++;
        };

         // Supprimer la class error 

        $( 'select, textarea' ).focus( function(){
            $( this ).removeClass( 'error' );
        });
         
         // Validation du formulaire
        if( formScore == 2 ){
            console.log( 'cool le formulaire est validé !' );
        
            
            // Si validation apparation d'un message de confirmation à la place du form

            $( 'form' ).fadeOut( function(){
                $( 'article:nth-child(3) p' )
                    .text( 'Merci nous vous recontacterons ultérieurement' )
                    .fadeIn()
            });
        
        };

            // Vider les champs du formulaires après soumission
            $( 'form' )[0].reset();

        // Envoie des données dans le fichier de traitement PHP
        // PHP répond true => continuer le traitement du formulaire 

        
    
    }); // fin de la soumission du formulaire 


}); // fin de la fonction d'attente du chargement du DOM