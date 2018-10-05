<?php
require_once 'inc/init.inc.php';

// 2 - Deconnexion de l'internaute :
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion'){ // Si on reçoit en $_GET dans l'url l'indice "action" et la valeur "deconnexion", c'est que l'internaute veut se deconnecter
    unset($_SESSION['membre']); // On supprime les informations du membre dans la session
    
    $contenu .= '<div class="alert alert-info">Vous avez été déconnecté.</div>';

}

// 3 - L'internaute connecté est redirigé vers son profil : il n'y a pas de raison qu'il puisse se reconnecter une seconde fois :

if (internauteEstConnecte()){
    header('location:profil.php');
    exit();
}



// 1 - Traitement du formulaire de connexion :
    // debug($_POST);

    if ($_POST){
        // contrôle sur le formulaire :
        if (empty($_POST['pseudo'])){ // empty vérifie si c'est vide (0, NULL, '', false ou non défini)
            $contenu .= '<div class="bg-danger">Le pseudo est requis.</div>';
        }

        if (empty($_POST['mdp'])){ 
        $contenu .= '<div class="bg-danger">Le mot de passe est requis.</div>';
        }

        if (empty($contenu)){ // Si $contenu est vide, c'est qu'il n'y a pas d'erreur sur le formulaire: on peut donc interroger la BDD.
            $resultat = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp", array(':pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp']));

            if ($resultat->rowCount() > 0){ // S'il y a 1 (ou plusieurs) lignes dans $resultat, le pseudo et le mdp existent pour le même membre
                $membre = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car il n'y a qu'une seule ligne de résultat dans la requête. (Les pseudo sont uniques).

                $_SESSION['membre'] = $membre; // Nous créons une session appelée "membre" qui contient les informations provenant de la BDD

                header('location:profil.php'); // On redirige (redirection) l'internaute vers la page située à l'url "profil.php"
                exit(); // et on quitte le script

            } else {
                // Sinon; il n'y a pas de correspondance entre le login et le mdp pour le même membre
                $contenu .= '<div class="bg-danger">Erreur sur les identifiants.</div>';
            }

        } // Fin du if (empty($contenu))

    } // Fin du if ($_POST)








// -------------------- AFFICHAGE -----------------------
require_once 'inc/haut.inc.php';
?>
<h1 class="mt-4">Connexion</h1>
<p>Veuillez indiquer vos identifiants pour vous connecter.</p>

<?php echo $contenu; ?>

<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="text" id="mdp" name="mdp"><br><br>

    <input type="submit" value="Se connecter" class="btn">
</form>
    
<?php
require_once 'inc/bas.inc.php';