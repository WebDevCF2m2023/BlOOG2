<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$articleManager = new ArticleManager($dbConnect);


// detail view
if (isset($_GET['view']) && ctype_digit($_GET['view'])) {
    $idArticle = (int) $_GET['view'];
    // select one article
    $selectOneArticle = $articleManager->selectOneById($idArticle);
    // view
    require "../view/article/selectOneArticle.view.php";

} elseif (isset($_GET['insert'])) {
    // real insert article
    if (isset($_POST['article_title']) && isset($_POST['article_text'])) {
        try {
            // create article
            $article = new ArticleMapping($_POST);
            // set date
            $article->setArticleDateCreate(new DateTime());
            $article->setArticleDateUpdate(new DateTime());

            // TODO: Replace this with actual user authentication
            // For now, we're using a placeholder user ID
            $article->setUserUserId(1); // Using 1 as a placeholder user ID
            
            // insert article
            $insertArticle = $articleManager->insert($article);

            if ($insertArticle === true) {
                header("Location: ./?route=article");
                exit();
            } else {
                $error = $insertArticle;
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        //var_dump($article);

    }
    // view
    require "../view/article/insertArticle.view.php";

} elseif (isset($_GET['update']) && ctype_digit($_GET['update'])) {
    $idArticle = (int) $_GET['update'];

    // select one article before the update attempt
    $selectOneArticle = $articleManager->selectOneById($idArticle);

    // update article
    if (isset($_POST['article_title']) && isset($_POST['article_text'])) {
        try {
            // create article
            $article = new ArticleMapping($_POST);
            $article->setArticleId($idArticle);
            $article->setArticleDateUpdate(new DateTime());
            
            // Set the slug if provided, otherwise use the title
            if (!empty($_POST['article_slug'])) {
                $article->setArticleSlug($_POST['article_slug']);
            } else {
                $article->setArticleSlug($article->getArticleTitle());
            }
            
            // update article
            $updateArticle = $articleManager->update($article);
            if ($updateArticle === true) {
                header("Location: ./?route=article");
                exit();
            } else {
                $error = $updateArticle;
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    // If update failed or not attempted, we still need the article data for the form
    if (!isset($article)) {
        $selectOneArticle = $articleManager->selectOneById($idArticle);
    }
    
    // view
    require "../view/article/updateArticle.view.php";

} elseif (isset($_GET['delete']) && ctype_digit($_GET['delete'])) {
    $idArticle = (int) $_GET['delete'];

    // delete article
    $deleteArticle = $articleManager->delete($idArticle);
    if ($deleteArticle === true) {
        header("Location: ./?route=article");
        exit();
    } else {
        $error = $deleteArticle;
    }

} else {
    // select all article
    $selectAllArticles = $articleManager->selectAll();
    // view
    require "../view/article/selectAllArticle.view.php";
}
