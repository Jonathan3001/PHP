<?php

function debug($param){
    echo '<pre>';
        print_r($param);
    echo '</pre>';
}

// ------------- FONCTIONS MEMBRES --------------
// Cette fonction m'indique si l'internaute est connecté :
function internauteEstConnecte(){
    if(isset($_SESSION['membre'])){
        return true; // si l'indice "membre" existe dans la session, c'est que l'internaute est passé par le formulaire de connexion avec le bon login/mdp. On retourne donc TRUE
    } else{
        return false; // Dans le cas contraire, il n'est pas connecté, on retourne FALSE
    }
    // ou :
    return (isset($_SESSION['membre']));
}

// Fonction qui indique si le membre et un administrateur et est connecté :
function EstConnecteEtAdmin(){
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
        return true;
    } else {
        return false;
    }    
}

// ------------- FONCTION DE REQUETE ---------------

function executeRequete($requete, $param = array()){
    if(!empty($param)){ // Si j'ai bien reçu un array rempli, je peux faire la foreach dessus pour transformer les caractères spéciaux en entités HTML.
        foreach ($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // Pour éviter les injections CSS et JS.
        }
    }
    global $pdo; // Permet d'avoir accès (àl'intérieur de la fonction) à la variable $pdo définie dans l'espace global (à l'extérieur de la fonction).

    $resultat = $pdo->prepare($requete); // On prépare la requête fournie lors de l'appel de la fonction.
    $resultat->execute($param); // On exécute en liant les marqueurs aux valeurs qui se trouvent dans l'array $param fourni lors de l'appel de la fonction.

    return $resultat; // On retourne l'objet PDOStatement à l'endroit où la fonction executeRequete() est appelée.
}