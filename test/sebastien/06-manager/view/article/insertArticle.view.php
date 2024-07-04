<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::insert()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Exemple du ArticleManager::insert()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
            if(isset($error)) echo "<h4 class='text-danger'>$error</h4>";
            ?>
        </div>
        <h3>Insertion d'un article</h3>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="user_user_id" id="user_user_id" placeholder="id" required/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="article_title" id="article_title" placeholder="title" required/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="article_slug" id="article_slug" placeholder="slug" />
            </div>
            <div class="form-group">
                <label for="article_text">article</label>
                <textarea class="form-control" name="article_text" id="article_text" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Envoyer">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
