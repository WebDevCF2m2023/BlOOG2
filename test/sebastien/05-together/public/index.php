<?php

// session

//on indique le chemin vers des class que on utulisera 
use model\Interface\InterfaceManager;
use model\Manager\PermissionManager;

session_start();

// Appel de la config
require_once "../config.php";



// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});


// connect database
$dbConnect = new PDO( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);

$permissionManager = new PermissionManager($dbConnect);
$allPermission = $permissionManager->selectAll();
require PROJECT_DIRECTORY."/view/permission/permission.homepage.view.php";


var_dump($permissionManager);