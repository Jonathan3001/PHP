<style>
    h2{color: orange;}
</style>

<?php


//----------
echo '<h2> Les balises PHP </h2>';
//----------

?>

<?php
// Pour ouvrir un passage en PHP on utilise la balise précédente
// Pour fermer un passage en PHP on utilise la balise suivante
?>

<p>Bonjour</p> <!-- en dehors des balises d'ouverture et de fermeture du PHP, nous pouvons écrire du HTML quand on est dans un fichier ayant l'extension .php -->

<?php
// Vous n'êtes pas obligé de fermer un passage en PHP en fin de script.


//----------
echo '<h2> Affichage </h2>';
//----------

echo 'Bonjour <br>'; // echo est une instruction qui permet d'afficher dans le navigateur. Toutes les instructions se terminent par un ";". Dans un echo nous pouvons mettre aussi du HTML.

print 'Nous sommes mardi <br>'; // print est une autre instruction d'affichage. Pas ou peu de différence avec echo.

// Autres instruction d'affichage que nous verrons plus loin :
// print_r();
// var_dump();

// Pour faire un commentaire sur une seule ligne

/*
Pour faire un commentaire sur plusieurs lignes
*/

# autre syntaxe de commentaire sur une seule ligne


//----------
echo '<h2> Variable : déclaration / affectation / types </h2>';
//----------

// Définition : une variable est un espace mémoire qui porte un nom et permettant de conserver une valeur.
// En PHP on déclare une variable avec le signe '$'.

$a = 127; // affectation de la valeur 127 à la variable $a.
echo gettype($a); // gettype() est une fonction prédéfinie qui indique le type d'une variable. Ici il s'agit d'un integer (entier).

echo '<br>';

$a = 'une chaîne de caractères';
echo gettype($a); // affiche string.

echo '<br>';

$b = '127';
echo gettype($b); // affiche string car un nombre écrit entre quotes est interprété comme un string.

echo '<br>';

$a = true; // ou false
echo gettype($a); // affiche boolean

// Par convention, un nom de variable commence par une lettre minuscule, puis on met une majuscule à chaque mot. Il peut contenir des chiffres (jamais au début) ou un underscore ("_") (jamais au début car signification particulière en objet, ni à la fin).


//----------
echo '<h2> Concaténation </h2>';
//----------

$x = 'Bonjour ';
$y = 'tout le monde';

echo $x . $y . '<br>'; // Le point de concaténation peut être traduit par 'suivi de'.

// Remarque sur echo : 
echo $x, $y, '<br>'; // Dans l'instruction echo on peut séparer les éléments à afficher par une virgule. Cette syntaxe est spécifique au echo et ne fonctionne pas avec print.

// -----
// Concaténation lors de l'affectation :
$prenom1 = 'Bruno';
$prenom1 = 'Claire';
echo $prenom1 . '<br>'; // Affiche Claire

$prenom2 = 'Nicolas';
$prenom2 .= ' Marie';
echo $prenom2 . '<br>'; // Affiche "Nicolas Marie" grâce à l'opérateur combiné ".=", la valeur "Marie" vient se concaténer à la valeur "Nicolas" sans la remplacer.


//----------
echo '<h2> Guillemets et Quotes </h2>';
//----------

$message = "Aujourd'hui"; // ou bien :
$message = 'Aujourd\'hui'; // on échappe les apostrophes dans les quotes simple avec \

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // Dans les guillements, la variable est évaluée : c'est son contenu qui est affiché, ici :"Bonjour".
echo '$txt tout le monde <br>'; // Dans des quotes simple, la variables n'est pas évaluée, elle est traitée comme du texte brut. Affiche '$txt'.


//----------
echo '<h2> Constante et constante magique </h2>';
//----------

// Une constante permet de conserver une valeur sauf que celle-ci ne peut pas être modifée durant l'exécution du ou des script. Utile pour par exemple conserver les paramètres de connexion à la BDD sans pouvoir les modifier une fois définis.

