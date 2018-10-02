<?php

//-----------------------------------
// La superglobale $_COOKIE
//-----------------------------------

/* Un cookie est un petit fichier (4ko max), déposé par le serveur du site sur le poste de l'internaute et qui peut contenir des informations. Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par le cookie. PHP permet de récupérer très facilement les données contenues dans un cookie : elles sont stockées dans la superglobale $_COOKIE. 

Précaution à prendre avec les cookies :
Le cookie étant sauvegardé sur le poste de l'internaute, il peut être volé ou détourné. On n'y mettre donc pas d'informations sensible (mots de passe, carte bancaire, etc...), mais des informations relatives aux préférences ou aux traces de visite (produits consultés ...).
*/

print_r($_GET);

// 2- On détermine la langue à afficher dans la variable $langue :
if (isset($_GET['langue'])){
    $langue = $_GET['langue']; // si existe l'indice "langue", c'est qu'on a cliqué sur un lien. On affecte donc sa valeur à la variable $langue.
} elseif (isset($_COOKIE['langue'])){
    $langue = $_COOKIE['langue']; // $_COOKIE est une superglobale : son indice correspond au nom du cookie reçu. Si $_COOKIE['langue'] existe, c'est qu'on a reçu un cookie de nom "langue". On affecte donc sa valeur à la variable $langue.
} else {
    $langue = 'fr'; // Par défaut, si on n'a pas cliqué sur un lien et si le coockie "langue" n'existe pas, on choisi "fr".
}

// 3- Création du cookie : 

$un_an = 365 * 24 * 60 * 60; // Exprime 1 an en secondes

setcookie('langue', $langue, time() + $un_an); // on envoie un cookie chez l'internaute avec un nom, une valeur, un date d'expiration exprimée en timestamp (maintenant + 1 an).

// Il n'existe pas de fonction prédéfinie pour supprimer un cookie. Dans ce cas, on le met à jour avec une date périmée ou à zéro, ou encore en ne mettant que le nom du cookie dans les () de setcookie.

// 4- Affichage de la langue :
echo 'Le site est affiché en : ' . $langue . '<br>';


// 1- HTML :
?>
<h1>Votre langue : </h1>
<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=it">Italien</a></li>
    <li><a href="?langue=en">Anglais</a></li>
</ul>