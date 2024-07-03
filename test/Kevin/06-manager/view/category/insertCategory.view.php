<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::insert()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::insert()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'une catégorie</h3>
    <form action="" method="post">
        <div>
            <label for="category_name">Catégorie</label>
            <input type="text" name="category_name" id="category_name" required>
        </div>
        <div>
            <label for="category_slug">Slug</label>
            <input type="text" name="category_slug" id="category_slug">
        </div>
        <div>
            <label for="category_description">Description</label>
            <textarea name="category_description" id="category_description" cols="30" rows="10" required></textarea>
        </div>
        <div>
            <label for="category_parent">ID du parent :</label>
            <input type="number" name="category_parent" id="category_parent" min="0" value="0">
        </div>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>