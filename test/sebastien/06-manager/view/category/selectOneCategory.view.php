<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectOneCategory()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Exemple du CategoryManager::selectOneCategory()</h1>
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ID : <?= $selectOneCategory->getCategoryId() ?></h4>
                        <p class="card-text">Nom : <?= $selectOneCategory->getCategoryName() ?></p>
                        <p class="card-text">Slug : <?= $selectOneCategory->getCategorySlug() ?></p>
                        <p class="card-text">Description : <?= $selectOneCategory->getCategoryDescription() ?></p>
                        <p class="card-text">ID Parent : <?= $selectOneCategory->getCategoryParent() === 0 ? "Pas de parent" : $selectOneCategory->getCategoryParent() ?></p>
                        <a href="?route=category&view=<?= $selectOneCategory->getCategoryId() ?>" class="btn btn-primary">Voir cette catégorie</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
