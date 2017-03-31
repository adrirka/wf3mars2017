// Attendre le chargement du DOM (en captant l'événement ready et en y intégrant une fonction de Callback => il s'agit d'une fonction appelée à la fin d'une autre fonction)

$( document ).ready( function(){

    // Créer une variable STRING pour le titre principal du site
    var siteTitle = 'Adrien Rousselet <span>Apprenant intégrateur développeur FrontEnd</span>';
    
    //Créer un tableau pour la nav
    var myNav = [ 'Accueil', 'Portfolio', 'Contacts' ];
    
    // Créer un objet pour le titre des pages
    var myTitles = {
        Accueil: 'Bienvenue sur la page d\'acccueil',
        Portfolio: 'Découvre sur mes travaux',
        Contacts: 'Contactez moi pour plus d\'informations'
    };
    
    // Créer un objet pour le contenu des pages
    var myContent = {
        Accueil: '<h3>Contenu de la page Accueil</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit quis alias earum eligendi rerum</p>',
        Portfolio: '<h3>Contenu de la page Portfolio</h3><p>accusamus porro unde soluta cupiditate quasi. Adipisci totam doloremque, officia minima necessitatibus nesciunt obcaecati eius commodi.</p>',
        Contacts: '<h3>Contenu de la page Contacts</h3><p>Adipisci totam doloremque, officia minima necessitatibus nesciunt obcaecati eius commodi.</p>'
    };

    // Aficher dans la console le header
    var myHeader = $ ( 'header' );

    // Générer une balise H1 dans le header avec le contenu de la variable siteTitle

    myHeader.append( '<h1>' + siteTitle + '</h1>' );

    //  Générer une balise nav + ul dans le header (=> création du contenant)
    myHeader.append('<nav><i class="fa fa-bars" aria-hidden="true"></i><ul></ul></nav>');

    //  Faire une boucle FOR sur myNav pour générer des liens de la nav
    for( var i = 0; i < myNav.length; i++ ){

        // Générer les balises html <li> (=> création du contenu à l'intérieur du contenant)
        $( 'ul' ).append( '<li><a href="'+ myNav[i] +'">' + myNav[i] + '</a></li>');
    };

    // Afficher dans le main le titre et le contenu issus des objets myTitles myContent
    var myMain = $( 'main' );

    myMain.append( '<h2>' + myTitles.Accueil + '</h2>');
    myMain.append( '<section>' + myContent.Accueil + '</section>')

    // Capter l''événement click sur les balises 'a' en bloquant le comportement naturel des balises 'a' (à savoir l'ouverture du lien dans l'attribut href)

    $( 'a' ).click( function(evt){

        //  bloquer le comportement naturel de la balise
        evt.preventDefault();

        // connaitre l'occurrence de la balise a sur laquelle l'utilisateur a cliqué  
        console.log( $(this) ); 

        // Récupérer dans la console la valeur de l'attribut href grâce à la fonction jquery .attr
        console.log( $(this).attr('href') );
    
        // Vérifier la valeur de l'attribut href pour afficher le bon titre
        if( $(this).attr( 'href' ) == 'Accueil' ){
            
            // Sélectionner la balise h2 pour changer son contenu
            $( 'h2' ).text( myTitles.Accueil );
            
            // Sélectionner la balise section pour changer son contenu
            $( 'section' ).html( myContent.Accueil ); // fonction .html utilisée ici versus .text car le content contient du html

        } else if( $(this).attr( 'href' ) == 'Portfolio' ){
            $( 'h2' ).text( myTitles.Portfolio );
            $( 'section' ).html( myContent.Portfolio );

        } else{
            $( 'h2' ).text( myTitles.Contacts );
            $( 'section' ).html( myContent.Contacts );

        }

        });


    
}); // fin de la fonction de chargement du DOM
