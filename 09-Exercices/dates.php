<?php
/*
  1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
  Cette fonction prend 2 paramètres : une date et le format de conversion de sortie "US" ou "FR". Pour faire cette conversion, vous utilisez la classe DateTime.
	  
  2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
  
  3- Vous validez que la date fournie est bien une date. La fonction retourne un message si ce n'est pas le cas.
  
*/

// function convert($date, $format){
//   if(!strtotime($date)){
//     return '<p>La date est invalide !</p>';
//   }
//     $conversion = new DateTime($date);
//     if ($format != 'FR' && $format != 'US'){
//       return '<p>Le format de la date n\'est pas valide !</p>';
//     }
//       if ($format == 'US'){
//         return $conversion->format('Y-m-d');
//       } else {
//         return $conversion->format('d-m-Y');
//         }  
// } // Fin convert()

// echo convert('11-05-2017', 'FR');

// ----------- Correction -------------

function afficheDate($date, $format){
// On contrôle d'abord les valeurs reçues :
if ($format != 'FR' && $format != 'US'){
  return '<p>Le format demandé n\'est pas valide !</p>'; // return nous fait quitter la fonction, le reste du code qui suit n'est donc pas exécuté.
}
  if (!strtotime($date)){
    return '<p>La date est invalide !</p>';
  }
    // Traitement de l'affichage de la date :
    $objetDate = new DateTime($date);
    if ($format == 'FR'){
      return $objetDate->format('d-m-Y');
    } elseif ($format == 'US'){
      return $objetDate->format('Y-m-d');
    }
} // Fin afficheDate

echo afficheDate('15-13-2018', 'US');

?>