define('CAPITALE','Paris'); // On déclare une constante avec la fonction prédéfinie 'define()' qui s'appelle CAPITALE et prend pour valeur "Paris". Par convention les constantes sont toujours écrites en majuscules.

echo CAPITALE . '<br>'; // Affiche Paris

// Deux constantes magiques :
echo __DIR__ . '<br>'; // affiche le chemin complet vers le dossier de notre fichier
echo __FILE__ . '<br>'; // affiche le chemin complet vers le fichier (dossier + nom du fichier)


// -----
// Exercice
// -----
// Vous affichez Bleu-Blanc-Rouge (avec les tirets) en mettant le texte de chaque couleur dans des variables.

$couleur1 = 'Bleu-';
$couleur2 = 'Blanc-';
$couleur3 = 'Rouge';

echo "$couleur1$couleur2$couleur3";

// ou

// $couleur1 = 'Bleu';
// ...

//----------
echo '<h2> Opérateurs arithmétiques </h2>';
//----------

$a = 10;
$b = 2;

echo $a + $b . '<br>'; // Affiche 12
echo $a - $b . '<br>'; // Affiche 8
echo $a * $b . '<br>'; // Affiche 20
echo $a / $b . '<br>'; // Affiche 5
echo $a % $b . '<br>'; // Affiche 0 : modulo = reste de la division entière. Exemple 3%2 = si on a trois billes réparties entre 2 personnes, il nous en reste 1 dans la main

// ---------
// Opération et affectation combinées :
$a = 10;
$b = 2;

$a += $b; // équivaut à $a = $a + $b, $a vaut donc au final 12.
$a -= $b; // équivaut à $a = $a - $b, $a vaut donc au final 10.
$a *= $b; // équivaut à $a = $a * $b, $a vaut donc au final 20.
$a /= $b; // équivaut à $a = $a / $b, $a vaut donc au final 10.
$a %= $b; // équivaut à $a = $a % $b, $a vaut donc au final 0.

// Exemple d'utilisation : pratique pour faire des calculs de quantités dans les paniers d'achat (+= et -=)

// --------
// Incrémenter et décrémenter :
// $i = 0:
// $i++; // on ajoute 1 à $i qui vaut au final 1
// $i--; // on retire 1 à $i qui vaut au final 0

$i = 0;
$k = ++$i; // La variable i est incrémentée de 1, puis elle est retournée : on affecte donc 1 à $k
echo '$i vaut ' . $i . '<br>'; // 1
echo '$k vaut ' . $k . '<br>'; // 1

$i = 0;
$k = $i++; // La variable $i est d'abord retournée, puis elle est incrémentée de 1
echo '$i vaut ' . $i . '<br>'; // 1
echo '$k vaut ' . $k . '<br>'; // 0


//----------
echo '<h2> Structures conditionnelles - opérateurs de comparaison </h2>';
//----------

$a = 10;
$b = 5;
$c = 2;

// -----
// if ... else :
if($a > $b){ // Si la condition est évaluée à TRUE, on exécute les accolades qui suivent :
    echo '$a est supérieur à $b <br>';
} else { // Sinon, si la condition est évaluée FALSE, on exécute le else :
    echo 'Non, c\'est $b qui est supérieur ou égale à $a <br>';
}


// -----
// L'opérateur AND écrit && :
if($a > $b && $b > $c){ // si $a est supérieur à $b ET que dans le même temps $b est supérieur à $c, alors on entre dans les accolades :
    echo 'OK pour les deux conditions <br>';
}

// -----
// L'opérateur OR écrit || :
if($a == 9 || $b > $c) { // Si $a est égal à 9 (opérateur ==) OU que $b est supérieur à $c, alors on entre dans les accolades :
    echo 'OK pour au moins une des deux conditions <br>';
}

// -----
// if ... elseif ... else :

