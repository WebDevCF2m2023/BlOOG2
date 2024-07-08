<?php
// chargement dépendance
require_once "../config.php";
// Manuellement  nous importons notre classe de mapping
require '../model/Mapping/Permission.php';

// Connexion à la DB
$db = new PDO( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);
// tableau associatif en fetch associatif
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$perm1 = new Permission(5,"coucou","Excuse moi Greg, c'est vrai, je me tais!");

// Affichage grâce aux getters
echo $perm1->getPermissionId();

var_dump($perm1);