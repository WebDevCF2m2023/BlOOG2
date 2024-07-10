<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::update()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Exemple du CategoryManager::update()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
            ?>
            <?php if(is_null($selectOneCategory)): ?>
                <div class="alert alert-warning">
                    <h3>Catégorie inexistante</h3>
                </div>
            <?php elseif(gettype($selectOneCategory) === "string"): ?>
                <div class="alert alert-info">
                    <h3><?= $selectOneCategory ?></h3>
                </div>
            <?php else: ?>
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger">
                        <h4><?= $error ?></h4>
                    </div>
                <?php endif; ?>
                <h3>Modification d'une catégorie</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="category_name">Catégorie</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" value="<?= $selectOneCategory->getCategoryName() ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category_slug">Slug</label>
                        <input type="text" name="category_slug" id="category_slug" class="form-control" value="<?= $selectOneCategory->getCategorySlug() ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_description">Description :</label>
                        <textarea name="category_description" id="category_description" class="form-control" cols="30" rows="10" required><?= $selectOneCategory->getCategoryDescription() ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_parent">ID du parent :</label>
                        <input type="number" name="category_parent" id="category_parent" class="form-control" min="0" value="<?= $selectOneCategory->getCategoryParent() ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
