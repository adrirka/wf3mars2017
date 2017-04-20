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

// Pour info, il existe d'autres instructions d'affichage (cf plus loin)
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

        //----------
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


phpinfo();


?>