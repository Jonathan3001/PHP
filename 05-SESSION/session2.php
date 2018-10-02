<?php

// Ouverture ou création d'une session :
session_start();

echo 'La session est accessible dans tous les script du site comme ici : ';
print_r($_SESSION); // on voit les infos de la session crée dans la page session1.php.

// Ce fichier n'a rien à voir avec l'autre, il n'y a pas d'inclusion, il pourrait être dans un autre dossier, s'appeler n'importe comment, les infos contenues dans la session restent accessibles grâce au session_start().