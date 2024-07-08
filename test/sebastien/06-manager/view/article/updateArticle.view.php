<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::update()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Exemple du ArticleManager::update()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

            if(is_null($selectOneArticle)):
                ?>
                <h3 class="text-warning">Article inexistant</h3>
            <?php
            else:
                if(isset($error)) echo "<h4 class='text-danger'>$error</h4>";
            ?>
            <h3>Modification d'un article</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="article_text">Article</label>
                    <textarea class="form-control" name="article_text" id="article_text" cols="30" rows="10"><?=$selectOneArticle->getArticleText()?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </div>
            </form>
            <?php
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
