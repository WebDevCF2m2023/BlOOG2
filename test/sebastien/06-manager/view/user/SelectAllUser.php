<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du UserManager::selectAll()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles pour personnaliser */
        body {
            padding: 20px;
        }
        .comment-container {
            margin-top: 20px;
        }
        .comment-item {
            margin-bottom: 20px;
        }
        .comment-actions {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Exemple du UserManager::selectAll()</h1>
        
        <!-- Inclusion du menu -->
        <?php include PROJECT_DIRECTORY."/view/menu.homepage.view.php"; ?>
        
        <div class="comment-container">
            <?php if(is_null($selectAllUser)): ?>
                <h3>Pas encore de user !</h3>
            <?php else: ?>
                <?php foreach($selectAllUser as $item): ?>
                    <div class="comment-item">
                        <h4>ID : <?= $item->getUserId() ?></h4>
                        <p><?= $item->getUserFullName() ?></p>
                        <p><?= $item->getUserMail() ?></p>
                        <div class="comment-actions">
                            <a href="?route=user&view=<?= $item->getUserId() ?>" class="btn btn-primary">Voir cette user</a>
                            <a href="?route=user&update=<?= $item->getUserId() ?>" class="btn btn-info">Mettre à jour</a>
                            <a href="?route=user&delete=<?= $item->getUserId() ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce user ?');">Supprimer</a>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
                <?php  ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
