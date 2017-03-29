var myNumber = 45;

    // Egalité SIMPLE : vérifier la valeur de la variable 
    console.log( myNumber == 45 );  // => TRUE
    console.log( myNumber == '45' ); // => TRUE car ici la console ne vérifie pas le type de valeur (STRING ou NUMBER) mais uniquement la valeur 


    //  Inégalité SIMPLE : vérifier la valeur de la variable 
    console.log( myNumber != 45 ); // => FALSE
    console.log( myNumber != '45'); // => FALSE pour les mêmes raisons qu'évoquées ci dessus
    console.log( myNumber != 12 ); // => TRUE
    console.log( myNumber != '12' ); // => TRUE 


    // Egalité STRICTE : vérifier la valeur ET le type de la variable 
    console.log( myNumber === 45 ); // TRUE car il s'agit bien de la bonne valeur définie en tant que NUMBER
    console.log( myNumber === '45' ); // FALSE car bonne valeur mais pas définie en STRING via les guillemets


    // Inégalité STRICTE : vérifier la valeur ET le type de la variable 
    console.log( myNumber !== 45 ); // FALSE
    console.log( myNumber !== '45' ); // TRUE car ce n'est pas inégal (=> il s'agit bien d'une valeur 45 de type NUMBER)

    
    // Supérieur / Inférieur
    console.log( myNumber > 46 ); // FALSE
    console.log( myNumber < 46 ); // TRUE

     // Supérieur ou égal / Inférieur ou égal
    console.log( myNumber >= 12 ); // TRUE
    console.log( myNumber <= 20 ); // FALSE

    console.log( myNumber >= 45 ); // TRUE
    console.log( myNumber <= 45 ); // TRUE 

