<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du ArticleManager::selectAll()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectAllArticle)):
        ?>
        <h3>Pas encore de commentaire !</h3>
        <?php
    else:
        foreach($selectAllArticle as $item):
        ?>
    <h4>ID : <?=$item->getArticleId()?> <a href="?route=article&view=<?=$item->getArticleId()?>">Voir ce commentaire via son id</a> | <a href="?route=article&update=<?=$item->getArticleId()?>">Mettre à jour</a> | <a href="?route=article&delete=<?=$item->getArticleId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a> </h4>
    <p><?=$item->getArticleText()?></p>
    <p><?=$item->getArticleDateCreate()?></p><hr>
        <?php
        endforeach;
        var_dump($selectAllArticle);
    endif;
        ?>
    </div>

</body>
</html>