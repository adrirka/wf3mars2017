//  Sélection la balise h1
var myTitle = document.querySelector( 'h1 ');

// Afficher le contenu texte de la balise dans la console
console.log( myTitle.textContent );

// Modifier le contenu texte de la balise
myTitle.textContent = 'Le titre a changé'; // on ne peut pas agir sur le HTLM avec la propriété text.Content

// Sélectioner la balise #myId
var myId = document.querySelector( '#myId' );

//  Afficher le contenu HTML dans la console
console.log( myId.innerHTML ); 

// Modifier le contenu texte et HTML de la balise
myId.innerHTML = 'Contactez <b>moi</b> les gars : <a href="mailto:monadresse@contact.com">Mail</a>' // On agit à la fois sur le texte et sur le HTLM avec la propriété inner.HTML