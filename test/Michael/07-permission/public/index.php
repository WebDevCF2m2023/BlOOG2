<?php
// chargement dépendance
require_once "../config.php";

// pour indiquer à l'autoload le chemin de notre classe
use model\Mapping\Permission;


// notre autoload qui fonctionne avec les noms de dossiers/fichiers 
// depuis la racine
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

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