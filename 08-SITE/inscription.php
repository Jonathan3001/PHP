<?php

require_once 'inc/init.inc.php';
$affiche_formulaire = true; // Pour afficher le formulaire tant que le memebre n'est pas inscrit

// --------------------- TRAITEMENT ------------------------------

// Traitement de $_POST :
// debug($_POST);

if ($_POST){ // Si le formulaire est envoyé
    // Validation du formulaire :
    if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) $contenu .= '<div class="bg-danger">Le pseudo doit contenir entre 4 et 20 caractères.</div>';

    if (!isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) $contenu .= '<div class="bg-danger">Le mot de passe doit contenir entre 4 et 20 caractères.</div>';

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $contenu .= '<div class="bg-danger">Le nom doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $contenu .= '<div class="bg-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['ville']) || strlen($_POST['ville']) < 2 || strlen($_POST['ville']) > 20) $contenu .= '<div class="bg-danger">La ville doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50) $contenu .= '<div class="bg-danger">L\'adresse doit contenir entre 4 et 50 caractères.</div>';
    
    if (!isset($_POST['civilite']) || ($_POST['civilite'] != 'm' && $_POST['civilite'] != 'f')) $contenu .= '<div class="bg-danger">La civilité est incorrecte.</div>';

    if (!isset($_POST['code_postal']) || !preg_match('#^[0-9]{5}$#', $_POST['code_postal']))$contenu .= '<div class="bg-danger">Le code postal est incorrect.</div>'; // L'expression rationnelle (ou régulière) est encadrée par des '#'. Le '^' signifie que le code postal "commence par" et le '$' signifie qu'il "finit par". La présence des deux symboles en même temps signifie qu'on défini l'intégralité de l'expression. [0-9] définit les caractères autorisés de 0 à 9. {5} définit strictement le nombre de ces caractères. La fonction prédéfinie preg_match() retourne 0 si le code postal n'est pas correct, sinon 1.

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $contenu .= '<div class="bg-danger">L\'email est incorrect.</div>'; // filter_var() avec le paramètre FILTER_VALIDATE_EMAIL permet de vérifier que la variable est bien de type email. Pour info, vous pouvez valider d'autres types : les adresses IP, les formats d'url... (voir la doc php.net)

    // Si plus d'erreur sur le formulaire, on vérifie la disponibilité du pseudo avant d'inscrire le membre en BDD :
    if (empty($contenu)){ // Si $contenu est vide, c'est qu'il n'y a plus de message d'erreur
        // Vérifier en BDD que le pseudo n'existe pas :
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo'])); //$memebre contient un objet PDOStatement qui provient de la requête SQL

        if ($membre->rowCount() > 0){
            //  Si la requête retourne des lignes, c'est que le pseudo existe en BDD :
            $contenu .= '<div class="bg-danger">Le pseudo existe déjà : veuillez en choisir un autre.</div>';
        } else {
            //  Le pseudo est disponible : on inscrit donc le membre en BDD
            executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)", array(
                ':pseudo'       => $_POST['pseudo'],
                ':mdp'          => $_POST['mdp'],
                ':nom'          => $_POST['nom'],
                ':prenom'       => $_POST['prenom'],
                ':email'        => $_POST['email'],
                ':civilite'     => $_POST['civilite'],
                ':ville'        => $_POST['ville'],
                ':code_postal'  => $_POST['code_postal'],
                ':adresse'      => $_POST['adresse'],
            ));

            $contenu .= '<div class="bg-success">Vous êtes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter.</a></div>';
            $affiche_formulaire = false;
        }
    } // Fin du if (empty($contenu))
} // Fin de if ($_POST)


// --------------------- AFFICHAGE -----------------------
require_once 'inc/haut.inc.php';
?>
<h1 class="mt-4">Inscription</h1>

<?php
echo $contenu;
if ($affiche_formulaire) : // Si l'internaute n'est pas inscrit, cette variable valant "true", on entre dans la condition et on affiche le formulaire.
?>
<p>Veuillez renseigner le formulaire pour vous inscrire.</p>

<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value="<?php echo $_POST['mdp'] ?? ''; ?>"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? ''; ?>"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>"><br><br>

    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"><br><br>

    <label>Civilité</label>
    <input type="radio" name="civilite" value="m" checked> Homme
    <input type="radio" name="civilite" value="f" <?php if (isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'checked'; ?>> Femme<br><br>

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" value="<?php echo $_POST['ville'] ?? ''; ?>"><br><br>

    <label for="code_postal">Code postal</label><br>
    <input type="text" id="code_postal" name="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>"><br><br>

    <label for="adresse">Adresse</label><br>
    <textarea name="adresse" id="adresse" cols="30" rows="10"><?php echo $_POST['adresse'] ?? ''; ?></textarea><br>

    <input type="submit" value="s'inscrire" name="inscription" class="btn">
</form>


<?php
endif;


require_once 'inc/bas.inc.php';