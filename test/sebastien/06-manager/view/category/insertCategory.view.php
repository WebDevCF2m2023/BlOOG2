<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::insert()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Exemple du CategoryManager::insert()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
            if(isset($error)) echo "<div class='alert alert-danger'>$error</div>";
            ?>
            <h3>Insertion d'une catégorie</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="category_name">Catégorie</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_slug">Slug</label>
                    <input type="text" name="category_slug" id="category_slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_description">Description</label>
                    <textarea name="category_description" id="category_description" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="category_parent">ID du parent :</label>
                    <input type="number" name="category_parent" id="category_parent" class="form-control" min="0" value="0">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
