<?php

require_once '../inc/init.inc.php';

// --------------------- TRAITEMENT ----------------------

// 1 - On vérifie que le membre est administrateur :
if(!EstConnecteEtAdmin()){
    header('location:../connexion.php'); // Je remonte dans le dossier parent pour accéder au fichier connexion.php
    exit(); // Pour quitter le script
}

// 7 - Suppression d'un produit :
debug($_GET);

if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])){ // si existe l'indice "action" dans $_GET et que sa valeur est "suppression" et qu'existe aussi l'indice "id_produit", alors je peux traiter la suppression du produit demandé.

    $resultat = executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

    if ($resultat->rowCount() == 1){
        // si le DELETE retourne une ligne, c'est que l'id_produit existe et qu'il a pu être supprimé :
        $contenu .= '<div class="alert alert-success">Le produit n° '. $_GET['id_produit'] .' a bien été supprimé.</div>';
    } else {
        // sinon c'est que l'id_produit n'existe pas ou plus
    $contenu .= '<div class="alert alert-danger">Erreur lors de la suppression du produit n° '. $_GET['id_porduit'] .'</div>';
    }
}

// 6 - Affichage des produits dans une table HTML :
// Exercice : afficher tous les produits sous forme de table HTML. Cette table est stockée dans la variable $contenu. Tous les champs doivent être affichés. Pour la photo, vous affichez l'image (90px de largeur).

// $resultat = $pdo->query("SELECT * FROM produit");

//     $contenu .= '<table border="1">';
//         $contenu .= '<tr>';
//             for($i = 0; $i < $resultat->columnCount(); $i++){
//                 // debug($resultat->getColumnMeta($i));
//                 $colonne = $resultat->getColumnMeta($i);
//                 $contenu .= '<th>' . $colonne['name'] . '</th>';
//             }
//         $contenu .= '</tr>';        

//     while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
//         $contenu .= '<tr>';
//         debug($ligne);
//         foreach($ligne as $indice => $information){
//             if($indice == 'photo'){
//                 $contenu .= '<td><img src="../'. $information .'" style="height:90px"></td>';                
//             } else {
//                 $contenu .= '<td>' . $information . '</td>';
//             }            
//         }
//         $contenu .= '</tr>';
//     }    
// $contenu .= '</table>';

// -------- Correction --------

$resultat = $pdo->query("SELECT * FROM produit");

$contenu .= 'Nombre de produit(s) dans la boutique : ' . $resultat->rowCount();

$contenu .= '<table class="table">';
    // Affichage des entêtes dynamiquement :
    $contenu .= '<tr>';
        for($i = 0; $i < $resultat->columnCount(); $i++){
            $colonne = $resultat->getColumnMeta($i);
            // debug($colonne); // on a le nom du champ à l'indice "name"
            $contenu .= '<th>'. $colonne['name'] .'</th>';
        }

        $contenu .= '<th>Actions</th>'; // On ajoute cette colonne en plus des autres affichées dynamiquement

        $contenu .= '</tr>';

    // Affichage des lignes :
        while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
            $contenu .= '<tr>';
                foreach($ligne as $indice => $value){
                    if ($indice == 'photo' && !empty($value)){
                        $contenu .= '<td><img src="../'. $value .'" alt="'. $ligne['titre'] .'" style="width: 90px"></td>';
                    } else {
                        $contenu .= '<td>'. $value .'</td>';
                    }
                }
                $contenu .= '<td>
                                <a href="ajout_modif_produit.php?action=modification&id_produit='. $ligne['id_produit'] .'">modifier</a><br>                        
                                <a href="?action=suppression&id_produit='. $ligne['id_produit'] .'">supprimer</a>                        
                             </td>';

            $contenu .= '</tr>';
        }
$contenu .= '</table>';


// --------------------- AFFICHAGE -----------------------

require_once '../inc/haut.inc.php';
?>

<h1 class="mt-4">Gestion boutique</h1>

<ul class="nav nav-tabs">
    <li><a href="gestion_boutique.php" class="nav-link active">Affichage des produits</a></li>
    <li><a href="ajout_modif_produit.php" class="nav-link">Ajout d'un produit</a></li>
</ul>

<?php
echo $contenu; // pour afficher la table des produits

require_once '../inc/bas.inc.php';