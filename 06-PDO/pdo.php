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

// -----
// On peut aussi transformer l'objet PDOStatement $result selon les méthodes fetch suivantes :

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_NUM); // transforme l'objet $result en un ARRAY indicé numériquement
debug($employe);
echo $employe[1] . '<br>'; // on passe par l'indice numérique 1 pour afficher le prénom

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(); // transforme l'objet $result en un ARRAY associatif et numérique
debug($employe);
echo $employe['prenom'] . '<br>';
echo $employe[1] . '<br>';

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_OBJ); // transforme l'objet $result en un autre objet stdClass dans lequel on accède aux informations de Daniel Chevel : les propriétés de cet objet correspondent aux champs de la requête
debug($employe);
echo $employe->prenom . '<br>';

// Note : on répète la requête SQL avant chaque fetch() car on ne peut pas réaliser plusieurs fetch() sur le même résultat.


// -----
// Exercice : afficher le service de l'employé dont l'id_employes est 417.

$result = $pdo->query("SELECT service FROM employes WHERE id_employes = 417");
$employe = $result->fetch(PDO::FETCH_ASSOC);
debug($employe);
echo "Le service de l'employé 417 est : $employe[service]";


// --------------------------------------------------
echo '<h3> 04 - La méthode query() et boucle while </h3>';
// --------------------------------------------------

// Quand on est certain d'avoir qu'un seul résultat dans notre requête : pas de boucle. Si on peut en avoir potentiellement plusieurs, on fait une boucle.

$resultat = $pdo->query("SELECT * FROM employes");

echo "Nombre d'employés dans l'entreprise : " . $resultat->rowCount() . '<br>';
// rowCount() compte le nombre de lignes retournées par la requête. On peut ainsi compter le nombre de produits, de membres inscrits ...

while($employe = $resultat->fetch(PDO::FETCH_ASSOC)){ // fetch() retourne la ligne suivante du jeu de résultat en un ARRAY associatif. L a boucle while permet de faire avancer le curseur dans le jeu de résultat, et s'arrête quand le curseur est à la fin des résultats.

    // debug($employe); $employe est un ARRAY associatif qui contient les données d'une ligne du jeu de résultat contenu dans $resultat pour chaque tour de boucle.
    echo '<div>';
        echo '<p>' . $employe['id_employes'] . '</p>';
        echo '<p>' . $employe['prenom'] . '</p>';
        echo '<p>' . $employe['nom'] . '</p>';
    echo '</div><hr>';
}

// Conclusion : on fait une boucle si on a potentiellement plusieurs résultats.


// --------------------------------------------------
echo '<h3> 05 - La méthode fetchAll() </h3>';
// --------------------------------------------------

$resultat = $pdo->query("SELECT * FROM employes");

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // retourne toutes les lignes de résultats dans un tableau multidimentionnel : on a un sous-array associatif à chaque indice numérique de $donnees. On peut mettre aussi FETCH_NUM pour des sous-array indicés numériquement ou fetchAll() pour des sous-array numériques et associatifs.

debug($donnees);

// On parcourt $donnees avec une boucle foreach pour en afficher le contenu :
foreach ($donnees as $employe){
    // debug($employe); // $employe correspond à chaque sous-array associatif contenu dans $donnees
    echo '<div>';
        echo '<p>' . $employe['id_employes'] . '</p>';
        echo '<p>' . $employe['nom'] . '</p>';
        echo '<p>' . $employe['prenom'] . '</p>';
    echo '</div><hr>';
}


// --------------------------------------------------
echo '<h3> 06 - Exercice </h3>';
// --------------------------------------------------

// Afficher la liste des différents services de l'entreprise, dans une liste <ul><li>.

$resultat = $pdo->query("SELECT DISTINCT service FROM employes");

// debug($service);

echo '<ul>';
while ($services = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<li>' . $services['service'] . '</li>';
}
echo '</ul>';

// ----- Ou -----

$resultat = $pdo->query("SELECT DISTINCT service FROM employes");

$services = $resultat->fetchAll(PDO::FETCH_ASSOC);

echo '<ul>';
foreach ($services as $employe){
        echo '<li>' . $employe['service'] . '</li>';
}
echo '</ul>';


