<?php
// -------------------------------
// La superglobale $_POST
// -------------------------------

// $_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire.
// $_POST est une superglobale donc un array. Il est disponible dans tous les contextes du script, y compris au sein des fonctions.

// Syntaxe de $_POST : $_POST = array ('name1' => 'valeur input1', 'nameN' => 'valeur inputN');



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>
    <form method="post" action=""> <!-- Un formulaire doit toujours être dans des balises <form> pour fonctionner. Attribut method défini la méthode d'envoi des saisies vers le serveur. Attribut action défini l'url de destination des saisies -->
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom"> <!-- Les name des input constituent les indices de l'array $_POST qui réceptionne les infos -->

        <br>

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea> <!-- Les id et les for sont liés : ils permettent de placer le curseur dans l'input quand on clique sur le label -->

        <input type="submit" value="envoyer">
    
    </form>
    
</body>
</html>