if($a == 8){
    echo '$a est égal à 8 <br>';
} elseif ($a != 10){
    echo'$a est différent de 10 <br>';
} else {
    echo 'Les deux conditions précédentes sont fausses <br>';
}

// Notes : on ne fait jamais suivre un else par une condition (sinon utiliser un elseif). On ne met pas de ";" à la fin d'une condition car il s'agit d'une structure.

// -----
// L'opérateur XOR :
$question1 = 'mineur';
$question2 = 'je vote'; // exemple d'un questionnaire statistique

if($question1 == 'mineur' XOR $question2 == 'je vote'){ // XOR ou OU exclusif : seulement une des 2 conditions doit être vraie (soit l'une soit l'autre). Si les 2 conditions sont vraies, alors l'expression complète est fausse : c'est le cas ici, on entre donc dans le else
    echo 'Vos réponses sont cohérentes <br>';
} else {
    echo 'Vos réponses ne sont pas cohérentes <br>';
}

// -----
// Forme contractée de la condition dite ternaire :
echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>'; // Dans la ternaire, le "?" remplace le if, et le ":" remplace le else. Ici, si $a = 10, je fais echo du premier string, sinon du second.

// ou encore :
$resultat = ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';
echo $resultat;

// -----
// Comparaison en == et en ===
$varA = 1; // integer
$varB = '1'; // string

if ($varA == $varB) echo '$varA est égale à $varB en valeur uniquement <br>';

if ($varA === $varB) {
    echo '$varA est égale à $varB en valeur ET en type <br>';
} else {
    echo '$varA est différent de $varB en valeur OU en type <br>';
}

/* 
= signe d'affectation
== signe de comparaison en valeur
=== signe de comparaison en valeur et en type
*/

// -----
// isset() et empty() :
// Définitions :
// isset() teste si c'est défini (si existe) et a une valeur non NULL
// empty() teste si c'est vide, c'est-à-dire 0, string vide '', NULL, false ou non défini

$var1 = 0;
$var2 = '';

if (empty($var1)) echo '0, vide, NULL, false ou non défini <br>'; // Ici la condition est vraie car $var1 est vide au sens de empty(voir défintion ci-dessus)
if (isset($var2)) echo 'existe et non NULL <br>'; // La condition est vraie car $var2 existe bien et est non NULL

// Si on ne déclare pas les variables $var1 et $var2 ligne 272 et 273, la condition avec empty() reste vraie (car non définie), mais la condition avec isset() devient fausse (car la variable ne serait pas définie).

// Exemples d'utilisation : empty() pour vérifier qu'un champ de formulaire est vide. isset() qu'une variable existe bien avant de l'utiliser.

// -----
// L'opérateur NOT écrit "!" :
$var3 = 'une chaine de caractères';

if (!empty($var3)) echo '$var3 n\'est pas vide <br>'; // ! pou NOT. Il s'agit d'une négation qui transforme false en true et inversement (!false vaut true et !true vaut false).
// Littéralement, on teste ici si $var3 n'est pas vide.

// --------
// phpinfo(); Pour vérifier la version de PHP sur notre serveur local.

// PHP7 : entrer une valeur dans une variable si elle existe :
$var1 = $variableInconnue ?? $varAutre ?? 'valeur par défaut'; // L'opérateur "??" indique qu'il faut prendre la première variable ou valeur qui existe : $variableInconnue n'existant pas, on passe à $varAutre qui n'existe pas non plus, donc on prend la 'valeur par défaut' pour l'affecter à $var1.
echo $var1; // affiche 'valeur par défaut'

// Utilisation pour pré-remplir les values des formulaires quand l'internaute aura saisie et envoyé des valeurs.


//----------
echo '<h2> Condition switch </h2>';
//----------

// La condition switch est une autre syntaxe du if / elseif / else quand on veut comparer une variable à une multitude de valeurs.

$couleur = 'jaune';

