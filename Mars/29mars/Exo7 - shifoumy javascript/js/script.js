/* 

Le chifoumy 
-l'utilisateur doit choisir entre pierre, feuille et ciseaux
-l'ordinateur doit choisir entre pierre, feuille et ciseaux
-Nous comparons le choix de l'utilisateur et de l'ordinateur 
-selon le résultat, l'utilisateur a gagné ou l'ordinateur a gagné
-une partie se joue en 3 manches

*/ 

// Variable globale pour le choix de l'utilisateur
var userBet = '';
var userWin = 0;
var computerWin = 0;

/*
#1 l'utilisateur doit choisir entre pierre, feuille et ciseaux
-CRééer une fonction qui prend en paramètre le choix de l'utilisateur
-Appeler la fonction au clic sur les bouttons du DOM
-Afficher le résultat dans la console 
*/ 

// Création d'une fonction avec le keyword "function", attribution d'un nom et d'un paramètre
function userChoice( paramChoice ){
    
    // Assigner à la variable userBet la valeur de paramChoice
    userBet = paramChoice;

};


/*
#2 L'ordinateur doit choisir entre pierre, feuille et ciseaux
-Faire une fonction pour déclencher le choix au clic sur un bouton
-Créer un tableau contenant 'pierre', 'feuille' et 'ciseaux'
-Faire en sorte de choisir aléatoirement l'un des trois index du tableau
-Afficher le résultat dans la console
*/ 


// Faire une fonction pour déclencher le choix au clic sur un bouton => création de la fonction sans paramètre, et édition du HTML

function computerChoice(){

    // Créer un tableau contenant 'pierre', 'feuille' et 'ciseaux'

    var computerMemory = [ 'pierre', 'feuille', 'ciseaux' ];

    //  Choisir aléatoirement l'un des 3 index du tableau

    var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];

    //  Vérifier si userBet est vide 
    if( userBet == '' ){
        document.querySelector( 'h2' ).innerHTML = 'Choisi ton <i>arme</i>'; // innerHTML est équivalent au textContent ci-dessous mais on peut agir sur le texte via une balise HTML (ici italique <i></i>)
    } else{

        // Afficher les deux choix dans la balise H2
        document.querySelector( 'h2' ).textContent = userBet + ' vs. ' + computerBet; // le keyword 'Document' fait référence à l'ensemble du DOM HTML. Le querySelector est utilisé pour sélectionner une balise dans le DOM (dans notre cas le H2)

        //  comparer les variables (en utilisant if...else if plutôt que la fonction switch)
        if( userBet == computerBet ){
            document.querySelector( 'p' ).textContent = 'Egalite';

        } else if( userBet == 'pierre' && computerBet == 'ciseaux' ){
            document.querySelector( 'p' ).textContent = 'Gagné!';

        //   Incrementer la variable userWin de 1 (initialement à 0)
        userWin++;

        } else if( userBet == 'feuille' && computerBet == 'pierre' ){
            document.querySelector( 'p' ).textContent = 'Gagné!';

        //   Incrementer la variable userWin de 1
        userWin++;

        } else if ( userBet == 'ciseaux' && computerBet == 'feuille' ){
            document.querySelector( 'p' ).textContent = 'Gagné!';

        //   Incrementer la variable userWin de 1
        userWin++;

        } else{
            document.querySelector( 'p' ).textContent = 'Perdu...';

        //   Incrementer la variable computerWin de 1
        computerWin++;
        
        };

    };

    // Vérifier les valeurs de userWin et computerWin
    if( userWin == 3 ){
        console.log( 'La partie est gagnée' );
        // Afficher le message dans le body
        document.querySelector( 'body' ).innerHTML = '<h1>Vous avez gagné !</h1><a href="index.html">Rejouer</a>'
    };

    if( computerWin == 3){
        console.log( 'La partie est perdue ...' );
        // Afficher le message dans le body
        document.querySelector( 'body' ).innerHTML = '<h1>Vous avez perdu ...</h1><a href="index.html">Rejouer</a>'
    };
};

    







