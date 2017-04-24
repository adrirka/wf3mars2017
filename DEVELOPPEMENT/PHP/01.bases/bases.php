<style>
    h2{
        font-size: 15px; 
        color : red;
    }
</style>

<?php 


//---------------------------------
echo '<h2> Les balises PHP </h2>';
//---------------------------------

// Echo signifie 'tu affiches dans le navigateur client le STRING donné sous forme de balises HTML données entre quotes'

?>

<?php
// Pour ouvrir un passage en PHP on utilise la balise précédente
// Pour fermer un passage en PHP on utilise la balise suivante 
?>

<strong>Bonjour</strong>
<!-- En dehors des balises ouverture/fermeture du PHP nous pouvons écrire du HTML -->


<?php 


//---------------------------------------
echo '<h2> Ecriture et affichage </h2>';
//---------------------------------------

echo 'Bonjour'; // echo est une instrution qui permet d'effectuer un affichage. Notez que les instructions se terminent par ";"
echo '<br>'; // on peut mettre des balises HTML dans un echo, elles sont interprétées comme telles.

print 'Nous sommes jeudi'; // print est une autre instruction d'affichage.'

// Pour info, il existe d'autres instructions d'affichage pour la phase de DEVELOPPEMENT et non pas sur un site finalisé côté client en HTML contrairement à echo et print (cf plus loin)
// print_r(); 
// var_dump();


//--------------------------------------------------------------
echo '<h2> Variables : types / déclaration / affectation </h2>';
//--------------------------------------------------------------

// Définition : une variable est un espace mémoire nommé qui permet de conserver une valeur.
// En PHP, on déclare une variable avec le signe $

$a = 127; // je déclare la variable a, et je lui affecte la valeur 127
// Le type de la variable a est INTeger (entier)

$b = 1.5; // un type double pour nombre à virgule

$c = 'une chaine de caractères'; // type string pour une chaine de caractères
$d = '127'; // il s'agit aussi d'un string car entre quotes 

$e = true; // type boolean qui prend que deux valeurs possibles : true or false


//--------------------------------------------------------------
echo '<h2> Concatenation </h2>';
//--------------------------------------------------------------

$x = 'Bonjour';
$y = 'tout le monde';
echo $x . $y . '<br>'; // point de concaténation que l'on peut traduire par 'suivi de'

echo "$x $y <br>"; // Ici c'est aussi une STRING. Mais situé entre guillemet une variable est évaluée et interpretée tandis qu'entre quote elle affiche stricto sensu le contenu (cf chapitre spécifique plus loin dans ce cours)'

    // -------------------
    // Concatenation lors de l'affectation : 
    // -------------------
$prenom1 = 'Bruno'; // ici la variable $prenom1 
$prenom1 = 'Claire'; // ici la valeur "Claire" écrase la valeur précédente "Bruno" 
echo $prenom1 . '<br>'; // affiche Claire

$prenom2 = 'Bruno';
$prenom2 .= 'Claire'; // on affecte la valeur "Claire" à la variable prenom en l'ajoutant à la valeur précédemment contenue dans la variable grâce à l'opérateur .=
echo $prenom2 . '<br>'; // affiche Bruno Claire


//--------------------------------------------------------------
echo '<h2> Guillemets et quotes </h2>';
//--------------------------------------------------------------

$message = "ajourd'hui"; // ou bien : 
$message = 'aujourd\hui'; // dans les quotes on échappe les apostrophes avec l'anti-slash (alt gr + 8)

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // les variables sont évaluées quand elles sont présentes dans des guillemets, c'est leur contenu qui est affiché
echo '$txt tout le monde <br>';  // dans les quotes simples on affiche littéralement le contenu de la variable : elles ne sont pas évaluées

//--------------------------------------------------------------
echo '<h2> Constantes </h2>';
//--------------------------------------------------------------

// Une constante permet de conserver une valeur qui ne peut pas (ou ne doit pas) être modifiée durant la durée du script. Très utile pour garder de manière certaine la connexion à une BDD ou le chemin du site par exemple.

define("CAPITALE", "Paris"); // par convention on écrit toujours le nom des constantes en MAJUSCULES
echo CAPITALE . '<br>'; // affiche Paris

// Constantes magiques
echo __FILE__ . '<br>'; // affiche le chemin complet du 
echo __LINE__ . '<br>'; // affiche la ligne à laquelle on est 
 

