<?php

// --------------------------------------------
//  ------------------- PDO -------------------
// --------------------------------------------

// PDO pour PHP Data Objects, définit une interface pour accéder à une base de données depuis le PHP.

function debug($param){
    echo '<pre>';
        print_r($param);
    echo '</pre>';
}

// --------------------------------------------------
echo '<h3> 01 - Connexion </h3>';
// --------------------------------------------------

$pdo = new PDO('mysql:host=localhost;dbname=societe', // driver mysql (pourrait être oracle, IBM, ODBC...) + nom du serveur de la BDD + nom de la BDD
                'root', // pseudo de la BDD
                '', // mdp de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Pour afficher les messages d'erreur SQL
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8') // définition du jeu de caractères des échanges avec la BDD.
);

// $PDO ci-dessus est un objet issu de la classe prédéfinie PDO. Il représente la connexion à la BDD "societe".


// --------------------------------------------------
echo '<h3> 02 - La méthode exec() </h3>';
// --------------------------------------------------

// exec() est utilisé pour la formulation de requêtes ne retournant pas de résultat : INSERT, DELETE, UPDATE.

$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('test', 'test', 'm', 'test', '2016-02-08', 500)");

/*  Valeur de retour :
    - Succès : renvoie le nombre de lignes affectées par la requête
    - Echec : retourne false
*/

echo "Nombre de lignes affectées par le INSERT : $resultat <br>";
echo 'Dernier id généré par la BDD : ' . $pdo->lastInsertId();

// -----------
$resultat = $pdo->exec("DELETE FROM employes WHERE prenom = 'test' ");
echo "<br> Nombre de lignes affectées par le DELETE : $resultat <br>";


// --------------------------------------------------
echo '<h3> 03 - La méthode query() et les différents fetch </h3>';
// --------------------------------------------------

// Au contraire de exec(), query() s'utilise pour la formulation de requêtes retournant 1 ou plusieurs résultats : SELECT.

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");

debug($pdo);
debug($result);

/* Valeur de retour de la méthode query() :
    - Succès : elle nous fournit un objet issu de la classe prédéfinie PDOStatement qui contient 1 ou plusieurs jeux de résultat
    - Echec : false

    Notez que query() peut être aussi utilisée avec INSERT, DELETE et UPDATE.
*/

// $result est le résultat de la requête sous forme inexploitable directement. En effet, on ne voit pas le jeux de résultat concernant Daniel à l'intérieur. 
// Il faut donc transformer $sresult avec la méthode fetch() :

$employe = $result->fetch(PDO::FETCH_ASSOC); // La méthode fetch() avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $result en un ARRAY associatif dont les indices correspondent aux noms des champs (*) de la requête SQL.
debug($employe);
echo "Je suis $employe[prenom] $employe[nom] du service $employe[service].<br>";
// N'oubliez pas qu'un array écrit dans des quotes ou des guillemets perd ses quotes à son indice.

// Résumé des 4 étapes principales pour afficher DANIEL Chevel :
// 1- connexion à la BDD
// 2- on fait la requête : on obtient un objet PDOStatement
// 3- on fait un fetch sur cet objet pour le transformer
// 4- on affiche le résultat final.