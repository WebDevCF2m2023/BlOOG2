<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article</title>
</head>
<body>
    
    <h1>Update Article</h1>

    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectOneArticle)):
            ?>
            <h3>Article does not exist</h3>
            
            <?php
        else:
            if(isset($error)) echo "<h4>$error</h4>";
            ?>
        <h3>Update an article</h3>
        <form action="" method="post">
            <label for="article_title">Titre</label>
            <input type="text" name="article_title" id="article_title" value="<?=htmlspecialchars($selectOneArticle->getArticleTitle())?>">
            <br><br>
            <label for="article_slug">Slug (laisser vide pour générer à partir du titre)</label>
            <input type="text" name="article_slug" id="article_slug" value="<?=htmlspecialchars($selectOneArticle->getArticleSlug())?>">
            <br><br>
            <label for="article_text">Article</label>
            <textarea name="article_text" id="article_text" cols="30" rows="10"><?=htmlspecialchars($selectOneArticle->getArticleText())?></textarea>
            <br><br>
            <input type="submit" value="Update">
        </form>
            <?php
        endif;
        ?>
    </div>
    
</body>
</html>