//--------------------------------------------------------------
echo '<h2> Opérateur arithmétiques </h2>';
//--------------------------------------------------------------
$a = 10;
$b = 2;

echo $a + $b . '<br>'; // affiche 12 
echo $a - $b . '<br>'; // affiche 8
echo $a * $b . '<br>'; // affiche 20 
echo $a / $b . '<br>'; // affiche 5
echo $a % $b . '<br>'; // '%' = modulo - affiche 0

    // -------------------
    // Opération et affectation combinées : 
    // -------------------
$a += $b; //$a vaut 12 car équivaut à $a = $a + $b soit 10 + 2
$a -= $b; //$a vaut 10 car équivaut à $a = $a - $b soit 12 - 2
$a *= $b; //$a vaut 20 
$a /= $b; //$a vaut 10 
$a %= $b; //$a vaut 0

    // -------------------
    // Incrémentation et décrémentation
    // -------------------
$i = 0;
$i++; // incrémentation de $i de +1 (vaut 1)
$i--; // décrémentation de $i de -1 (vaut 0)

$k = ++$i; // la variable est incrémentée de 1; puis elle est affectée à $k
echo $i . '<br>'; // 1
echo $k . '<br>'; // 1

$k = $i++; // la variable $i est d'abord affectée à $k puis incrémentée de 1
echo $i . '<br>'; // 2
echo $k . '<br>'; // 1


//--------------------------------------------------------------
echo '<h2> Structures conditionnelles et opérateurs de comparaison </h2>';
//--------------------------------------------------------------

$a = 10; $b = 5; $c = 2;

if($a > $b) { // si la condition renvoie true, on exécute les accolades qui suivent : 
    echo '$a est bien supérieur à $b <br>';
}else{ // sinon (si la condition renvoie false) on exé le else : 
    echo 'Non c\'est $b qui est supérieur à $a <br>';
}

    //----------
$a = 10; $b = 5; $c = 2;
if ($a > $b && $c){ // && signifie ET
    echo 'Les deux conditions sont vraies <br>';
}

    //----------
$a = 10; $b = 5; $c = 2;
if ($a == 9 || $b > $c){ // l'opérateur de comparaison égalitaire est == et l'operateur OU s'écrit ||'
    echo 'Ok pour une des deux deux conditions <br>';
}else{
    echo 'Les deux conditions sont fausses <br>';
}

    //----------
$a = 10; $b = 5; $c = 2;
if ($a == 8){
    echo 'Reponse 1 <br>';
}else if ($a != 10){ // sinon si $a est différent de 10, on exécute les accolades qui suivent : 
    echo 'Reponse 2 <br>';
}else{ // sinon, si les conditions précédents sont fausses, on exécute les accolades qui suivent : 
    echo 'Réponse 3 <br>'; // on entre ici dans le else
} 

    //----------
if ($a == 10 XOR $b == 6){
    echo 'ok pour la condition exclusive <br>'; // si les deux conditions sont vraies ou les deux conditions sont fausses en même temps, nous n'entrons pas dans les accolades'
}

// Pour que la condition s'exécute il faut que l'une des soit vraie, mais pas les deux en même temps 

    //----------
    // condition ternaires (forme contractée de la condition) :
echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';  // le ? remplace le "if" et le ":" remplace le else. Si a vaut 10 on fait un écho du premier STRING, sinon du second.

    //----------
    // Différence entre == et === :
$vara = 1; // INTegrer 
$varb = '1'; // simplexml_load_string

if ($vara == $varb){
    echo 'il y a égalité en valeur entre les deux variables <br>';
}

if ($vara === $varb){
    echo 'il y a égalité en valeur ET en type entre les deux variables <br>';
}

// Avec la présence du triple =, la comparaison ne fonctionne pas car les variables ne sont du même type : on compare un INTeger avec un string.
// Avec le double = on ne compare que la valeur : ici la comparaison est donc juste.


/* REMINDER
= signe d'affectation 
== comparaison en valeur
=== comparaison en valeur et en type
*/

    //----------
    // empty() et isset() : 
    // empty() : teste si c'est vide (c'est à dire à, '', NULL, false ou non défini)
    // isset() : teste si c'est défini et a une valeur non NULL

$var1 = 0;
$var2 = ''; // chaine vide sans espace

if (empty($var1)) echo 'on a 0, vide, ou non définie <br>';
if (isset($var2)) echo 'var2 existe bien <br>';

