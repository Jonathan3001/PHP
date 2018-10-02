<?php

function debug($param){
    echo '<pre>';
        print_r($param);
    echo '</pre>';
}
echo '<h1>Les commerciaux et leur salaires</h1>';

// Exercice :
// - Afficher dans une liste <ul><li> : prénom, nom et salaire des employés du service commercial (1 commerciale par <li>). Pour cela, vous utilisez une requête préparée.
// - Afficher le nombre de commerciaux dans l'entreprise.

// 1 - Connexion :
$pdo = new PDO('mysql:host=localhost;dbname=societe',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8')
);

// 2 - Requête (préparée) :

$service = 'commercial';

$resultat = $pdo->prepare("SELECT prenom, nom, salaire FROM employes WHERE service = :service");

$resultat->bindParam(':service', $service);

$resultat->execute();

/* echo'<ul>';
    while($donnee = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<li>';
            foreach($donnee as $info){
                echo '<span>' . $info . ' ' . '</span>';
            }
        echo '</li>';
    }
echo'</ul>';
debug($donnee); */

// ----- OU -----

/* echo '<ul>';
    foreach($resultat as $info){ 
        print_r($info);
        echo '<li>';       
            echo '<span>' . $info['prenom'] . ' ' . '</span>';
            echo '<span>' . $info['nom'] . ' ' . '</span>';
            echo '<span>' . $info['salaire'] . ' ' . '</span>';        
        echo '</li>';       
    }
echo '</ul>';
print_r($resultat); */

// ----- OU (Correction) -----

echo '<ul>';
    while($donnee = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<li>' . $donnee['prenom'] . ' ' . $donnee['nom'] . ' gagne ' . $donnee['salaire'] . ' euros. </li>';
    }
echo '</ul>';

echo "Le nombre d'employés du service commercial est de : " . $resultat->rowCount() . '<br>';

// var_dump($resultat);