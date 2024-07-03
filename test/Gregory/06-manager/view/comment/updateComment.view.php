<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::update()</title>
</head>
<body>
    <h1>Exemple du CommentManager::update()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectOneComment)):
            ?>
            <h3>Commentaire inexistant</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Modification d'un commentaire</h3>
    <form action="" method="post">
        <label for="comment_text">Commentaire</label>
        <select name="user_user_id" id="user_user_id">
            <?php foreach($users as $user): ?>
                <option value="<?=$user['user_id']?>" <?=$selectOneComment->getUserUserId()==$user["user_id"] ? "selected" : ""?>><?=$user["user_login"]?></option>
            <?php endforeach; ?>
        </select>
        <select name="article_article_id" id="article_article_id">
            <?php foreach($articles as $article): ?>
                <option value="<?=$article['article_id']?>" <?=$selectOneComment->getArticleArticleId()==$article["article_id"] ? "selected" : ""?>><?=$article["article_title"]?></option>
            <?php endforeach; ?>
        </select>
        <textarea name="comment_text" id="comment_text" cols="30" rows="10"><?=$selectOneComment->getCommentText()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>