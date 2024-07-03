<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Example of ArticleManager::selectOneArticle()</h1>

    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectOneArticle)):
        ?>
        <h3>Article does not exist</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneArticle->getArticleID()?> <a href="?route=article&view=<?=$selectOneArticle->getArticleID()?>">View this article via its id</a></h4>
    <p><?=$selectOneArticle->getArticleText()?></p>
    <p><?=$selectOneArticle->getArticleDateCreate()?></p><hr>
        <?php
    endif;
        ?>
        
    </div>
    
</body>
</html>