<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
    <h1>Article Insert</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
        <h3>Insertion d'un article</h3>
        <form action="" method="post">
            <label for="article_title">Titre</label>
            <input type="text" name="article_title" id="article_title">
            <br><br>    
            <label for="article_text">Contenu</label>
            <textarea name="article_text" id="article_text" cols="30" rows="10"></textarea>
            <br><br>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    
</body>
</html>