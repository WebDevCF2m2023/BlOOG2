<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectAll()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Exemple du CategoryManager::selectAll()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
            ?>
            <?php if(is_null($selectAllCategories)): ?>
                <div class="alert alert-warning">
                    <h3>Pas encore de catégories !</h3>
                </div>
            <?php elseif(gettype($selectAllCategories) === "string"): ?>
                <div class="alert alert-info">
                    <h3><?= $selectAllCategories ?></h3>
                </div>
            <?php else: ?>
                <?php foreach($selectAllCategories as $item): ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">ID : <?= $item->getCategoryId() ?></h4>
                            <p class="card-text">Nom : <?= $item->getCategoryName() ?></p>
                            <p class="card-text">Slug : <?= $item->getCategorySlug() ?></p>
                            <p class="card-text">Description : <?= $item->getCategoryDescription() ?></p>
                            <p class="card-text">ID Parent : <?= $item->getCategoryParent() === 0 ? "Pas de parent" : $item->getCategoryParent() ?></p>
                            <a href="?route=category&view=<?= $item->getCategoryId() ?>" class="btn btn-primary">Voir cette catégorie</a>
                            <a href="?route=category&update=<?= $item->getCategoryId() ?>" class="btn btn-secondary">Mettre à jour</a>
                            <a href="?route=category&delete=<?= $item->getCategoryId() ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">Supprimer</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <pre><?php var_dump($selectAllCategories); ?></pre>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
