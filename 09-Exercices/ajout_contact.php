<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone VARCHAR(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/
// while ($annee_rencontre <= date('Y')){
	// 	echo '<option>' . $annee_rencontre . '</option>';
	// 	$annee_rencontre++;
	// }


$message = '';

// 2 - connexion à la BDD

$pdo = new PDO('mysql:host=localhost;dbname=contacts',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8')
);

var_dump($_POST);

// 3 - Validation du formulaire

if(!empty($_POST)){
	if(!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $message .= '<p style="background: orange">Le nom doit comporter entre 2 et 20 caractères !</p>';

	if(!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $message .= '<p style="background: orange">Le prénom doit comporter entre 2 et 20 caractères !</p>';

	if(!isset($_POST['telephone']) || !is_numeric($_POST['telephone']) || strlen($_POST['telephone']) != 10) $message .= '<p style="background: orange">Le numero de téléphone doit comporter 10 chiffres !</p>';

	if(!isset($_POST['annee_rencontre']) || !strtotime($_POST['annee_rencontre'])) $message .= '<p style="background: orange">Veuillez sélectionner une année valide !</p>';

	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $message .= '<p style="background: orange">L\'email est incorrect.</p>';

	if(!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre')) $message .= '<p style="background: orange">Veuillez sélectionner un type de contact valide ! </p>';

	if (empty($message)){
		foreach($_POST as $indice => $valeur){
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		$resultat = $pdo->prepare("INSERT INTO contact (id_contact, nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES (:id_contact, :nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");

		$resultat->bindParam(':id_contact', $_POST['id_contact']);
		$resultat->bindParam(':nom', $_POST['nom']);
		$resultat->bindParam(':prenom', $_POST['prenom']);
		$resultat->bindParam(':telephone', $_POST['telephone']);
		$resultat->bindParam(':annee_rencontre', $_POST['annee_rencontre']);
		$resultat->bindParam(':email', $_POST['email']);
		$resultat->bindParam(':type_contact', $_POST['type_contact']);

		$requeteContact = $resultat->execute();

		if ($requeteContact){
			$message .= '<p style="background: green">Le contact a bien été ajouté !</p>';
		} else {
			$message .= '<p style="background: red">Erreur lors de l\'enregistrement du contact !</p>';
		}

	} // Fin du if (empty($message))

} // Fin du if(!empty($_POST))


// 1 - Le formulaire HTML
	
$annee_rencontre = date('Y') - 100;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulaire de contact</title>
</head>
<body>
	<?php
	echo $message;
	?>
	<form method="post" action="">
		<input type="hidden" name="id_contact" value="0">

		<label for="nom">Nom</label><br>	
		<input type="text" id="nom" name="nom" value=""><br><br>

		<label for="prenom">Prénom</label><br>	
		<input type="text" id="prenom" name="prenom" value=""><br><br>

		<label for="telephone">Téléphone</label><br>	
		<input type="text" id="telephone" name="telephone" value=""><br><br>

		<label for="annee_rencontre">Année</label><br>
		<select name="annee_rencontre" id="annee_rencontre">
			<option value="annee_rencontre"><?php 
			/* while ($annee_rencontre <= date('Y')){
				echo '<option>' . $annee_rencontre . '</option>';
				$annee_rencontre++;
			} */ 
			// Avec boucle for
			for ($i = date('Y'); $i >= date('Y')-100; $i--){
				echo "<option>$i</option>";
			}
				?></option>
		</select><br><br>

		<label for="email">Email</label><br>	
		<input type="text" id="email" name="email" value=""><br><br>

		<label for="type_contact">Type Contact</label><br>
		<select name="type_contact" id="type_contact">
			<option value="ami">Ami</option>
			<option value="famille">Famille</option>
			<option value="professionnel">Professionnel</option>
			<option value="autre">Autre</option>
		</select><br><br>

		<input type="submit" value="Envoyer">	
	</form>
</body>
</html>
