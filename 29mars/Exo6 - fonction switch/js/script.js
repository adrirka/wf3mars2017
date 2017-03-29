/*
    Créer  une fonction qui permet à l'utilisateur de choisir une couleur
*/ 

function chooseColor(){

    //  Demander à l'utilisateur de choisir une couleur

    var userPrompt = prompt( 'Choisir une couleur entre rouge, vert et bleu' );

    // Appeler la fonction de traduction 
    translateColor( userPrompt );

};


//  Créer une fonction pour traduire les couleurs
function translateColor( paramColor ){
        
        //  Utilisation du switch
            switch( paramColor ){
                
                // 1er cas : paramColor est égale à 'rouge'
                case 'rouge' : console.log('Rouge = Red'); break;

                // 2eme cas : paramColor est égale à 
                case 'vert' : console.log('Vert = Green'); break;

                // 3eme cas : paramColor est égale à 
                case 'bleu' : console.log('Bleu = Blue'); break;
            
                // pour tous les autres cas : DEFAULT est OBLIGATOIRE avec la fonction SWITCH
                default: console.log('Je ne connais pas cette couleur'); break;
        }


};
