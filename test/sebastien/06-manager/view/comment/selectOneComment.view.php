<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::selectOneComment()</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Exemple du CommentManager::selectOneComment()</h1>
        
        <!-- Inclusion du menu -->
        <?php include PROJECT_DIRECTORY."/view/menu.homepage.view.php"; ?>
        
        <div class="comment-container">
            <?php if(is_null($selectOneComment)): ?>
                <h3>Commentaire inexistant</h3>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ID : <?= $selectOneComment->getCommentId() ?></h4>
                        <p class="card-text"><?= $selectOneComment->getCommentText() ?></p>
                        <p class="card-text">Date de création : <?= $selectOneComment->getCommentDateCreate() ?></p>
                        <hr>
                        <a href="?route=comment&view=<?= $selectOneComment->getCommentId() ?>" class="btn btn-primary">Voir ce commentaire</a>
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
