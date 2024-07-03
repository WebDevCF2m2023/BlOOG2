<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Accueil</h1>
        <?php include "menu.homepage.view.php"; ?>
        <p>Bienvenue sur la page d'accueil</p>
        <h2>CRUD des tables de la DB</h2>
        <button class="btn btn-primary mb-3" id="toggleListButton">Afficher/Masquer la liste</button>
        <div class="list-group" id="crudList" style="display: none;">
            <a href="./?route=comment" class="list-group-item list-group-item-action">Commentaires</a>
            <a href="./?route=comment&insert" class="list-group-item list-group-item-action">Insérer un Commentaire</a>
            <a href="./?route=article" class="list-group-item list-group-item-action">Articles</a>
            <a href="./?route=article&insert" class="list-group-item list-group-item-action">Insérer un Article</a>
            <a href="./?route=category" class="list-group-item list-group-item-action">Catégories</a>
            <a href="./?route=category&insert" class="list-group-item list-group-item-action">Insérer une Catégorie</a>
            <a href="./?route=file" class="list-group-item list-group-item-action">Fichiers</a>
            <a href="./?route=file&insert" class="list-group-item list-group-item-action">Insérer un Fichier</a>
            <a href="./?route=permission" class="list-group-item list-group-item-action">Permissions</a>
            <a href="./?route=permission&insert" class="list-group-item list-group-item-action">Insérer une Permission</a>
            <a href="./?route=tag" class="list-group-item list-group-item-action">Tags</a>
            <a href="./?route=tag&insert" class="list-group-item list-group-item-action">Insérer un Tag</a>
            <a href="./?route=user" class="list-group-item list-group-item-action">Utilisateurs</a>
            <a href="./?route=user&insert" class="list-group-item list-group-item-action">Insérer un Utilisateur</a>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript pour afficher/masquer la liste -->
    <script>
        document.getElementById('toggleListButton').addEventListener('click', function() {
            var crudList = document.getElementById('crudList');
            if (crudList.style.display === 'none' || crudList.style.display === '') {
                crudList.style.display = 'block';
            } else {
                crudList.style.display = 'none';
            }
        });
    </script>
</body>
</html>

