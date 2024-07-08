<?php
// on va utiliser notre manager de user

use model\Manager\UserManager;
// on va utiliser notre classe de mapping des user
use model\Mapping\UserMapping;


// create user Manager
$userManager = new UserManager($dbConnect);



// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idUser = (int) $_GET['view'];
    // select one User
    $selectOneUser = $userManager->selectOneById($idUser);
    // view
    require "../view/user/selectOneUser.view.php";

// insert User page
}elseif(isset($_GET['insert'])){

// real insert User
    if(isset($_POST['user_full_name'], $_POST['user_mail'])) {
        try{
            // create User
            $user = new UserMapping($_POST);
            // insert user
            $insertUser = $userManager->insert($user);

            if($insertUser===true) {
                header("Location: ./?route=user");
                exit();
            }else{
                $error = $insertUser;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        

    }
    // view
    require "../view/user/insertUser.view.php";

// delete User
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idUser = (int)$_GET['update'];

    // update User
    if (isset($_POST['user_full_name'])) {
        try {
            // create user
            $user = new UserMapping($_POST);
            $user->setUserId($idUser);
            // update user
            $updateUser = $userManager->update($user);
            if($updateUser===true) {
                header("Location: ./?route=user");
                exit();
            }else{
                $error = $updateUser;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one User
    $selectOneUser = $userManager->selectOneById($idUser);
    // view
    require "../view/user/updateUser.view.php";

// delete User
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idUser = (int) $_GET['delete'];
    // delete User
    $deleteUser = $userManager->delete($idUser);
    if($deleteUser===true) {
        header("Location: ./?route=user");
        exit();
    }else{
        $error = $deleteUser;
    }
    echo $error;
// homepage
}else{
    // select all user
    $selectAllUser = $userManager->selectAll();
    // view
    require "../view/user/SelectAllUser.php";
}