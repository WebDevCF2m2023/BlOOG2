<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::selectOneComment()</title>
</head>
<body>
    <h1>Exemple du ArticleManager::selectOneComment()</h1>
    <div>
        <?php

        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectOneArticle)):
        ?>
        <h3>Commentaire inexistant</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneArticle->getArticleId()?> <a href="?route=article&view=<?=$selectOneArticle->getArticleId()?>">Voir ce commentaire via son id</a></h4>
    <p><?=$selectOneArticle->getArticleText()?></p>
    <p><?=$selectOneArticle->getArticleDateCreate()?></p><hr>
        <?php
    endif;
        ?>
    </div>
    
    <?php
var_dump($dbConnect,$articleManager);
    ?>
</body>
</html>