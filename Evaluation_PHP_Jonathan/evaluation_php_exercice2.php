<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluation PHP / Exercice 2</title>
</head>
<body>

    <style>
        h2{
            color: purple;
        }
    </style>

    <h2>Exercice 2</h2>

<?php

// Création de la fonction de conversion de devises :
    function conversion($type, $devise){
        // On contrôle que la valeur saisie par l'utilisateur est bien un nombre entier ou décimal :
        if(!is_numeric($type)){
            return '<p>Le type de valeur est incorrecte</p>';
        }
        // On contrôle que la devise de conversion demandé par l'utilisateur est soit en 'EUR' soit en 'USD' :
        if($devise != 'EUR' && $devise != 'USD'){
            return '<p>La devise n\'est pas prise en compte</p>';
        }
        // Après vérification des paramètres de la fonction, on effectue la conversion selon le type de devise :
        if($devise == 'EUR'){
            return $conversion = $type * 1.085965;
        } else {
            return $conversion = $type * 0.085965 ;
        }
    }
    echo conversion (100, 'EUR');
?>
</body>
</html>