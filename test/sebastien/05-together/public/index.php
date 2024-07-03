<?php

// session

//on indique le chemin vers des class que on utulisera 
use model\Interface\InterfaceManager;
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


// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idPermission = (int) $_GET['view'];
    // select one permission
    $selectOnePermission = $permissionManager->selectOneById($idPermission);
    // view
    require "../view/permission/selectOnePermission.view.php";

// insert permission page
}elseif(isset($_GET['insert'])){

// real insert permission
    if(isset($_POST['permission_name'], $_POST['permission_description'])) {
        try{
            // create permission
            $permission = new PermissionMapping($_POST);
            
            // insert permission
            $insertPermission = $permissionManager->insert($permission);

            if($insertPermission===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertPermission;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        

    }
    // view
    require "../view/permission/insertPermission.view.php";

// update permission
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idPermission = (int)$_GET['update'];

    // update permission
    if (isset($_POST['permission_name'], 
              $_POST['permission_description'])) {
        try {
            // create permission
            $permission = new PermissionMapping($_POST);
            $permission->setPermissionId($idPermission);
            // update permission
            $updatePermission = $permissionManager->update($permission);
            if($updatePermission===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updatePermission;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one permission
    $selectOnePermission = $permissionManager->selectOneById($idPermission);
    // view
    require "../view/permission/updatePermission.view.php";

// delete permission
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idPermission = (int) $_GET['delete'];
    // delete permission
    $deletePermission = $permissionManager->delete($idPermission);
    if($deletePermission===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deletePermission;
    }

// homepage
}else{
    // select all permission
    $selectAllPermissions = $permissionManager->selectAll();
    // view
    require "../view/permission/selectAllPermission.view.php";
}

$dbConnect = null;



