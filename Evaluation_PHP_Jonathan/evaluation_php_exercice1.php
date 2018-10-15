<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluation PHP</title>
</head>
<body>

    <style>
        h2{
            color: purple;
        }
    </style>

<h2>Exercice 1</h2>
<?php

// Déclaration du tableau PHP :

    // $membre = ['prenom', 'nom', 'adresse', 'code_postal', 'ville', 'email', 'telephone', 'date_naissance'];
    $membre = ['Jonathan', 'BOURDARIAS', '49, avenue du 18 juin 1940', '92500', 'Rueil-Malmaison', 'jonathan.bourdarias@lepoles.com', '0660515084', '1989/01/30'];
    // echo gettype($membre);

    // Déclaration d'une variable d'affichage :
        // $contenu = '';

    // Affichage du tableau :
    echo '<table border ="1">';
        echo '<tr>';
            echo '<th>Prenom</th>';
            echo '<th>Nom</th>';
            echo '<th>Adresse</th>';
            echo '<th>Code Postal</th>';
            echo '<th>Ville</th>';
            echo '<th>Email</th>';
            echo '<th>Téléphone</th>';
            echo '<th>Date de naissance</th>';
        echo '</tr>';
    echo '</table><br>';

    // Création de la boucle pour parcourir le tableau :

    // echo '<ul>';
    foreach ($membre as $coordonnees){
        echo '<li>'. $coordonnees .'</li>';
    }
    // echo '</ul>';
    echo '<br>';
?>    
</body>
</html>