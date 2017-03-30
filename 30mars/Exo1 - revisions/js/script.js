/*
-CReer un tableau contenant 4 prénoms
-Faire une boucle sur le tableau pour saluer dans la console chacun de prénoms
-Afficher un message spécial pour votre prénom 
*/ 

var namesArray = [ 'Adrien', 'Paulo', 'Nesta', 'Bob' ];
console.log( namesArray );

for( var i = 0; i < namesArray.length; i++ ){
 
    if ( namesArray[i] == 'Adrien' ){
        console.log( 'Salut c\'est moi ' ); // on utilise un caractère d'échappement (backslash) pour conserver l'apostrophe et ne pas casser la STRING

        // pour modifier une balise HTLM
        document.querySelector( 'p' ).textContent = "Salut c'est moi !"; // comme l'exemple ci dessus on peut aussi utiliser les guillemets classiques pour ne pas casser la STRING et conserver l'apostrophe.

    }else{
        console.log( 'Salut ' + namesArray[i] );
    };

};


