<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluation PHP / Exercice 3</title>
</head>
<body>
    <?php
// 1 - Création de la BDD nommée "exercice_3" sur phpMyAdmin

// 3 - Connexion à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3',
'root',
'',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8')
);

// On crée une variable pour le champ "année de production" :
$annee_production = date('Y') -100;

// 4 : Validation du formulaire :
    $message = ''; // variable d'affichage des messages d'erreur

    if($_POST){
        // print_r($_POST);
        if(!isset($_POST['titre']) || strlen($_POST['titre']) < 5 || strlen($_POST['titre']) > 100) $message .= '<div>Le titre doit comporter entre 5 et 100 caractères !</div>';

        if(!isset($_POST['nom_realisateur']) || strlen($_POST['nom_realisateur']) < 5 || strlen($_POST['nom_realisateur']) > 100) $message .= '<div>Le nom du réalisateur doit comporter entre 5 et 100 caractères !</div>';

        if(!isset($_POST['acteurs']) || strlen($_POST['acteurs']) < 5 || strlen($_POST['acteurs']) > 100) $message .= '<div>Les noms des acteurs doivent comporter entre 5 et 100 caractères !</div>';

        if(!isset($_POST['producteur']) || strlen($_POST['producteur']) < 5 || strlen($_POST['producteur']) > 100) $message .= '<div>Le nom du producteur doit comporter entre 5 et 100 caractères !</div>';

        if(!isset($_POST['synopsis']) || strlen($_POST['synopsis']) < 5 || strlen($_POST['synopsis']) > 250) $message .= '<div>Le synopsis doit comporter entre 5 et 250 caractères !</div>';

        if(!isset($_POST['annee_production']) || !strtotime($_POST['annee_production'])) $message .= '<div>Le champ "Année de production" est requis !</div>';

        if(!isset($_POST['langue']) || ($_POST['langue']) < 0) $message .= '<div>Le champ "Langue" est requis !</div>';

        if(!isset($_POST['categorie']) || !strlen($_POST['categorie']) < 0) $message .= '<div>Le champ "Catégorie" est requis !</div>';

        if(!isset($_POST['video']) || !strlen($_POST['video'])) $message .= '<div>Le lien de la video doit comporter au maximum 250 caractères !</div>';

        if(empty($message)){ // S'il n'y a pas de message d'erreur, on peut ajouter le film à la BDD
            foreach($_POST as $indice => $valeur){
                $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
            }
            // On fait une requête préparée afin d'éviter les injections de type SQL, CSS ou JS, car on récupère des données fournies par l'utilisateur via $_POST :

            $resultat = $pdo->prepare("INSERT INTO movies (id_film, title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES (:id_film, :titre, :acteurs, :nom_realisateur, :producteur, :annee_production, :langue, :categorie, :synopsis, :video)");

            $resultat->bindParam(':id_film', $_POST['id_film']);
            $resultat->bindParam(':titre', $_POST['titre']);
            $resultat->bindParam(':actors', $_POST['actors']);
            $resultat->bindParam(':nom_realisateur', $_POST['nom_realisateur']);
            $resultat->bindParam(':producteur', $_POST['producteur']);
            $resultat->bindParam(':annee_production', $_POST['annee_production']);
            $resultat->bindParam(':langue', $_POST['langue']);
            $resultat->bindParam(':categorie', $_POST['categorie']);
            $resultat->bindParam(':synopsis', $_POST['synopsis']);
            $resultat->bindParam(':video', $_POST['video']);

            $ajoutFilm = $resultat->execute();

            if($ajoutFilm){
                $message .= '<p style="background: green">Le film a bien été ajouté !</p>';
            } else {
                $message .= '<p style="background: red">Erreur lors de l\'ajout du film !</p>';
            } 
        } // Fin if(empty($message))
    } // Fin if($_POST)

    echo '<div style="color: red;">'. $message .'</div>';
?>
    <!-- 2 - Création du formulaire : -->    

    <form method="post" action="action=information">
        <input type="hidden" id="id_film" name="id_film">

        <label for="titre">Titre</label><br>
        <input type="text" id="titre" name="titre" value=""><br><br>

        <label for="nom_realisateur">Nom du réalisateur</label><br>
        <input type="text" id="nom_realisateur" name="nom_realisateur" value=""><br><br>

        <label for="acteurs">Acteurs</label><br>
        <input type="text" id="acteurs" name="acteurs" value=""><br><br>

        <label for="producteur">Producteur</label><br>
        <input type="text" id="producteur" name="producteur" value=""><br><br>

        <label for="synopsis">Synopsis</label><br>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10"></textarea><br><br>

        <label for="annee_production">Année de production</label><br>
        <select name="annee_production" id="annee_production">
            <option value=""><?php 
                for ($i = date('Y'); $i >= date('Y')-100; $i--){
                    echo "<option>$i</option>";
                }
            ?></option>
        </select><br><br>

        <label for="langue">Langue</label><br>
        <select name="langue" id="langue">
            <option value="francais">Français</option>
            <option value="anglais">Anglais</option>
            <option value="allemand">Allemand</option>
            <option value="espagnol">Espagnol</option>
            <option value="italien">Italien</option>
        </select><br><br>

        <label for="categorie">Catégorie</label><br>
        <select name="categorie" id="categorie">
            <option value="comedy">Comédie</option>
            <option value="science-fiction">Science-fiction</option>
            <option value="horror">Horreur</option>
            <option value="documentary">Documentaire</option>
        </select><br><br>

        <label for="video">Bande annonce</label><br>
        <input type="url" name="video" id="video"><br><br>

        <input type="submit" value="Ajouter"><br><br>
    </form>

    <?php

    // Etape 3 :
        // On effectue la requête auprès de la BDD :
        $requete = $pdo->query("SELECT title, producer, year_of_prod FROM movies");

        $requete->rowCount();

            echo '<table border="1">';
                echo '<tr>';
                    for($i = 0; $i < $requete->columnCount(); $i++){
                        $colonne = $requete->getColumnMeta($i);
                        echo '<th>'. $colonne['name'] .'</th>';
                    }
                    echo '<th>Plus d\'infos</th>';
                echo '</tr>';

                while($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                    echo '<tr>';
                    if($ligne == 'titre' && !empty($value))
                        echo '<td><a href="?action=information&id_film='. $ligne['id_film'] .'">Plus d\infos</a><br></td>';
                    echo '</tr>';
                }
            echo '</table>';
    ?>
</body>
</html>