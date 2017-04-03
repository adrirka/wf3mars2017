//  Attendre que la page HTLM (=le DOM) soit chargée dans le navigateur
$( document ).ready( function(){

    // LE code de la page est à intégrer dans la fonction de callback
    console.log( 'Le DOM est chargé' );

}); // Fin de la fonction d'attente de chargement du DOM

console.log( 'Le DOM n\'est pas chargé' );
