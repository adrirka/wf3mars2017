$( document ).ready( function(){


    // Capter le click sur le 1er boutton
    $( 'button:first' ).click( function(){
   

    /* Version 2 avec .eq (=équivalent du first child en css mais sur un index 0 car en JS)
    $( 'button' ).eq(0).click( function(){
    });
    */

        // Charger le contenu de views/about.html dans la 1ere section du main 
        $( 'section' ).eq(0).load( 'views/about.html', function(){

            // Fonction de callBack de la fonction load()
            console.log( 'Le fichier about.html est chargé' );

            // Animer la première section
            $( 'section' ).eq(0).fadeToggle();
        
        });
    
    }); // Fin premier bouton

    // Capter le click sur le 2eme bouton

    $( 'button' ).eq(1).click( function(){

        // Charger dans la 2eme section le contenu de l'id portfolio de views/content.html
        $( 'section' ).eq(1).load( 'views/content.html #portfolio', function(){

            $( 'section' ).eq(1).fadeToggle();
        
        });

    }); // fin deuxieme bouton

    
    // Capter le click sur le 3eme bouton

    $( 'button' ).eq(2).click( function(){

         // Charger dans la 2eme section le contenu de l'id portfolio de views/content.html
        $( 'section' ).eq(2).load( 'views/content.html #contacts', function(){
            
            //Appeler la fonction submitForm
            submitForm();
        
        });

    }); // fin troisème bouton


    /* Créér une fonction pour capter la soumission du formulaire
    Pour rappel une fonction se définit et doit nécéssairement être appelée
    En ajax (asynchrone), notre fonction submitForm est préchargée dans la RAM du client grâce à la fonction de callBack ci dessus  et se déclenche avec le click sur le bouton. 
    La fonction est pourtant déclarée dans un second temps (code ci dessous) afin de pouvoir capter la soumission du formulaire  
    */

    
    function submitForm(){

    console.log( submitForm )

        // Capter la soumission du formulaire

        $( 'form' ).submit( function(evt){

            // Définir une variable initiale (index 0) pour la validation finale du formulaire

            var formScore = 0;
            
            // Bloquer le comportement naturel du formulaire

            evt.preventDefault();

            console.log( 'submit du formulaire' );

            // CONDITIONS requises -IF...ELSE...- : Minimum 5 caractères pour l'email et 5 caractères pour le message

            if( 
                $( '[type="email"]' ).val().length < 4
                
            ){ console.log( 'Email manquant' );

            }else{
                console.log( 'Email OK' );

                // incrémenter formScore
                formScore++;

            }; // fin de la condition email 
            
            if(
                $( 'textarea' ).val().length < 5
            
            ){ console.log( 'Message manquant' );

            }else{
                console.log( 'Message OK' );

                 // incrémenter formScore
                formScore++;

            }; // fin de la condition message

            // CONDITIONS VALIDATION -If uniquement avec une égalité stricte - : vérifier si le formulaire est validé

            if( formScore == 2 ){
              console.log( 'Le formulaire est validé !' )  
              
              // => envoi les données au server pour traitement des données PHP
                // => le server répond true : je peux continuer mon code 

                // Ajouter le message dans la balise ASIDE - avant le reset des valeurs car on en a besoin pour exécution de la fonction - (fonction APPEND pour AJOUT différente de la fonction HTML pour modification)
                $( 'aside' ).append( '<h3>' + $( 'textarea' ).val() + '</h3><p>' + $( '[type="email"' ).val() + '</p>' );
                
                //  Reset du formulaire ( Form est reconnu en tant que tableau JS par la console et ne peut pas appliquer la fonction Reset sur l'ensemble des données du tableau => il faut lui préciser un index)
                $( 'form' )[0].reset();
            };
        
        
        }); // fin de la soumission du formulaire

    
    }; // fin de la fonction submitForm
    

}); // fin de chargement du DOM