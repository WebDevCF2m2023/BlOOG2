<?php

// session
session_start();

// on va chercher le chemin de ExempleMapping
use model\Mapping\ExempleMapping;
use model\Mapping\FileMapping;


// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY. '/' .$class . '.php';
});

// chemin pris dans le répertoire racine du projet (config.php)
echo PROJECT_DIRECTORY;

$date = new DateTime();

$exemple1 = new FileMapping([
    "file_id" => 8,
    "file_description" => " <p>  Salut </p>",
    "file_url" => "https://www.google.com",
    "file_type" => "image/png",
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$exemple2 = new FileMapping([
    "file_id" => 5,
    "file_description" => " <p>  Hello </p>",
    "file_url" => "https://www.google.com",
    "file_type" => "image/png",
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$exemple3 = new FileMapping([
    "file_id" => 6,
    "file_description" => " <p> Bonjour </p>",
    "file_url" => "https://www.google.com",
    "file_type" => "image/png",
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

var_dump($exemple1);

var_dump($exemple2);

var_dump($exemple3);




