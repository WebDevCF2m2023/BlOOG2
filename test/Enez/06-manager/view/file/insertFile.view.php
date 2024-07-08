<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du FileManager::insert()</title>
</head>
<body>
    <h1>Exemple du FileManager::insert()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'un fichier</h3>
    <form action="" method="post">
        <label for="comment_text">File</label>
        <textarea name="comment_text" id="comment_text" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>