//différence entre empty et isset : si on met les lignes 204 et 205 en commentaire (pour les neutraliser), empty reste vrai car $var1 n'est pas définie, alors que isset est faux car $var2 n'est pas définie

// empty sera utilisé pour vérifier, par exemple, que les champs d'un formulaire sont remplis. isset permettra par exemple de vérifier l'existence d'un indice dans un array avant de l'utiliser.

        //----------En version PHP 5
$var1 = isset($maVar) ? $maVar : 'valeur par défaut'; //dans cette ternaire, on affecte la valeur de $maVar à $varl si (représentée par le "?") elle existe. Celle-ci n'existant pas (sinon représentée par le ":"), on lui affecte 'valeur par défaut'
echo $var1 . '<br>'; // affiche 'valeur par défaut'

        //----------En version PHP7:
$var2 = $maVar ?? 'valeur par défaut'; // on fait exactement la même chose mais en plus court : le "??" signifie "soit l'un soit l'autre", "prend la première valeur qui existe"
echo $var2 . '<br>';

$var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas d\'info'; // soit on prend le pays s'il existe, sinon on prend la ville si elle existe, sinon on prend 'pas d'info' par défaut
echo $var3 . '<br>';

//--------------------------------------------------------------
echo '<h2> condition switch </h2>';
//--------------------------------------------------------------

// Dans le switch ci_dessous, les "cases" représentent les cas différents dans lesquels on peut potentiellement tomber.
$couleur = 'jaune';

