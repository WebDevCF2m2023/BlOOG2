<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::insert()</title>
</head>
<body>
    <h1>Exemple du ArticleManager::insert()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'un article</h3>
    <form action="" method="post">
    <div>
        <input type="text" name="user_user_id" id="user_user_id" placeholder="id" required/>
    </div>
    <div>
        <input type="text" name="article_title" id="article_title" placeholder="title" required/>
    </div>
    <div>
        <input type="text" name="article_slug" id="article_slug" placeholder="slug" />
    </div>
        <label for="article_text">article</label>
        <textarea name="article_text" id="article_text" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>