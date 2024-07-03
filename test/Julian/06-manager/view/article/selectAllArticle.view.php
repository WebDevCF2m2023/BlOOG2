<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Articles</title>
</head>

<body>
    <h1>ArticleManager::SelectAll()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY . "/view/menu.homepage.view.php";

        if (is_null($selectAllArticles)):
            ?>
            <h3>No articles yet!</h3>
            <?php
        else:
            foreach ($selectAllArticles as $item):
                ?>
                <h3><?= htmlspecialchars($item->getArticleTitle()) ?></h3>
                <h4>ID : <?= $item->getArticleID() ?> 
                    <a href="?route=article&view=<?= $item->getArticleID() ?>">Voire ce article</a> | 
                    <a href="?route=article&update=<?= $item->getArticleID() ?>">Mettre à jour</a> | 
                    <a href="?route=article&delete=<?= $item->getArticleID() ?>"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                </h4>
                <p><?= nl2br(htmlspecialchars(substr($item->getArticleText(), 0, 150))) ?>...</p>
                <p>Créé le: <?= $item->getArticleDateCreate() ?></p>
                <hr>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</body>

</html>