<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::update()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles pour personnaliser */
        body {
            padding: 20px;
        }
        .form-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Exemple du CommentManager::update()</h1>
        
        <!-- Inclusion du menu -->
        <?php include PROJECT_DIRECTORY."/view/menu.homepage.view.php"; ?>
        
        <div class="form-container">
            <?php if(is_null($selectOneComment)): ?>
                <h3>Commentaire inexistant</h3>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($error)): ?>
                            <h4 class="text-danger"><?= $error ?></h4>
                        <?php endif; ?>
                        <h3 class="card-title">Modification d'un commentaire</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="comment_text">Commentaire</label>
                                <textarea class="form-control" name="comment_text" id="comment_text" rows="10"><?= $selectOneComment->getCommentText() ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
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