// --------------------------------------------------
echo '<h3> 07 - Table HTML </h3>';
// --------------------------------------------------

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border="1">';
    // Affichage de la ligne des entêtes dynamiquement :
    echo '<tr>';
        for($i = 0; $i < $resultat->columnCount(); $i++){
            debug($resultat->getColumnMeta($i)); // la méthode getColumnMeta() retourne un array qui contient notament l'indice "name" avec le nom de chaque colonne (= champs de la table)
            $colonne = $resultat->getColumnMeta($i);
            echo '<th>' . $colonne['name'] . '</th>'; // l'indice "name" contient le nom du champ à chaque tour de boucle
        }
    echo '</tr>';

    // Affichage des lignes :
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
            // $ligne étant un array, je peux faire une foreach pour le parcourir :
            foreach($ligne as $information){
                echo '<td>' . $information . '</td>';
            }
        echo '</tr>';
    }
echo '</table>';

// Pour voir les méthodes disponibles dans $resultat :
// debug(get_class_methods($resultat));


// --------------------------------------------------
echo '<h3> 08 - requête préparée et bindParam() </h3>';
// --------------------------------------------------

$nom = 'sennard';

// Une requête préparée se réalise en 3 étapes :
// Etape 1 : Préparer la requête :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // :nom est un marqeur nominatif qui est en attente d'une valeur

// Etape 2 : Lier les marqueurs aux valeurs :
$resultat->bindParam(':nom', $nom); // bindParam() reçoit exclusivement une variable vers laquelle pointe le marqueur (on ne peut pas y mettre une valeur directement). Ainsi, si le contenu de la variable change, la valeur du marqueur changera automatiquement (pas besoin de refaire bindParam()).

//  Etape 3 : Exécuter la requête :
$resultat->execute();

// Puis on fait un fetch() sur $resultat pour obtenir le jeu de résultat qu'il contient :
$donnees = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car il n'y a qu'un seul résultat.
debug($donnees);

/* 
prepare() permet de préparer une requête mais ne l'exécute pas.
execute() permet d'exécuter une requête préparée.

Les valeurs de retour :
    prepare() renvoie toujours un objet PDOStatement.
    execute() :
        -Succès : renvoie TRUE;
        -Echec : renvoie FALSE;

Les requête préparées sont préconisées si vous exécutez plusieurs fois la même requête, et ainsi vouloir éviter de répéter le cycle analyse / interprétation / exécution réalisé par le SGBD (Système de Gestion de Base de Données).

Les requête préparées sont souvent utilisées pour assainir les données et éviter les injections SQL (ce que nous verrons dans un chapitre ultérieur).
*/

// Si on change la valeur contenue dans $nom, sans refaire un bindParam(), le marqueur de la requête pointe automatiquemennt vers la nouvelle valeur. On peut donc faire un execute() directement :
$nom = 'durand';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
debug($donnees); // on accède aux données de 'durand' sans avoir refait un bindParam().


// --------------------------------------------------
echo '<h3> 09 - requête préparée et bindValue() </h3>';
// --------------------------------------------------

$nom = 'thoyer';

// 1 - préparer la requête :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

// 2 - lier les marqueurs aux valeurs :
$resultat->bindValue(':nom', $nom); // bindValue() reçoit une variable OU une valeur directement. Le marqueur pointe uniquement vers la valeur. Si celle-ci change, il faudra refaire un bindValue() lors d'un nouvel execute() pour tenir compte de cette nouvelle valeur (sinon le marqueur conserve l'ancienne valeur).

// 3 - exécuter la requête :
$resultat->execute();

// Puis on affiche le résultat :
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
debug($donnees);

// Si on change la valeur de $nom, sans nouveau bindValue(), le marqueur de la requête continue de pointer vers 'thoyer' :
$nom = 'durand';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
debug($donnees); // on continue d'accèder aux valeurs de "thoyer" si on ne refait pas notre bindValue().


// --------------------------------------------------
echo '<h3> 10 - requête préparée et points complémentaires </h3>';
// --------------------------------------------------

echo '<h4>Le marqueur "?" </h4>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ? ");
// On prépare la requête avec les parties variables représentées par des marqueurs sous forme de "?"

$resultat->bindValue(1, 'durand'); // Le chiffre 1 représente le premier marqueur "?" de la requête
$resultat->bindValue(2, 'damien'); // Le chiffre 2 représente le second

$resultat->execute();

// On peut aussi utiliser cette syntaxe directement :
$resultat->execute(array('durand', 'damien')); // on peut remplacer les 2 bindValue() et le execute() précédents par cette ligne, en passant un array à la méthode execute(). Les valeurs sont dans le même ordre que les marqueurs dans la requête.

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
debug($donnees);

// -----
echo '<h4>execute() sans bindParam ni bindValue()</h4>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom ");

$resultat->execute(array(':nom' => 'chevel', ':prenom' => 'daniel')); // on associe les marqueurs à leur valeur directement dans un array passé à la méthode execute()

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
debug($donnees);