switch($couleur){
    case 'bleu' : echo 'vous aimez le bleu'; break;
    case 'rouge' : echo 'vous aimez le rouge'; break; 
    case 'vert' : echo 'vous aimez le vert'; break;
    default : echo 'vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}

// Le switch compare la valeur de la variable entre parenthese à chaque case. Lorsqu'une valeur correspond, on exécute l'instruction en regard du case, puis le break indique qu'il faut sortir de la condition.
// Le default correspond à un else : on l'exécute par défaut quand aucun case ne correspond.

// EXERCICE écrivez la condition switch ci_dessous avec des if
$couleur = 'jaune';

if ($couleur == 'jaune' ){
    echo 'vous aimez le jaune';
}else if ($couleur == 'bleu'){ 
    echo 'vous aimez le bleu';
}else if ($couleur == 'rouge'){ 
    echo 'vous aimez le rouge';
}else if ($couleur == 'vert'){ 
    echo 'vous aimez le vert';
}else{ 
    echo 'vous n\'aimez ni le jaune ni le bleu ni le rouge ni le vert <br>';
} 

//--------------------------------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';
//--------------------------------------------------------------
// Une fonction prédéfinie permet de réaliser un traitement spécifique qui est prévu dans le langage 

    //----------
echo '<h2>Traitement des chaines de caractères (strlen, strpos, substr)</h2>';

$email1 = 'prenom@site.fr';

echo strpos($email1, '@') . '<br>'; // strpos() indique la position 6 du caractère "@" dans la chaine $email1 (comptée à partir de l'index 0). Pour RAPPEL le '.' permet la CONCATENATION
echo strpos('Bonjour', '@'); // affiche rien : on ne voit pas le echo de false d'ou le var_dump ci dessous
var_dump(strpos('Bonjour', '@')); // var _dump permet d'afficher le contenu de l'argument entre parenthèse (donc en l'occurrence ce que retourne strpos)
echo '<br>';

// Quand j'utilise une fonction prédéfinie, il faut se demander quels sont les arguments à lui fournir pour qu'elle s'exécute correctement et ce qu'elle peut retourner comme résultat.
// Dans l'exemple de strpos() : succès => INTeger, échec => booléen false'

    //----------
$phrase = 'Mettre une phrase à cet endroit';
echo strlen($phrase) . '<br>'; // affiche la longueur du string : succès => INTeger, echec => false;

    //----------
$texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus velit ex dignissimos quos aliquam dolore totam illum, fugiat debitis culpa doloremque, quis consequatur impedit, recusandae harum labore, possimus consequuntur esse.';
echo substr($texte, 0, 20) . '...<a href="">Lire la suite</a><br>'; // on découpe une partie du texte et on lui concatène un lien. Succès => string, echec => false.

    //----------
echo str_replace('site', 'gmail', $email1) . '<br>'; // remplace 'site' par 'gmail' dans le string contenu dans $email1

    //----------
$message ='      Hello World        ';
echo strtolower($message) . '<br>'; // passe le string en minuscule
echo strtoupper($message) . '<br>'; //passe le string en majuscule

echo strlen($message) . '<br>';
echo strlen(trim($message)) . '<br>';


//--------------------------------------------------------------
echo '<h2> Le manuel PHP en ligne </h2>';
//--------------------------------------------------------------
// Le manuel PHP en ligne
// http://php.net/manual/fr/


//--------------------------------------------------------------
echo '<h2> Gestion des dates </h2>';
//--------------------------------------------------------------
echo date('d/m/Y H:i:s') . '<br>'; // affiche la date et heure de l'instant selon le format indiqué : d = day, m = month, Y = year sur 4 chiffres, y = year sur 2 chiffres, H = heures sur 24H, i = minutes, s = secondes'. On peut choisir les séparateurs.$_COOKIE

echo time() . '<br>'; // retour le timestamp actuel = nombre de secondes écoulées depuis le 01/01/1970 à 00:00:00 (création théorique de UNIX).

// La fonction prédéfinie strtotime() :
$dateJour = strtotime('10-01-2016'); // retourne le timestamp de la date indiquée
echo $dateJour . '<br>';

// La fonction strftime() : 
$dateFormat = strftime('%Y-%m-%d', $dateJour); // transforme le timestamp donnée en date selon le format indiquée, ici YYYY-MM-BDD
echo $dateFormat . '<br>'; // affiche 2016-01-10

// Exemple de conversion de format de date 
// TRansformer 23-05-2015 en 2015-03-25
echo strftime('%Y-%m-%d', strtotime('23-05-2015'));

echo '<br>';

// Cette méthode de transformation est limitée dans le temps (2038)... on peut donc utiliser une autre méthode avec la classe DateTime:

$date = new DateTime('11-04-2017');
echo $date->format('Y-m-d');
// DateTime est une classe que l'on peut comparaer à un plan ou un modème qui sert à construire des objets "date"
// On construit un objet "date" avec le mot new, en indiquant qui nous intéresse entre parenthèses. $date est donc un objet "date".
// CEt objet bénéficie de méthodes (=fonctions) offertes par la classe; il y a entre autres, la méthode format() qui permet de modifier le format d'une date. Pour appeler cette méthode sur l'objet $date, on utilise la flèche "->"


//--------------------------------------------------------------
echo '<h2> Les fonctions utilisateurs </h2>';
//--------------------------------------------------------------

// Les fonctions qui ne pas prédéfinies dans le langage sont déclarées puis exécutées par l'utilisateur.

// Déclaration d'une fonction
function separation(){
    echo '<hr>';
}

// Appel de la fonction par son nom: 
separation(); // ici on exécute la fonction

    //----------
    // Fonction avec arguments : les arguments sont paramètres fournis à la fonction et lui permettent de compléter ou modifier son comportement initialement prévu 
function bonjour($qui){
    return 'Bonjour '. $qui . '<br>'; // return permet de renvoyer ce qui suit le return à l'endroit ou la fonction est appelée
}

    // Appel de la fonction avec un echo
echo bonjour('Pierre'); // on appelle la fonction en lui donnant le string 'Pierre' en argument => Affiche 'Bonjour Pierre'

$prenom = 'Etienne';
echo bonjour ($prenom); // l'argument peut être une variable : affiche 'Bonjour Etienne'


    //----------
    // Exercice :
function appliqueTva($nombre){
    return $nombre *1.2;
}

// Ecrivez une fonction appliqueTva2 sur la base de la précédente, mais en donnant la possibilité de calculer un nombre avec le taux de notre choix.

function appliqueTva2($nombre, $taux){ // on ne peut pas déclarer une fonction avec le même nom.
    return $nombre * $taux;
}

echo 'Ma TVA est de ' . appliqueTva2(1.5, 2) . '<br>'; // lorsqu'une fonction attend des arguments, il faut obligatoirement les lui donner


    //----------
    // Exercice :
function meteo($saison, $temperature){
    echo "Nous sommes en $saison et il fait $temperature degre(s) <br>";
}

meteo('hiver', 2);
meteo('printemps', 2);

// CRéer une fonction meteo2 qui permet d'afficher "au printemps" quand il s'agit du printemps

// Methode 1 : avec fonction if mais code non optimisé car répétition du echo
function meteo2($saison, $temperature){
    
    if($saison == 'printemps'){
        echo "Nous sommes au $saison et il fait $temperature degre(s) <br>";
    }else{
        echo "Nous sommes en $saison et il fait $temperature degre(s) <br>";
    }
}

meteo2('printemps', 2);

// Methode 2 : oavec fonction if - code optimisé par la création d'une autre $variable dédiée à l'article 
function meteo2bis($saison, $temperature){
    
    if($saison == 'printemps'){
        $article = 'au';
    }else{
        $article = 'en';
        echo "Nous sommes $article $saison et il fait $temperature degre(s) <br>";
    }
}

meteo2bis('printemps', 2);

// Methode 3 : avec fonction ternaire (forme contractée de la condition if)
function meteo3($saison, $temperature){
    
    $article = ($saison == 'printemps') ? 'au' : 'en'; //  : ? = if et : = else
    echo "Nous sommes $article $saison et il fait $temperature degré(s) <br>";
}
    
meteo3('printemps', 2);
meteo3('hiver', 3);

    //----------
    // EXERCICE

function prixLitre(){
    return rand(1000,2000)/1000; // détermine un prix aléatoire entre 1 et 2€ :e le return() permet de sortir de la fonction
}

    // Ecrivez la fonction factureEssence() qui calcule le prix total de votre facture d'essence en fonction du nombre de litres que vous lui donnez. Cete fonction retourne la phrase "Votre facture est de X euros pour Y litres d'essences" (X et Y sont variables).
    // Dans cette fonction, utilisez la fonction prixLitre() qui vous retourne le prix du litre d'essence

function factureEssence($volumeY){
    $totalFacture = $volumeY * prixLitre();
    echo "Votre facture est $totalFacture euros pour $volumeY litres d'essences <br>";
}

factureEssence(50);



//--------------------------------------------------------------
echo '<h2> Les variables locales et globales </h2>';
//--------------------------------------------------------------

function jourSemaine(){
    $jour = 'vendredi'; // ici ans la fonction nous sommes dans un espace LOCAL. La variable $jour est donc LOCALE
    return $jour;
}

// a l'exterieur de la fonction je dans l'espace GLOBAL.

// echo $jour; // je ne peux pas utiliser une variable locale dans l'espace global.
echo jourSemaine() . '<br>'; // on peut cependant récupérer la valeur de $jour grâce au retunr qui est au sein de la fonctuion et à l'appel de cette fonction

//----------
$pays = 'France'; // variable global 
function affichagePays(){
    global $pays; // le mot clé global permet de récupérer une variable provenant de l'espace global au sein de l'espace local de la fonction 
    echo $pays; // on peut donc utiliser cette variable $pays
}

affichagePays();


//--------------------------------------------------------------
echo '<h2> Les structure itératives : boucles </h2>';
//--------------------------------------------------------------

    // boucle while
$i = 0; // valeur de départ de la boucle
while ($i < 3){ // tant que $i est inférieur à 3, j'exécute les accolades qui suivent 
    echo "$i---";
    $i++; // on n'oublie pas d'incrémenter $i pour que la boucle ne soit pas infinie (il faut que la condition puisse devenir false à un moment donné)
}
echo '<br>';

    // ----------
    // EXERCICE : modifier la boucle while ci dessus en faisant en sorte que les "---" s'arrêtent après le 2
$ii = 0; 
while ($ii < 3){ 
    if($ii == 2){
         echo "$ii";
    }else{
         echo "$ii---";
    }
    $ii++; 
}

echo '<br>';

    // ----------
    // EXERCICE : à l'aide d'une boucle while, afficher dans un sélecteur les années depuis l'année en cours moins 100ans et jusqu'à l'année en cours : 1917 => 2017'

// Methode 1 : ici la balise HTML <select> est inclus dans le PHP (nous aurions pu choisir de l'en exclure en fermant et en réouvrant le php -voir en méthode 2')

echo '<select>';
$annee = 2017;
    while($annee >= 1917){
        echo "<option>$annee</option>"; // RAPPEL mettre des guillemet pour évaluer la variable, sinon si on part sur de simples quotes, il faut concaténer
        $annee--;
    }
echo '</select>';

echo '<br>';

// Methode 2 : code dynamique avec un paramètre défini PHP en l'occurence l'année Y. On notera ici que la balise <select> est en dehors du PHP.

?>

<select>
<?php
$year = date('Y') - 100; // équivaut à 1917
while($year <= date ('Y')){
    echo "<option>$year</option>";
    $year++;
}
echo '<br>';
?>
</select>

<?php

    // boucle do while
// La boucle do while a la particularité de s'exécuter au moins UNE fois, puis tant que la condition de fin est vraie
echo '<br>Boucle do while<br>';

do{
    echo 'un tour de boucle';
}while (false); // on met la condition pour exécuter les tours de boucle ici  à la place de false. Dans ce cas précise, on voit que l'on effectue un tour de boucle bien que la condition soit fausse?

// Noter la présence du ";" à la fin de la boucle do while (contrairement aux autres structures itératives).

    // boucle for
echo '<br>';
for ($j = 0; $j < 16; $j++){ // dans la boucle for (initialisation de la valeur de départ; condition d'entreée dans la boucle; incrémentation (ou décrémentation))
    print $j . '<br>';
}


    // ----------
    // EXERCICE 

    // 1. faire une boucle qui affiche 0 à 9 sur la même ligne 
for ($l = 0; $l < 10; $l++){ 
    print $l;
}

    // 2. faites la même chose mais dans un tableau HTML


echo '<table border="1"><tr>'; 
            for ($ll = 0; $ll < 10; $ll++){ 
                print "<td>$ll</td>";
            }
echo '</tr></table>';

    // 3. faites un tableau HTML de 10 colonnes sur 10 lignes à partir du code précédent  

//methode boucle for 
echo '<table border="1">';
    for ($p = 0; $p <= 9; $p++){ // on crée une boucle for qui gère la répétition des dix lignes

        echo '<tr>'; 
            for ($pp = 0; $pp < 10; $pp++){  //on créé une boucle for qui gère la première ligne et les 10 colonnes
                    print "<td>$pp</td>";
            }   
        echo '</tr>';
    }
echo '</table>';

// methode boucle while
echo '<hr>';

echo '<table border="1">';
    // on fait une boucle pour les lignes : 
    $ibis = 0;
    while($ibis < 10){
        echo '<tr>';
            //on fait une boucle for pour les colonnes
            for($c = 0; $c <= 9; $c++){
                print "<td>$c</td>";
            }
        $ibis++;
        echo '</tr>';
    }
echo '</table>';



//--------------------------------------------------------------
echo '<h2> Les arrays ou tableaux </h2>';
//--------------------------------------------------------------

// On peut stocker dans un array une multitude de valeurs, quelque soit leur type.

$liste = array('gregoire', 'nathalie', 'emilie', 'françois', 'georges'); // déclaration d'un array appelé $liste contenant des prénoms

// echo $liste // erreur car on ne peut pas afficher directement le contenu d'un array'

echo '<pre>'; var_dump($liste); echo '</pre>';// la balise <pre> met en forme succinctement 
echo '<pre>'; print_r($liste); echo '</pre>';

// Ces deux instructions d'affichage permettrent d'indiquer le type de l'élément mis en argument, ainsi que son contenu. Les balises <pre> servent à faire une mise en forme. Notez que ces deux instructions ne sont utilisées qu'en phase de développement'

// Autre moyen d'affecter des valeurs dans un tableau
$tab[] = 'France'; // permet d'ajouter la valeur 'France' dans le tableau $tab
$tab[] = 'Italie'; 
$tab[] = 'Espagne'; 
$tab[] = 'Portugal';

echo '<pre>'; print_r($tab); echo '</pre>'; // pour voir le contenu du tableau

// Pour afficher la valeur ITalie qui se situe à l'indice 1!
echo $tab[1] . '<br>'; // affiche Italie 

    // ----------
    // tableau associatif : tableau dont les indices sont littéraux : 
$couleur = array ("j" => "jaune", "b" => "bleu", "v" => "vert"); // on peut choisir le nom des indices 

// Pour accéder à un élément du tableau associatif :
echo 'La seconde couleur de notre tableau est le '. $couleur['b'] . '<br>'; // affiche bleu
echo "La seconde couleur de notre tableau est le $couleur[b] <br>"; // affiche bleu. Un array écrit entre guillemet perd ses quotes autours de son indice. On remarquera ici l'absence de concatenation car entre guilletmet les balises sont évaluées/interpretées.

    // ----------
    // Mesurer la taille d'un array : 
echo 'taille du tableau : ' . count($couleur) . '<br>'; // compte le nombre d'éléments dans l'array $couleur, ici 3
echo 'taille du tableau : ' . sizeof($couleur) . '<br>'; // compte le nombre d'éléments dans l'array $couleur, ici 3 (équivalent à la fonction count() ci dessus)

    // ----------
    // Transformer un array en string:
$chaine = implode('-',  $couleur); // implode() rassemble les éléments d'un array en une chaine séparés par le séparateur '-' ici
echo $chaine . '<br>';

$couleur2 = explode('-', $chaine); // explode() transforme une chaine en array en séparant les éléments grâce au séparateur indiqué (ici un "-"). $couleur2 est un array aux indices numériques
print_r($couleur2);

    // ----------
    // La boucle foreach est un moyen simple de passer en revue un tableau. 
    // Elle fonctionne uniquement sur les arrays et les objets. Et elle a l'avantage d'être "automatique", s'arrêtant quand il n'y a plus d'éléments'
echo '<pre>'; print_r($tab);

foreach($tab as $valeur) { // la variable $valeur récupère à chaque tour de boucle les valeurs qui sont parcourues dans l'array $tab. ["parcourt l'array $tab par ses valeurs"]
    echo $valeur . '<br>';
}

foreach($tab as $indice => $valeur) { // on parcourt l'array $tab par ses indices auxquels on associe les valeurs. Quand il y deux variables, la 1ere parcourt des indices, et la seconde la colonne des valeurs. Ces variables peuvent avoir n'importe quel nom.
    echo $indice . ' correspond à ' . $valeur . '<br>';

}

//--------------------------------------------------------------
echo '<h2> Les arrays multidimensionnels </h2>';
//--------------------------------------------------------------

// Nous parlons de tableaux multidimensionnels quand un tableau est un contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel:
$tab_multi = array(
    0 => array('prenom' => 'julien', 'nom' => 'Dupon', 'telephone' => '06 00 00 00'),
    1 => array('prenom' => 'Nicolas', 'nom' => 'Duran', 'telephone' => '06 00 00 00'),
    2 => array('prenom' => 'Pierre', 'nom' => 'Duchmol')
);

echo '<pre>'; print_r($tab_multi); echo '<pre>';

// Accéder à la valeur Julien : 
echo $tab_multi[0]['prenom'] . '<br>'; // affiche Julien : nous entrons d'abord à l'indice 0 pour aller ensuite dans l'autre tableau à l'indice 'prenom'. Notez que le 'prenom' est un string.

// Parcourir le tableau multidimensionnel avec une boucle for : 
for ($i = 0; $i < count($tab_multi); $i++){
    echo $tab_multi[$i]['prenom'] . '<br>';
}

// Exercie : afficher les prénoms et les noms avec boucle foreach
foreach($tab_multi as $ind => $val){ 
    
    // 1ere version en passant par la valeur : 
    // print_r($valeur);
    echo $val['prenom'] . '<br>' . $val['nom'] . '<br>';

    // 2nd version en passant par l'indice
    echo $tab_multi[$ind]['prenom'] . '<br>';
}


//--------------------------------------------------------------
echo '<h2> Les inclusions de fichiers </h2>';
//--------------------------------------------------------------

echo 'Première inclusion';
include('exemple.inc.php'); // on inclut le fichier dont le chemin est spécifié ici

echo'<br>deuxieme inclusion';
include_once('exemple.inc.php'); //avec le once, on vérifie d'abord si le ficbhier n'est pas déjà inclus, avant de faire l'inclusion (évite par exemple de redéclarer des fonctions en incluant 2 fois le même fichier)

echo '<br>Troisieme inclusion';
require('exemple.inc.php'); // require fait la même chose que include mais génère une erreur de type fatale, s'il ne parvient pas à inclure le fichier qui interrompt l'exécution du script. En revanche, i nclude génère une erreur de type warnong dans ce cas, ce qui n'interrompt pas la suite de l'exécution du script.$_COOKIE

echo '<br>Quatrieme inclusion';
require_once('exemple.inc.php'); // avec le once, on vérifie d'abord si le fichier n'est pas déjà inclu avant de faire l'inclusion

// Le ".inc" du nom fichier est là à titre indicatif pour préciser qu'il s'agit d'un fichier inclus et non pas d'un fichier directement utilisé.


//******************************************************************

