<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::insert()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Exemple du CommentManager::insert()</h1>
        
        <!-- Inclusion du menu -->
        <?php include PROJECT_DIRECTORY."/view/menu.homepage.view.php"; ?>
        
        <!-- Affichage d'erreur -->
        <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erreur</h4>
                <p><?= $error ?></p>
            </div>
        <?php endif; ?>

        <div class="mt-4">
            <h3>Insertion d'un commentaire</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="comment_text">Commentaire</label>
                    <textarea class="form-control" name="comment_text" id="comment_text" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
