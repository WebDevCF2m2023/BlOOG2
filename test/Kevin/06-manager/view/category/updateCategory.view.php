<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::update()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::update()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        ?>
        <?php if(is_null($selectOneCategory)): ?>
            <h3>Catégorie inexistant</h3>
        <?php elseif(gettype($selectOneCategory) === "string"): ?>
            <h3><?= $selectOneCategory ?></h3>
        <?php else: ?>
            <?php if(isset($error)) echo "<h4>$error</h4>"; ?>
            <h3>Modification d'une catégorie</h3>
            <form action="" method="post">
            <div>
                    <label for="category_name">Catégorie</label>
                    <input type="text" name="category_name" id="category_name" value="<?= $selectOneCategory->getCategoryName() ?>" required>
                </div>
                <div>
                    <label for="category_slug">Slug</label>
                    <input type="text" name="category_slug" id="category_slug" value="<?= $selectOneCategory->getCategorySlug() ?>">
                </div>
                <div>
                    <label for="category_description">Description :</label><br>
                    <textarea name="category_description" id="category_description" cols="30" rows="10" required><?= $selectOneCategory->getCategoryDescription() ?></textarea>
                </div>
                <div>
                    <label for="category_parent">ID du parent :</label>
                    <select name="category_parent" id="category_parent">
                        <option value="0">-------------</option>
                        <?php foreach($allNamesIDCategory as $category): ?>
                            <?php if($category->getCategoryId() === $selectOneCategory->getCategoryId()) continue; ?>
                            <option <?= $category->getCategoryId() === $selectOneCategory->getCategoryParent() ? "selected" : "" ?> value="<?= $category->getCategoryId() ?>"><?= $category->getCategoryName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Modifier">
            </form>
        <?php endif; ?>
    </div>

</body>
</html>