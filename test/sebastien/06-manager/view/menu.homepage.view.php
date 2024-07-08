<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles pour cacher le menu par défaut */
        .navbar .navbar-collapse {
            display: none; /* Cacher le menu par défaut */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./">Homepage</a>
        <!-- Bouton burger pour les petits et grands écrans -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./?route=comment">Comment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=comment&insert">Insert Comment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=article">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=article&insert">Insert Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=category">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=category&insert">Insert Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=file">File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=file&insert">Insert File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=permission">Permission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=permission&insert">Insert Permission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=tag">Tag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=tag&insert">Insert Tag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=user">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?route=user&insert">Insert User</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script pour afficher le menu sur clic du bouton burger
        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                $('.navbar-collapse').slideToggle();
            });
        });
    </script>
</body>
</html>
