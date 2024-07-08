<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ArticleManager::selectOneComment()</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Exemple du UserManager::selectOneUser()</h1>
        <div>
            <?php
            include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

            if(is_null($selectOneUser)):
            ?>
            <h3 class="text-warning">user inexistant</h3>
            <?php
            else:
            ?>
            <div class="article">
                <h4>ID : <?=$selectOneUser->getUserId()?> 
                    <a href="?route=user&view=<?=$selectOneUser->getUserId()?>" class="btn btn-info btn-sm">Voir cette user</a>
                </h4>
                <p><?=$selectOneUser->getUserFullName()?></p>
                <p><?=$selectOneUser->getUserMail()?></p>
                <hr>
            </div>
            <?php
            endif;
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
