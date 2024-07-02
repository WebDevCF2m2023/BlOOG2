<?php

// si le paramètre route est défini dans l'url,
// on le récupère, sinon on le définit à 'home'
$route = $_GET['route'] ?? 'home';

switch ($route) {

    case 'home':
        include_once PROJECT_DIRECTORY.'/view/homepage.view.php';
        break;
    case 'article':

        break;
    case 'category':

        break;
    case 'comment':
        require 'commentController.php';
        break;
    case 'permission':

        break;
    case 'user':
    case 'file':
    case 'tag':

        break;
    default:
        require '../view/404.view.php';
        break;
}