switch ($couleur) {
    case 'bleu': // on compare $couleur à la valeur des "case" et exécute le code qui suit les ":" si elle correspond
        echo 'Vous aimez le bleu <br>';
        break; // break est obligatoire pour quitter la condition une fois le case exécuté
    case 'rouge':
        echo 'Vous aimez le rouge <br>';
        break;
    case 'vert':
        echo 'Vous aimez le vert <br>';
        break;
    
    default: // cas par défaut si on entre pas dans les case précédents (équivalent du else)
        echo 'Vous n\'aimez aucune de ces couleurs <br>';
        break;
}

// Exercice : réécrire le switch précédent en condition if ... classique. On doit obtenir le même résultat.

if ($couleur == 'bleu'){
    echo 'Vous aimez le bleu <br>';
} elseif ($couleur == 'rouge') {
    echo 'Vous aimez le rouge <br>';
} elseif ($couleur == 'vert'){
    echo 'Vous aimez le vert <br>';
} else {
    echo 'Vous n\'aimez aucune de ces couleurs <br>';
}


//----------
echo '<h2> Quelques fonctions prédéfinies </h2>';
//----------

// Une fonction prédéfinie permet de réaliser un traitement spécifique prédéterminé dans le langage PHP.

// ----
// strpos :
$email1 = 'prenom@site.fr';
echo strpos($email1, '@'); // affiche la position 6 de l'@  en comptant à partir de 0.

echo '<br>';

$email2 = 'bonjour';
echo strpos($email2, '@'); // Cette ligne n'affiche rien, pourtant la fonction retourne bien quelque chose : false
var_dump(strpos($email2, '@')); // Grâce au var_dump on peut apercevoir ce que retourne cette fonction si l'@ n'est pas trouvé. var_dump est une instruction d'affichage améliorée que l'on utilise en phase de développement.

echo '<br>';

// ----
// strlen :
$phrase = 'mettez une phrase ici à cet endroit';
echo strlen($phrase); // strlen retourne la taille d'une chaîne (nombre d'octets de cette chaîne, un caractère accentué valant 2 octets).

echo '<br>';

// ----
// substr :
$texte = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia odio quisquam tenetur vero corrupti non vel in magni assumenda, corporis perspiciatis fugit iste consequuntur eligendi distinctio nobis, modi, harum culpa?';

echo substr($texte, 0, 20) . '...<a href="">Lire la suite</a>'; // substr retourne une partie du string de la position 0 et sur 20 caractères.

echo '<br>';

// ----
// trim :
$message = '   Hello World   ';
echo strlen($message) . '<br>'; // On compte la taille avec les espaces
echo strlen(trim($message)) . '<br>'; // On compte la taille une fois les espaces supprimés avec trim en début et fin de string

// ----
// die() et exit() :
// exit('un message'); // quitte le script après avoir affiché le message
// die('un message'); // fait la même chose : die() est un alias de exit().


//----------
echo '<h2> Fonctions utilisateur </h2>';
//----------

//Des fonctions sont des morceaux de codes encapsulés dans des accolades et portant un nom qu'on appelle au besoin pour exécuter le code qui s'y trouve.

// Déclaration d'une fonction :
function separation(){ // déclaration d'une fonction sans paramètre
    echo '<hr>';
}

// Appel de la fonction :
separation(); // On appelle une fonction en écrivant son nom suivi d'une paire de ().

// -----
// Fonction avec paramètre et return :
function bonjour($qui) { // $qui  apparaît ici pour la 1ère fois : il permet de recevoir un argument. Il s'agit d'une variable de réception. Notez que l'on peut mettre plusieurs paramètres dans les () séparés par une virgule.
    return 'Bonjour ' . $qui . '<br>'; // return renvoie le string qui le suit à l'endroit où est appelée la fonction.
    echo 'cette ligne ne sera pas exécutée car après un return !';
}

