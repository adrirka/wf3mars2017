// Créer un type d'objet pour en faire des déclinaisons
function CarType( paramDoors, paramColor, paramBrand, paramGear ){ /* par convention un type d'objet a toujours une Majuscule même en début de mot */

    //  un nombre de portes, une couleur, marque, boite de vitesse
    this.doors = paramDoors;
    this.color = paramColor;
    this.brand = paramBrand;
    this.gear = paramGear; 

};

//  Ajouter une fonction au type d'objet
CarType.prototype.welcome = function(){

    console.log( 'Bonjour je suis ' + this.brand + ', je possède ' + this.doors + 'portes et ' + this.gear + 'vitesses et je suis de couleur ' + this.color )

};

// Créer une déclinaison de CarType
var fiat = new CarType( 3, 'Rouge', 'Fiat', 4 ); 
console.log(fiat);

var hummer = new CarType( 5, 'Noir', 'Boloss', 8 ); 
console.log(hummer);

// Appeler la fonction
hummer.welcome();
fiat.welcome();
