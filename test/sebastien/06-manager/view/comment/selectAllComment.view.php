<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::selectAll()</title>
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
        <h1 class="mt-5">Exemple du CommentManager::selectAll()</h1>
        
        <!-- Inclusion du menu -->
        <?php include PROJECT_DIRECTORY."/view/menu.homepage.view.php"; ?>
        
        <div class="comment-container">
            <?php if(is_null($selectAllComments)): ?>
                <h3>Pas encore de commentaire !</h3>
            <?php else: ?>
                <?php foreach($selectAllComments as $item): ?>
                    <div class="comment-item">
                        <h4>ID : <?= $item->getCommentId() ?></h4>
                        <p><?= $item->getCommentText() ?></p>
                        <p>Date de création : <?= $item->getCommentDateCreate() ?></p>
                        <div class="comment-actions">
                            <a href="?route=comment&view=<?= $item->getCommentId() ?>" class="btn btn-primary">Voir ce commentaire</a>
                            <a href="?route=comment&update=<?= $item->getCommentId() ?>" class="btn btn-info">Mettre à jour</a>
                            <a href="?route=comment&delete=<?= $item->getCommentId() ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
                <?php // var_dump($selectAllComments); ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