echo bonjour('Pierre'); // Si une fonction attend un argument, il faut lui envoyer.

// -----
// Exercice :
function appliqueTva($nombre) {
    return $nombre * 1.2;
}

// Ecrivez une fonction appliqueTva2 qui calcule un nombre multiplié par un taux donné lors de l'appel de la fonction.

function appliqueTva2($taux, $nombre){ // On peut initialiser par défaut un paramètre dans le cas où on ne reçoit pas de valeur en argument lors de l'appel de la fonction. On a renommée notre fonction car on ne peut pas déclarer deux fonctions qui portent le même nom.
    return $taux * $nombre;
}

echo appliqueTva2(0.05, 100) . '<br>';

// -----
// Exercice :
function meteo($saison) {
    echo "Nous sommes en $saison. <br>";
}

meteo('automne');
meteo('printemps');

// Au sein d'une nouvelle fonction exoMeteo, afficher l'article au ou en selon la saison(en été, en hiver, en automne, au printemps).

/* function exoMeteo($saison){
    if ($saison == 'printemps'){
    echo "Nous sommes au $saison . <br>";
} else {
    // echo meteo($saison);
    echo "Nous sommes en $saison . <br>";
}
}

echo exoMeteo('printemps');
echo exoMeteo('été');
echo exoMeteo('automne');
echo exoMeteo('hiver'); */

// ------
// Correction
function exoMeteo($saison){
    if ($saison === 'printemps'){
        $article = 'au';
    } else {
        $article = 'en';
    }
    echo "Nous sommes $article $saison <br>";
}

exoMeteo('été');
exoMeteo('printemps');

// -----
// Variables locales et variables globales :

// De l'espace local à l'espace global :

function jourSemaine(){
    $jour = "Mardi <br>"; // variable locale à la fonction
    return $jour; // return permet de sortir une valeur de la fonction
}

// echo $jour; // erreur car cette variable n'est connue qu'à l'intérieur de la fonction
echo jourSemaine(); // on récupère ici la valeur "mardi" grâce au return qui se situe dans la fonction


// De l'espace global à l'espace local :
$pays = 'France'; // variable globale

function affichePays(){
    global $pays; // le mot clé "global" permet de récupèrer une variable globale au sein de l'espace local de la fonction
    echo $pays; // affiche France
}

affichePays();


//----------
echo '<h2> Structures itératives : les boucles </h2>';
//----------

// Les boucles sont destinées à répéter des lignes de code de façon automatique.

// Boucle while :
$i = 0; // valeur de départ de la boucle
while ($i < 3){ // Tant que $i est inférieur à 3 nous entrons dans la boucle
    echo "$i---"; // affiche 0---1---2---
    $i++; // on n'oublie pas d'incrémenter à chaque tour de boucle pour ne pas avoir une boucle infinie
}

// Note : pas de ";" à la fin des structures itératives
echo '<br>';

// -----
// Exercice : à l'aide d'une boucle while, afficher dans un selecteur les années de 1918 à 2018

/* echo '<select>';
    echo '<option>1</option>';
    echo '<option>2</option>';
    echo '<option>...</option>';
echo '</select>'; */

/* $annee = 1918;
echo '<select>';
while ($annee < 2019){
    echo '<option>';
    echo $annee;
    echo '</option>';
    $annee++;
}
echo '</select>';   */

// Correction

$annee = date('Y') - 100; // date() fourni la date du jour au format indiqué, ici 'Y' pour Year sur 4 chiffres
echo '<select>';
    while ($annee <= date('Y')) {
        // echo "<option>$annee</option";
        echo '<option>' . $annee . '<option>';
        $annee++;
    }
echo '</select><br>';

// Boucle do while :
// La boucle do while a la particularité de s'exécuter au moins une fois (correspondant à "do"), puis tant que la condition while est vraie.

$j = 1;

