<?php
// Connexion à la BDD :
$pdo = new PDO ('mysql:host=localhost;dbname=phoenix',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8')
);

define('RACINE_SITE', '/PHP/WorkShopPHP/');

$voyage = '';
$reservation = '';
$confirmation = '';

require_once 'fonction.inc.php';