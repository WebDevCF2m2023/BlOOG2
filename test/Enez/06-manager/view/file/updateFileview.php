<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du FileManager::update()</title>
</head>
<body>
    <h1>Exemple du FileManager::update()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectOneComment)):
            ?>
            <h3>Fichier inexistant</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Modification d'un fichier</h3>
    <form action="" method="post">
        <label for="comment_text">fichier</label>
        <textarea name="comment_text" id="comment_text" cols="30" rows="10"><?=$selectOneComment->getCommentText()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>