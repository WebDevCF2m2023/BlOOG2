<?php
// on va utiliser notre manager de catégories
use model\Manager\CategoryManager;
// on va utiliser notre classe de mapping de catégories
use model\Mapping\CategoryMapping;


// create category Manager
$categoryManager = new CategoryManager($dbConnect);



// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idCategory = (int) $_GET['view'];
    // select one category
    $selectOneCategory = $categoryManager->selectOneById($idCategory);
    // view
    require "../view/category/selectOneCategory.view.php";

// insert category page
}elseif(isset($_GET['insert'])){

// real insert category
    if(isset($_POST['category_name'], $_POST['category_slug'], $_POST['category_description'], $_POST['category_parent'])) {
        try{
            // create category
            $category = new CategoryMapping($_POST);
            // insert category
            $insertCategory = $categoryManager->insert($category);

            if($insertCategory===true) {
                header("Location: ./?route=category");
                exit();
            }else{
                $error = $insertCategory;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }

    }
    // view
    require "../view/category/insertCategory.view.php";

// delete category
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idCategory = (int)$_GET['update'];

    // update category
    if(isset($_POST['category_name'], $_POST['category_slug'], $_POST['category_description'], $_POST['category_parent'])) {
        try {
            // create category
            $category = new CategoryMapping($_POST);
            $category->setCategoryId($idCategory);
            // update category
            $updateCategory = $categoryManager->update($category);
            if($updateCategory===true) {
                header("Location: ./?route=category");
                exit();
            }else{
                $error = $updateCategory;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one category
    $selectOneCategory = $categoryManager->selectOneById($idCategory);
    // view
    require "../view/category/updateCategory.view.php";

// delete category
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idCategory = (int) $_GET['delete'];
    // delete category
    $deleteCategory = $categoryManager->delete($idCategory);
    if($deleteCategory===true) {
        header("Location: ./?route=category");
        exit();
    }else{
        $error = $deleteCategory;
    }

// homepage
}else{
    // select all categories
    $selectAllCategories = $categoryManager->selectAll();
    // view
    require "../view/category/selectAllCategories.view.php";
}