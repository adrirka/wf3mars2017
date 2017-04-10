// Attendre le chargement du DOM

$( document ).ready( function(){


    // Capter la soumission du formulaire 

    $( 'form' ).submit( function(evt){

        // Bloquer le comportement naturel du formulaire

        evt.preventDefault();
        console.log( 'submit' );

        // Définir les variables globales

        var userName = $( '[placeholder="Your name*"]' );
        var userEmail = $( '[placeholder="Your email*"]' );
        var userSubject = $( 'select' );
        var userMessage = $( 'textarea' );
        var formScore = 0;

        
        // Vérifier que l'utilisateur a bien saisi son nom
        if( userName.val().length == 0 ){
            console.log( 'Nom obligatoire' );

            // Ajouter la class error sur l'input
            userName.addClass( 'error' );

        }else{
            console.log( 'nom OK' );
            
            // Incrémenter la valeur de la variable formScore
            formScore++;
        };



        // Vérifier que l'utilisateur a bien saisi au moins 4 caractères
        if( userEmail.val().length < 4 ){
            // Ajouter la class error sur l'input
            userEmail.addClass( 'error' );

        }else{
            console.log( 'email OK' );
            // Incrémenter la valeur de la variable formScore
            formScore++;
        };


        // Vérifier que l'utilisateur a bien choisi son sujet : ATTENTION ici il ne s'agit pas de mesure la taille de la valeur mais de la récupérer pour déterminer si elle n'est pas égale à "null" => pas de valeur numérique
        if( userSubject.val() == 'null' ){
            console.log( 'sujet obligatoire' );

            // Ajouter la class error sur l'input
            userSubject.addClass( 'error' )

        }else{
            console.log( 'sujet OK' );

            // Incrémenter la valeur de la variable formScore
            formScore++;
        };


        // Vérifier que l'utilisateur a bien saisi au moins 5 caractères
        if( userMessage.val().length < 5 ){
            console.log( 'message au moins 5 caractères' );


            // Ajouter la class error sur l'input
            userMessage.addClass( 'error' );

        }else{
            console.log( 'message OK' );

            // Incrémenter la valeur de la variable formScore
            formScore++;
        };

        // Validation du formulaire
        if( formScore == 4 ){
            console.log( 'le formulaire est validé !' );
        

            // Envoie des données dans le fichier de traitement PHP
            // PHP répond true => continuer le traitement du formulaire 

            // => Afficher les données du formulaire dans le modal

            $( 'div span' ).text( userName.val() );
            $( 'div b' ).text( userSubject.val() );
            $( 'div p:last' ).text( userMessage.val() );

            //  Afficher la modale 
            $( 'div' ).fadeIn();

            // Vider les champs du formulaires
            $( 'form' )[0].reset();
        
        };

    }); // fin de la soumission du form

    // Fermeture de la modal : ne pas inclure dans la soumission dans la soumission - PEUT SE TROUVER EGALEMENT EN AMONT DANS LE CODE
    $( '.fa-times' ).click( function(){
        $( 'div').fadeOut();
    });

    // Supprimer la class error : en dehors de la soumission à l'image de l'étape ci-dessus
    $( 'input, select, textarea' ).focus( function(){
        $( this ).removeClass( 'error' );
    });



}); // fin de la fonction d'attente du chargement du DOM 