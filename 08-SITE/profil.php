<?php
require_once 'inc/init.inc.php';

// -------------------- TRAITEMENT ----------------------

// 2 - Si membre NON connecté, alors on le redirige vers la page de connexion : il n'a pas le droit d'accéder à son profil.
if (!internauteEstConnecte()){
    header('location:connexion.php');
    exit();
}

// 1 - Préparation des variables d'affichage :
extract($_SESSION['membre']); // Extrait tous les indices pour en faire des variables qui reçoivent la valeur qui leur correspond.





// --------------------- AFFICHAGE ----------------------

require_once 'inc/haut.inc.php';
?>
<h1 class="mt-4">Profil</h1>

<h2>Bonjour <strong><?php echo $prenom; ?> ! </strong></h2>

<?php
if (internauteEstConnecte()) echo '<p>Vous êtes un administrateur</p>';
?>

<hr>

<h3>Voici vos informations de profil</h3>

<p>Votre email : <?php echo $email; ?></p>
<p>Votre adresse : <?php echo $adresse; ?></p>
<p>Votre ville : <?php echo $ville; ?></p>


<?php
require_once 'inc/bas.inc.php';