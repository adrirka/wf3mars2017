// Attendre le chargement du DOM

$( document ).ready( function(){

    // Capter la soumission du formulaire

    $( 'form' ).submit( function(evt){

        // Bloquer le comportement naturel du formulaire

        evt.preventDefault();

        // Récupérer les valeurs dans les input

        var userName = $( 'input' ).val()
            console.log( 'userName OK' );
    



    });




}); // fin de la fonction d'attente du chargement du DOM