do {
    echo 'Je fais un tour de boucle <br>';
    $j++;
} while ($j > 10); // La condition renvoie false ici, pourtant la boucle a bien tournée une fois. Attention au ";" après le while de cette boucle.

// Exemple d'utilisation : poser une question à l'internaute un première fois avec le "do", puis tant qu'il n'a pas répondu avec le while.


// -----
// Boucle for :
// La boucle for est une autre syntaxe de la boucle while.

for($i = 0; $i < 10; $i++){ // on trouve dans les () du for : valeur de départ ; condition d'entrée dans la boucle ; variation de $i (incrémentation, décrémentation ou autre chose)
    echo $i . '<br>'; // affiche 0 à 9 en 10 tours
}

// Rappel : si on veut faire varier $i de 10 en 10, on écrit $i += 10 à la place de i++.

// Exercice : afficher 12 <option> de 1 à 12 à l'aide d'une boucle for.

echo '<select>';
    for($mois = 1; $mois < 13; $mois++){
        echo "<option>$mois</option>";
    }
echo '</select>';


// Boucle foreach :
// Il existe aussi la boucle foreach pour parcourir les array et les objets, nous la verrons dans un prochain chapitre.

// -----
// Exercice : afficher avec une boucle for les chiffres de 0 à 9 sur la même ligne dans une table HTML.

?>
<table border = "1">
    <tr>
        <td>0</td>
        <td>1</td>
        <td>...</td>
    </tr>
</table>

<?php

echo '<table border = "1">';
    echo '<tr>';
    for($chiffre = 0; $chiffre < 10; $chiffre++){
        echo "<td>$chiffre</td>";
    }
    echo '</tr>';
echo '</table>';

echo '<hr>';

// Exercice : faites une boucle for qui affiche 0 à 9 sur la même ligne, répétée sur 10 lignes dans une table HTML.

/* echo '<table border = "1">';
        echo '<tr>';
    for($chiffre2 = 0; $chiffre2 < 10; $chiffre2++){
            echo '<tr>';
                for($chiffre3 = 1; $chiffre3 < 10; $chiffre3++){
                    echo "<td>$chiffre3</td>";    
                }
            echo '</tr>';
        }
        echo '</tr>';
echo '</table>'; */

echo '<table border = "1">';
    for ($chiffre3 = 1; $chiffre3 <= 10; $chiffre3++){
        echo '<tr>';
            for($chiffre2 = 0; $chiffre2 < 10; $chiffre2++){
                echo "<td>$chiffre2</td>";    
            }
        echo '</tr>';
        }
echo '</table>'; // nous avons ici le principe des boucles imbriquées. Quand la première boucle fait un tour, la boucle intérieure en fait 10.


//----------
echo '<h2> Les tableaux ou array </h2>';
//----------

// Un tableau, ou array en anglais, est déclaré comme une variable améliorée dans laquelle on stock une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type. Elles possèdent un indice dont la numérotation par défaut commence à 0.

// Déclaration d'un array (méthode 1) :
$liste = array('grégoire', 'nathalie', 'émilie', 'françois', 'georges');

echo 'Le type de $liste est : ' . gettype($liste) . '<br>'; // affiche le type array

// echo $liste; // erreur de type "Array to string conversion" car on ne peut pas afficher directement un array avec un echo.

echo '<pre>';
    var_dump($liste); // affiche le contenu du tableau plus certaines informations comme les types
echo '</pre>'; // pre est une balise HTML qui permet de formater l'affichage du var_dump

echo '<pre>';
    print_r($liste); // print_r est plus synthétique que var_dump, il n'affiche pas le type des éléments contenus dans l'array
echo '</pre>';

// fonction d'affichage d'un print_r avec balise pre :
function debug($param) {
    echo '<pre>';
        print_r($param);
    echo '</pre>';
}

// Autre méthode de déclaration d'un array :
$tab = ['France', 'Italie', 'Espagne', 'Portugal'];

