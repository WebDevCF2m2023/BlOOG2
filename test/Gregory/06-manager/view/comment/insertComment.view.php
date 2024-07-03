<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::insert()</title>
</head>
<body>
    <h1>Exemple du CommentManager::insert()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'un commentaire</h3>
    <form action="" method="post">
        <label for="comment_text">Commentaire</label>
        <select name="user_user_id" id="user_user_id">
            <?php foreach($users as $user): ?>
                <option value="<?=$user['user_id']?>"><?=$user["user_login"]?></option>
            <?php endforeach; ?>
        </select>
        <select name="article_article_id" id="article_article_id">
            <?php foreach($articles as $article): ?>
                <option value="<?=$article['article_id']?>"><?=$article["article_title"]?></option>
            <?php endforeach; ?>
        </select>
        <textarea name="comment_text" id="comment_text" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>