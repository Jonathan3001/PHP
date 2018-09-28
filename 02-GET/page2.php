<?php
// -------------------------------------
// La superglobale $_GET 
// -------------------------------------
// $_GET représente l'url. Il s'agit d'une superglobale et comme toutes les superglobales il s'agit d'un array. Superglobale signifie que ce tableau est disponible dans tous les contextes du script, y compris dans l'espace local des fonctions.

// Dans notre exemple, les informations transitent dans l'url de la manière suivante : ?article=jean&couleur=bleu&prix=30
// La syntaxe de l'url est donc : page.php?indice1=valeur1&indiceN=valeurN
// La superglobale $_GET transforme les informations passées dans l'url en cet array : $_GET = array('indice1' => 'valeur1', 'indiceN' => 'valeurN');

echo '<pre>';
var_dump($_GET);
echo '</pre>';

if (isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){
// Si existent les indices "article" et "couleur" et "prix", alors on peut afficher leur valeur :
    echo '<h1>Détail du produit</h1>';
    echo '<p> Article : ' . $_GET['article'] . '</p>';
    echo '<p> Couleur : ' . $_GET['couleur'] . '</p>';
    echo '<p> Prix : ' . $_GET['prix'] . ' € </p>';
} else { // Sinon, on met un message à l'internaute :
    echo '<p>Ce produit n\'existe pas !</p>';
}


