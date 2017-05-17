/*
FONCTION READY A CONNAITRE PAR COEUR
*/


//  Attendre le chargement du DOM
$(document).ready(function(){


// Code à exécuter sur la page une fois chargé

    /*
    Le deathSelector (=sélector de la mort :) - juste pour illustration que l'on peut parcourir l'ensemble des balises du DOM )
    */ 

    var deathSelector = $( 'h3' ).prev().parent().parent().next().parent().find( 'main' ).children( 'article' ).find( 'h3' ); // .parent.parent pour le parent du parent
    console.log( 'Balise sélectionnée : ', deathSelector )

    
    /*
    Les sélecteurs JQuery "classiques"
    */ 
    

        // Sélection une ou des balises par son nom (=tag)

        var myHtmlTag = $( 'header' );
        console.log( myHtmlTag );

        // Sélection une ou des balises par sa class

        var myClass = $( '.myClass' );
        console.log( myClass );

        // Sélection une ou des balises par son id

        var myId = $( '#myId' );
        console.log( myId );

        //  Sélecteur imbriqué

        var myItalic = $( 'h2 i' )
        console.log( myItalic );

        //  Sélecteur css3

        var myFooter = $( 'body > main + footer' );
        console.log( 'myFooter' );


        /*
        Les sélecteurs JQuery spécifiques
        */ 

        // Sélecteur d'enfants
        var myChildren = $( 'header' ).children( 'button' )
        console.log( myChildren );

        // Sélecteur de parents
        var myParent = $( 'h2' ).parent(); // rien n'est précisé dans la parenthèse car le parent c'est le parent ...
        console.log( myParent );

        // Trouver une balise 
        var myH2 = $( 'main' ).find( 'h2' );
        console.log( myH2 );

        //  Sélectionner le premier 
        var firstBtn = $( 'button:first' );
        console.log ( firstBtn );

        //  Sélectionner le dernier 
        var lastBtn = $( 'button:last' );
        console.log ( lastBtn );

        // Sélectionner le nth (=Nième) balise
        var secondLi = $( 'li' ).eq(1); //eq est l'équivalent Jquery du nth-child() en css. La valeur indexe est à 1 pour sélection de la deuxième <li> car le 0 est pris en compte
        console.log( secondLi );

        //  Sélectionner la balise suivante 
        var afterMain = $( 'main' ).next();
        console.log( afterMain );

        //  Sélectionner la balise suivante 
        var beforeMain = $( 'main' ).prev();
        console.log( beforeMain );

}); // Fin de la fonction d'attente du chargement du DOM





