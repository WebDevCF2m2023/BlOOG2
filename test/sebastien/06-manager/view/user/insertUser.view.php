<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du UserManager::insert()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Exemple du userManager::insert()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
            if(isset($error)) echo "<h4 class='text-danger'>$error</h4>";
            ?>
        </div>
        <h3>Insertion d'un article</h3>
        <form action="" method="post">
            <div class="form-group">
            <label for="user_full_name">User full name</label>
                <input type="text" class="form-control" name="user_full_name" id="user_full_name" required/>
            </div>
            <div class="form-group">
            <label for="user_mail">user email</label>
                <input type="text" class="form-control" name="user_mail" id="user_mail"  required/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Envoyer">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