$tab[] = 'Suisse'; // Les [] vides permettent d'ajouter une valeur à la fin de notre array

debug($tab);

// Afficher "Italie" à partir de notre tableau $tab :
echo $tab[1] . '<br>'; 

// -----
// Tableau associatif :
// Un tableau associatif est un tableau dans lequel on choisi la dénomination des indices.

$couleur = array(
    'j' => 'jaune',
    'b' => 'bleu',
    'v' => 'vert'
);

// Pour accéder à un élément du tableau associatif : 
echo 'La seconde couleur de notre tableau est le ' . $couleur['b'] . '<br>';
echo "La seconde couleur de notre tableau est le $couleur[b] <br>"; // affiche bleu. Un array écrit dans des guillemets ou des quotes perd les quotes autour de son indice.

// Mesurer la taille d'un array :
echo 'Taille du tableau $couleur : ' . count($couleur) . '<br>';
echo 'Taille du tableau $couleur : ' . sizeof($couleur) . '<br>'; // count() et sizeof() font la même chose : il compte le nombre d'éléments contenus dans l'array indiqué.


//----------
echo '<h2> Boucle foreach </h2>';
//----------

// La boucle foreach est un moyen simple de passer en revue un tableau ou un objet. Elle retourne une erreur si vous tenez de l'utiliser sur autre chose.
debug($tab) . '<br>';

foreach ($tab as $valeur){ // le mot clé "as" fait partie de la structure syntaxique de la foreach. Il est obligatoire. $valeur vient parcourir la colonne des valeurs de l'array. Notez qu'on peut l'appeler comme on veut. C'est sa place après as qui détermine qu'elle parcourt les valeurs.
    echo $valeur . '<br>'; // on affiche successivement les éléments du tableau à chaque tour de boucle. La foreach s'arrête automatiquement à la fin du tableau.
}

foreach ($tab as $indice => $valeur){ // quand il y a 2 variables après "as", la 1ère parcours la colonne des indices (quelque soit son nom), et la seconde parcourt la colonne des valeur (quelque soit son nom)
    echo $indice . ' correspond à ' . $valeur . '<br>';
}

// Exercice : écrivez un array associatif avec les indices prénom, nom, email et téléphone, et mettez-y des informations pour une seule personne. Puis avec une boucle foreach, affichez les valeurs dans des paragraphes sauf pour le prénom qui doit être dans un <h3>.

$contact = array(
    'prenom' => 'Marcel',
    'nom' => 'PATOULACCI',
    'email' => 'marcel.patoulacci@orange.fr',
    'telephone' => '01.65.48.95.84'
);

foreach ($contact as $indice => $coordonnee){
    if ($indice == 'prenom'){
        echo '<h3>' . $coordonnee . '</h3>';
    } else {
        echo '<p>' . $coordonnee . '</p>';
    }
}


//----------
echo '<h2> Array multidimentionnel </h2>';
//----------

// Nous parlons de tableau multidimentionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un array multidimentionnel :
$tab_multi = array(
    0 => array(
        'prenom' => 'Julien',
        'nom' => 'Dupon',
        'telephone' => '06.60.51.35.97'
    ),
    1 => array(
        'prenom' => 'Nicolas',
        'nom' => 'Duran',
        'telephone' => '06.51.49.53.79'
    ),
    2 => array(
        'prenom' => 'Pierre',
        'nom' => 'Dulac'
    )
); // Il est possible de choisir le nom des indices dans cet array multidimentionnel

debug($tab_multi);

// Accéder à la valeur "Julien" dans cet array :
echo $tab_multi[0]['prenom']; // affiche "Julien". Nous entrons d'abord à l'indice [0] de $tab_multi, pour ensuite aller à l'indice ['prenom'] dans le sous-tableau.

echo '<hr>';

// Parcourir la tableau multidimentionnel avec une boucle for :
// Possible car les indices sont numériques.

