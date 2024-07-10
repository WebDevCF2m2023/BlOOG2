<?php

use model\Mapping\FileMapping;
use model\Manager\FileManager;

// create file Manager
$fileManager = new FileManager($dbConnect);

// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idFile = (int) $_GET['view'];
    // select one file
    $selectOneFile = $fileManager->selectOneById($idFile);
    // view
    require "../view/file/selectOneFile.view.php";

// insert file page
}elseif(isset($_GET['insert'])){

// real insert file
    if(isset($_POST['file_url'])) {
        try{
            // create file
            $file = new FileMapping($_POST);
            // insert file
            $insertFile = $fileManager->insert($file);

            if($insertFile===true) {
                header("Location: ./?route=file");
                exit();
            }else{
                $error = $insertFile;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($file);

    }
    // view
    require "../view/file/insertFile.view.php";

// update file

}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idFile = (int)$_GET['update'];

    // update file
    if (isset($_POST['file_name'], $_POST["file_type"], $_POST["file_size"], $_POST["file_date_create"])) {
        try {
            // create file
            $file = new FileMapping($_POST);
            $file->setFileId($idFile);
            // update file
            $updateFile = $fileManager->update($file);
            if($updateFile===true) {
                header("Location: ./?route=file");
                exit();
            }else{
                $error = $updateFile;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($file);
    }
    // view
    $selectOneFile = $fileManager->selectOneById($idFile);
    require "../view/file/updateFile.view.php";

// delete file
}elseif (isset($_GET['delete'])&&ctype_digit($_GET['delete'])) {
    $idFile = (int)$_GET['delete'];
    // delete file
    $deleteFile = $fileManager->delete($idFile);
    if($deleteFile===true) {
        header("Location: ./?route=file");
        exit();
    }else{
        $error = $deleteFile;
    }
    // view all files   
}else{  
    $files = $fileManager->selectAll();

    require "../view/file/homepage.view.php";
}   
// close database
$dbConnect = null;
?>
