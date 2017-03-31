/* Attendre le chargement du DOM
-je sélectionne mon document
-je capte l'événement ready
-je renvoie la fonction de callback
*/
$( document ).ready( function(){

    // Capter la soumission du formulaire
    $( 'form' ).submit( function(evt){
        
        // Définir une variable pour le score du formulaire
        var formScore = 0;
        
        /* Bloquer le comportement naturel du formulaire (qui envoit la valeur)
        -Je récupère mon événement evt dans ma fonction callback
        -J'applique une fonction preventDefault() à l'événement
        */
        evt.preventDefault();

        // Connaitre la valeur saisie par l'utilisateur dans le input 
        var userName = $( 'input' ).val();

        // Connaitre le nombre de caractères dans la valeur
        console.log( userName.length );

        // Connaitre la valeur saisie par l'utilisateur dans le textarea
        var userMessage = $( 'textarea' ).val();

        // Connaitre le nombre de caractères dans la valeur
        console.log( userMessage.length );
        
        // Vérifier la taille de userName (au moins 1 caractère)
        if( userName.length == 0 ){ // strictement égal à 0
        
            // Afficher un message dans le label (ici sélecteur attribut for de la balise label)
            $( '[for="userName"] b' ).text('Champs obligatoire');

        } else{
            console.log( 'userName ok' );
        
            // incrémenter formScore si username est ok dans la condition else
            formScore++;
        };
        

         // Vérifier la taille de userMessage (au minimum 5 caractères)
         if ( userMessage.length < 4 ){
             
             // Afficher un message dans le label (ici sélecteur attribut for de la balise label)
            $( '[for="userMessage"] b' ).text('Minimum 5 caractères');

         }else{
             console.log( 'userMessage ok' );
         
            // incrémenter formScore si usermessage est ok dans la condition else
            formScore++;
        };

        // Vérifier la valeur de formScore pour valider le formulaire
        if( formScore == 2 ){
            console.log( 'Le formulaire est validé !' );

            // => Envoyer les donnée dans le fichier PHP et attendre la réponse du PHP (true/false)

            // Le PHP répond true !

            // Ajouter le message dans la liste
            $( 'section:last' ).append( '<article><h4>' + userMessage + '</h4><p>' + userName + '</p></article>' );

            // Vider les champs du formulaire
            $( 'input:not([type="submit"])' ).val( '' );
            $( 'textarea' ).val( '' );
            

        };

        /* Supprimer les messages d'erreur 'champs obligatoires' / 'minimum 5 caractères' une fois que l'utilisateur corrige
        -je sélection mon input
        -Capter l'événement .focus
        -j'applique une fonction callback
        */ 
        
        $( 'input, textarea' ).focus( function(){
            $( this ).prev().children( 'b' ).text( '' );
        }); 
        
    }); // fin de la soumission du formulaire 


}); // fin de la fonction d'attente du chargement du DOM