for ($i = 0; $i < count($tab_multi); $i++){
    echo $tab_multi[$i]['prenom'] . '<br>';
}

echo '<hr>';

// Exercice : Afficher les 3 prénoms avec une boucle foreach.
/* foreach ($tab_multi as $index => $info){
    echo $info['prenom'] . '<br>';
    // debug($tab_multi);
}; */

// ou

foreach ($tab_multi as $info){
    // debug($info);
    echo $info['prenom'] . '<br>';
}

echo '<hr>';

// Exercice : Afficher toutes les valeurs de l'array $tab_multi en utilisant foreach

/* foreach ($tab_multi as $index => $value){
        echo $value['prenom'];
        echo $value['nom'] . '<br>';
        echo $value['telephone'] . '<br>';
    } */

    foreach ($tab_multi as $sous_array){ // $sous_array étant lui-même un array, on le parcourt aussi avec une foreach
        foreach ($sous_array as $value){ // $value correspond aux valeurs de ce $sous_array
            // debug($tab_multi);
            echo $value . '<br>';
        }
        echo '<br>';
    }


//----------
echo '<h2> Inclusion de fichiers </h2>';
//----------

echo 'Première inclusion : ';
include 'exemple.inc.php'; // Le fichier dont le chemin est spécifié est inclus ici. En cas d'erreur lors de l'inclusion du fichier, include génère une erreur de type "warning" et continue l'exécution du script.

echo 'Deuxième inclusion : ';
include_once 'exemple.inc.php'; // Le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclus pas.

echo  '<br> Troisième inclusion : ';
require 'exemple.inc.php'; // Le fichier est "requis" donc obligatoire. En cas d'erreur lors de l'inclusion du fichier, require génère une erreur de type "fatal error" et stoppe l'exécution du script.

echo 'Quatrième inclusion : ';
require_once 'exemple.inc.php'; // Le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclus pas.

// Le "inc" dans le nom du fichier inclus est indicatif pour préciser au développeur qu'il s'agit d'un fichier d'inclusion, et donc pas d'une page à part entière. Ce n'est pas obligatoire mais utile.


//----------
echo '<h2> Gestion des dates </h2>';
//----------

echo date('d/m/Y H:i:s') . '<br>'; // date() retourne la date de maintenant selon le format indiqué. d pour jour (day), m pour mois (month), Y pour année (Year) sur 4 chiffres, y pour année sur 2 chiffres, H pour heure (Hour) sur 24h, h pour heure sur 12h, i pour minute et s pour seconde.
echo date('Y-m-d') . '<br>'; // on peut changer l'ordre des paramètres ainsi que les séparateurs

// -----
// Le timestamp :
// Le timestamp est le nombre de seconde écoulées entre une certaine date et le 1er janvier 1970 à 00:00:00. Cette date correspond à la création du système UNIX.
// Ce système de timestamp est utilisé par de nombreux langages de programmation dont le PHP et le JS.

// -----
echo time() . '<br>'; // retourne l'heure actuelle en timestamp

// -----
// Changer le format d'une date (méthode procédurale) :
$dateJour = strtotime ('27-09-2018'); // transforme la date exprimée en string en timestamp
echo $dateJour . '<br>'; // affiche le timestamp du jour

var_dump(strtotime('13-13-2018')); // ici retourne false car la date fournie n'est pas valide. Cette fonction permet donc de valider une date.

echo '<br>';

$dateFormat = strftime('%Y-%m-%d', $dateJour); // transforme une date donnée en timestamp selon le format indiqué, ici en année-mois-jour
echo $dateFormat . '<br>';


// -----
// Changer le format d'une date (méthode objet) :
$date = new DateTime('11-04-2017'); // $date est un objet date qui représente le 11-04-2017
echo $date->format('Y-m-d') . '<br>'; // on peut formater cet objet date en appelant sa méthode format() et en lui indiquant les paramètres du format, ici 'Y-m-d'. Affiche 2017-04-11.


