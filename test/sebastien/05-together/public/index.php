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
try {
    $dbConnect = new PDO(
        DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
        DB_LOGIN,
        DB_PWD
    );
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}


$permissionManager = new PermissionManager($dbConnect);

$allPermission = $permissionManager->selectAll();

$selectedPermission = null;
if (isset($_GET['permission_id'])) {
    $permissionId = (int)$_GET['permission_id'];
    $selectedPermission = $permissionManager->selectOneById($permissionId);
}


require PROJECT_DIRECTORY."/view/permission/permission.homepage.view.php";
require PROJECT_DIRECTORY."/view/permissionview/selectOnePermission.view.php";


var_dump($permissionManager);
var_dump($selectedPermission);