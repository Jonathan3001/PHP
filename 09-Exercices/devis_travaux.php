<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne  "Le montant de vos travaux est de X euros TTC." où X est le montant TTC calculé. Vous affichez le résultat au-dessus du formulaire.

*/

function montantTTC($montant, $duree){
	// echo $montant . $periode; // pour tester
	if($duree == 'plus de 5 ans'){
		$montantTTC = $montant * 1.1;
	} else {
		$montantTTC = $montant * 1.2;		
	}
	return $montantTTC;
}

if($_POST){
	// print_r($_POST);
	echo montantTTC($_POST['montant'], $_POST['duree']);	
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Devis de travaux</title>
</head>
<body>

	<h1>Votre devis de travaux</h1>
	
	<form method="post" action="?action=envoyer">
		<label for="montant">Montant travaux</label><br>
		<input type="text" id="montant" name="montant" value="<?php ?>"><br><br>

		<label for="duree">Durée des travaux</label><br>
		<input type="radio" name="duree" value="plus de 5 ans" checked>Plus de 5 ans
		<input type="radio" name="duree" value="5 ans ou moins">5 ans ou moins<br><br>

		<input type="submit" value="envoyer">
	</form>
</body>
</html>
