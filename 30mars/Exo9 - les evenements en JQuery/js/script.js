// Capter l'événement ready pour y ajouter une fonction de callback (attendre le chargement du DOM)
$(document).ready( function(){ // function dans les exemples évoqués ici est une fonction dite de "callback"

// Capter l'événement focus sur le textarea
$( 'textarea' ).focus( function(){
    console.log( "Minimum 10 caractères" )
});

// Capter l'événement blur sur le textarea
$( 'textarea' ).blur( function(){
    console.log( "l'utilisateur est sorti du focus" )
});

// Capter l'événement scroll sur le header
$( 'header' ).scroll( function(){
    console.log( 'scroll' )
});

// Capter l'événement hover sur le main
$( 'main' ).hover( function(){
    console.log( "l'utilisateur est au-dessus du main" )
});

// Capter l'événement click sur ma balise a 
$( 'a' ).click( function(evt){ // evt variable pour évenement

    // Empêcher le comportement naturel de la balise a (soit une ouverture de la page Google dans une autre page)
    evt.preventDefault();

    console.log( 'Click sur la balise a' );
});

// Capter la soumission du formulaire
$( 'form' ).submit( function(evt){

    // Bloquer le comportement naturel du formulaire
    evt.preventDefault();

    console.log( 'Vérifier les inputs/textarea avt de les envoyer dans le fichier de traitement PHP' )

});

}); // Fin de l'attente de chargement du DOM