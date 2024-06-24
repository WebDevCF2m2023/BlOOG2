<?php

// session

use model\Manager\PermissionManager;
use model\Mapping\PermissionMapping;

session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

// PDO connection
$dbConnect = new PDO( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);

// Instanciation du Manager de Permission
$permissionManager = new PermissionManager($dbConnect);

// homepage
$allPermission = $permissionManager->selectAll();

// vue
require PROJECT_DIRECTORY . '/view/permission/permission.homepage.view.php';