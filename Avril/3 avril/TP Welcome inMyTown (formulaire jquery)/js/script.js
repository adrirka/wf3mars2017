// Attendre le chargement du DOM
$( document ).ready(function(){

    // Crééer un tableau vide pour enregistrer les avatarStyleBottom
    var myTown = [];

    // Vérifier le genre de l'avatar
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');
        var avatarGender;
        
        // => avatarWoman capter le click
        avatarWoman.click(function(){

            // Désactiver avatarMan 
            avatarMan.prop('checked', false);
            
            // Modifier la valeur de avatarGender
            avatarGender = avatarWoman.val();  

            // Vider le message d'erreur
            $( '.labelGender b' ).text( '' );

            // Modifier l'attribut src de #avatarBody
            $( '#avatarBody' ).attr( 'src', 'img/' + avatarGender + '.png' );

        });

        // => avatarMan capter le click
        avatarMan.click(function(){

            // Désactiver avatarWoman
            avatarWoman.prop('checked', false);

            // Modifier la valeur de avatarGender
            avatarGender = avatarMan.val(); 
            
            // Vider le message d'erreur
            $( '.labelGender b' ).text( '' );

            // Modifier l'attribut src de #avatarBody
            $( '#avatarBody' ).attr( 'src', 'img/' + avatarGender + '.png' );

         });

    // Supprimer les messages d'erreur
    $( 'input, select' ).focus( function(){

        // Sélectionner la balise précédent le input
        $( this ).prev().children( 'b' ).text( '' ); 

    });

    // Capter l'événement Change() sur les selects
    $( 'select' ).change( function(){
    
        //  Condition if pour modifier la valeur src de avatarStyleTop ou avatarStyleBottom
        if( $( this ).attr( 'id' ) == 'avatarStyleTop' ){
            
            //  Modifier la valeur de l'attribut src de #avatarStyleTop
            $( '#avatarTop' ).attr( 'src', 'img/top/' + $( this ).val() + '.png' );

        }else{

            //  Modifier la valeur de l'attribut src de #avatarStyleTop
            $( '#avatarBottom' ).attr( 'src', 'img/bottom/' + $( this ).val() + '.png' );

        };

    });
    
    // Capter la soumission du formulaire
    $('form').submit( function(evt){

        // Bloquer le comportement par defaut du formulaire
            evt.preventDefault();

        // Définir une variable pour la validation finale du formulaire
        var formScore = 0;


        // Variables globales du formulaire
            var avatarName = $('#avatarName').val();
            var avatarAge = $('#avatarAge').val();
            var avatarStyleTop = $('#avatarStyleTop').val();
            var avatarStyleBottom = $('#avatarStyleBottom').val();


        // Vérifier les champs du formulaire
            // => avatarName minimum 5 caractères
            if( avatarName.length < 5 ){

                // Ajouter un message d'erreur dans l'attribut for du label 
                $( '[for="avatarName"] b' ).text( 'Min 5 caractères' );

            } else{

                // Incrémenter la variable formScore
                formScore++;
            };

            // => avatarAge entre 1 et 100
            if( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ){

                // Ajouter un message d'erreur dans l'attribut for du label 
                $( '[for="avatarAge"] b' ).text( 'Valeur comprise entre 1 et 100' );

            } else{
                console.log('avatarAge OK');

                // Incrémenter la variable formScore
                formScore++;
            };


            // => avatarStyleTop obligatoire
            if( avatarStyleTop == 'null' ){

                 // Ajouter un message d'erreur dans l'attribut for du label 
                $( '[for="avatarStyleTop"] b' ).text( 'Vous devez choisir un style' );

            } else{
                console.log('avatarStyleTop OK');

                // Incrémenter la variable formScore
                formScore++;
            };

            // => avatarStyleBottom obligatoire
            if( avatarStyleBottom == 'null' ){
                
                // Ajouter un message d'erreur dans l'attribut for du label 
                $( '[for="avatarStyleBottom"] b' ).text( 'Vous devez choisir un style' );
            
            } else{
                console.log('avatarStyleBottom OK');

                // Incrémenter la variable formScore
                formScore++;
            };


            // => avatarGender vérifier la valeur
            if( avatarGender == undefined ){

                // Ajouter un message d'erreur dans la class gender
                $( '.labelGender b' ).text( 'Champs obligatoire' );

            } else{
                console.log('avatarGender OK');

                // Incrémenter la variable formScore
                formScore++;
            };


            // Validation finale : vérifier la valeur de la variable formScore
            if( formScore == 5 ){
                console.log( 'Le formulaire est validé !!')

                // => Envoyer les données du formulaire et attendre la réponse du server en Ajax
                // => Le server répond true

                 // Ajouter une ligne dans le tableau HTML
                 $( 'table' ).append( ''+ 
                    '<tr>'+
                        '<td><b>' + avatarName + '</b></td>' +
                        '<td>' + avatarAge + '</td>' +
                        '<td>' + avatarGender + '</td>' +
                        '<td>' + avatarStyleTop + ' ' + avatarStyleBottom + '</td>' +
                    '</tr>' 
                );

                // Ajouter l'avatar dans un tableau objet
                myTown.push({
                    name: avatarName,
                    gender: avatarGender,
                    age: parseInt( avatarAge ),
                    top: avatarStyleTop,
                    bottom: avatarStyleBottom
                });
                
                // Vider les champs du formulaire 
                 $( 'form' )[0].reset();

                //  Revenir aux valeurs 'null' pour l'avatar
                $( '#avatarBody' ).attr( 'src', 'img/null.png' );
                $( '#avatarTop' ).attr( 'src', 'img/top/null.png' );
                $( '#avatarBottom' ).attr( 'src', 'img/bottom/null.png' );
                
                // Afficher les données du tableau dans la console
                console.log( myTown );

                // Afficher la taille totale de la ville dans #totalSims 
                $( '#totalSims' ).text( myTown.length );
                

                // Définir les variables globales pour les statistiques
                var totalGirls = 0;
                var totalBoys = 0;
                var totalAge = 0;
                
                
                //  Faire une boucle for sur myTown pour connaitre les statistiques
                for( var i = 0; i < myTown.length; i++ ){
                    console.log( myTown[i].gender );
                
                    // Condition pour le gender
                    if( myTown[i].gender  == 'girl' ){
                        totalGirls++;

                    }else{
                        totalBoys++;
                    }

                    // Additionner les âges 
                    totalAge += myTown[i].age;

                };

                // Afficher dans le tableau HTML le nombre de girls et de le nombre de totalBoys
                $( '#simsWoman' ).html( totalGirls + '<b>/' + myTown.length + '</b>' );
                $( '#simsMan' ).html( totalBoys + '<b>/' + myTown.length + '</b>' );
                
                // Afficher l'âge total dans le console
                 var ageAmountRounded = Math.round( totalAge / myTown.length );
                 $( '#simsAgeAmount' ).html( ageAmountRounded + '/ans' );
            
            };     
    
    }); // Fin de la soumission du formulaire 

}); // fin de la fonction d'attente du chargement du DOM



    

