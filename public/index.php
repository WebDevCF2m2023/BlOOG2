<?php

// session
session_start();

// chemin vers Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Appel de la config
require_once "../config.php";

// chargement de l'autoload de composer
require_once '../vendor/autoload.php';

// Notre autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

// chemin vers les templates twig
$loader = new FilesystemLoader(PROJECT_DIRECTORY . '/view/');
// création d'une instance de $twig
$twig = new Environment($loader, [
    'cache' => false, // pas de cache en dev
    // 'cache' => '/path/to/compilation_cache', // chemin du cache pour la prod
    // activation du debug en dev
    'debug' => true,
]);

// connexion à la base de données
$db = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
    DB_LOGIN,
    DB_PWD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


// route
require_once PROJECT_DIRECTORY . "/controller/routerController.php";

// close database
$db = null;
