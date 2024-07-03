<?php
// on va utiliser notre manager de commentaires
use model\Manager\ArticleManager;
// on va utiliser notre classe de mapping des article
use model\Mapping\ArticleMapping;


// create article Manager
$articleManager = new articleManager($dbConnect);



// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idArticle = (int) $_GET['view'];
    // select one comment
    $selectOneArticle = $articleManager->selectOneById($idArticle);
    // view
    require "../view/article/selectOneArticle.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['article_text'])) {
        try{
            // create comment
            $article = new ArticleMapping($_POST);
            // set date
            $article->getArticleDatePublish(new DateTime());
            // insert comment
            $insertArticle = $articleManager->insert($article);

            if($insertArticle===true) {
                header("Location: ./?route=article");
                exit();
            }else{
                $error = $insertArticle;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        

    }
    // view
    require "../view/article/insertArticle.view.php";

// delete Article
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idArticle = (int)$_GET['update'];

    // update Article
    if (isset($_POST['article_text'])) {
        try {
            // create Article
            $article = new ArticleMapping($_POST);
            $article->setArticleId($idArticle);
            // update Article
            $updateArticle = $articleManager->update($article);
            if($updateArticle===true) {
                header("Location: ./?route=article");
                exit();
            }else{
                $error = $updateArticle;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one Article
    $selectOneArticle = $articleManager->selectOneById($idArticle);
    // view
    require "../view/article/updateArticle.view.php";

// delete Article
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idArticle = (int) $_GET['delete'];
    // delete Article
    $deleteArticle = $articleManager->delete($idArticle);
    if($deleteArticle===true) {
        header("Location: ./?route=article");
        exit();
    }else{
        $error = $deleteArticle;
    }
    echo $error;
// homepage
}else{
    // select all Article
    $selectAllArticle = $articleManager->selectAll();
    // view
    require "../view/article/SelectAllArticle.php";
}