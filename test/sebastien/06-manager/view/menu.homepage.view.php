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

        /* Réduire les marges et paddings des éléments du menu */
        .navbar-nav .nav-item {
            margin: 0.5rem 0; /* Ajouter de la marge verticale entre les éléments */
            padding: 0.5rem; /* Ajouter du padding à chaque élément */
            border: 1px solid #e0e0e0; /* Bordure autour des éléments */
            border-radius: 5px; /* Coins arrondis */
        }

        .navbar-nav .nav-item:nth-child(odd) {
            background-color: #f8f9fa; /* Couleur de fond pour les éléments impairs */
        }

        .navbar-nav .nav-item:nth-child(even) {
            background-color: #007bff; /* Couleur de fond pour les éléments pairs */
            color: #ffffff; /* Couleur de texte pour les éléments pairs */
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 1rem; /* Ajuster selon vos besoins */
            color: inherit; /* Hériter la couleur du parent */
        }

        /* Ajouter un fond et des bordures pour les éléments du menu */
        .navbar-nav {
            background-color: #ffffff; /* Couleur de fond du menu */
            padding: 1rem; /* Ajouter du padding autour du menu */
            border: 1px solid #e0e0e0; /* Bordure du menu */
            border-radius: 5px; /* Coins arrondis */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="btn btn-primary mr-auto" type="button">
            <a class="text-white" href="./" style="text-decoration: none;">Homepage</a>
        </button>
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

