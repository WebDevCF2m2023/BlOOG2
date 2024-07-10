<?php

// if the route parameter is defined in the URL,
// retrieve it, otherwise set it to 'home'
$route = $_GET['route'] ?? 'home';

switch ($route) {

    case 'home':
        # display the homepage (view)
        include_once PROJECT_DIRECTORY.'/view/homepage.view.php';
        break;
    case 'article':
        # todo
        echo 'manage article';
        break;
    case 'category':
        echo 'manage category';
        break;
    # already present controller
    case 'comment':
        # this controller will handle actions on comments
        # and display associated views
        require 'commentController.php';
        break;
    case 'permission':
        # todo
        echo 'manage permission';
        break;
    case 'user':
        # todo
        echo 'manage user';
        break;
    case 'file':
        include_once PROJECT_DIRECTORY.'/model/Manager/FileManager.php';
        echo 'manage file';
        require 'fileController.php';
        break;
    case 'tag':
        # todo
        echo 'manage tag';
        break;
    default:
        # display the 404 page
        require PROJECT_DIRECTORY.'/view/404.view.php';
        break;
}