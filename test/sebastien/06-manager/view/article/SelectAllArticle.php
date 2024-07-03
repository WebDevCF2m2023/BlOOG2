<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::selectAll()</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Exemple du ArticleManager::selectAll()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

            if(is_null($selectAllArticle)):
            ?>
            <h3 class="text-warning">Pas encore d'article !</h3>
            <?php
            else:
                foreach($selectAllArticle as $item):
            ?>
            <div class="article">
                <h4>ID : <?=$item->getArticleId()?> 
                    <a href="?route=article&view=<?=$item->getArticleId()?>" class="btn btn-info btn-sm">Voir cette article</a> 
                    | <a href="?route=article&update=<?=$item->getArticleId()?>" class="btn btn-warning btn-sm">Mettre à jour</a> 
                    | <a href="?route=article&delete=<?=$item->getArticleId()?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a>
                </h4>
                <p><?=$item->getArticleText()?></p>
                <p class="text-muted"><?= is_null($item->getArticleDateUpdate()) ? $item->getArticleDateCreate() : $item->getArticleDateUpdate() ?></p>
                <hr>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
