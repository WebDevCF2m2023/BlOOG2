<?php

// session
session_start();

// On indique le chemin vers des class qu'on utilisera
use model\Mapping\PermissionMapping;
use model\Manager\PermissionManager;



// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

// PDO connection
$PDOconnect = new PDO( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);

// instanciation du manager de permission
// avec notre connexion PDO
$permissionManager = new PermissionManager($PDOconnect);


//homepage
$allPermission = $permissionManager->selectAll();

// vue
require PROJECT_DIRECTORY."/view/permission/permission.homepage.view.php";

//var_dump($allPermission,$permissionManager);