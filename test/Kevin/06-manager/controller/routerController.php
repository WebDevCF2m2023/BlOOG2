<?php

// si le paramètre route est défini dans l'url,
// on le récupère, sinon on le définit à 'home'
$route = $_GET['route'] ?? 'home';

switch ($route) {

    case 'home':
        # affichage de la page d'accueil (vue)
        include_once PROJECT_DIRECTORY.'/view/homepage.view.php';
        break;
    case 'article':
        # todo
        echo 'article à gérer';
        break;
    case 'category':
        require 'categoryController.php';
        break;
    # controller déjà présent
    case 'comment':
        # c'est lui qui va gérer les actions sur les commentaires
        # et afficher les vues associées
        require 'commentController.php';
        break;
    case 'permission':
        # todo
        echo 'permission à gérer';
        break;
    case 'user':
        # todo
        echo 'user à gérer';
        break;
    case 'file':
        # todo
        echo 'file à gérer';
        break;
    case 'tag':
        # todo
        echo 'tag à gérer';
        break;
    default:
        # affichage de la page 404
        require PROJECT_DIRECTORY.'/view/404.view.php';
        break;
}