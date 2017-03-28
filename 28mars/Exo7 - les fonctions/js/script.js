//  Créer une fonction sans paramètre
function helloWorld(){
    
    //  Ecrire le code à éxécuter à l'appel de la fonction 
    console.log('Bonjour le monde');
};

//  Appeler la fonction
helloWorld();

//  Créer une fonction avec paramètre
function fullName( firstName, lastName ){

    console.log('Bonjour ' + firstName + ' ' + lastName );
};

//  Appeler la fonction en précisant les paramètres
fullName( 'Adrien' );