<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::selectOneComment()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Exemple du ArticleManager::selectOneComment()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

            if(is_null($selectOneArticle)):
            ?>
            <h3 class="text-warning">Commentaire inexistant</h3>
            <?php
            else:
            ?>
            <div class="article">
                <h4>ID : <?=$selectOneArticle->getArticleId()?> 
                    <a href="?route=article&view=<?=$selectOneArticle->getArticleId()?>" class="btn btn-info btn-sm">Voir cette article</a>
                </h4>
                <p><?=$selectOneArticle->getArticleText()?></p>
                <p class="text-muted"><?=$selectOneArticle->getArticleDateCreate()?></p>
                <hr>
            </div>
            <?php
            endif;
            ?>
        </div>

        <div class="mt-4">
            <h5>Debug Information</h5>
            <pre><?php var_dump($dbConnect, $articleManager); ?></pre>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
