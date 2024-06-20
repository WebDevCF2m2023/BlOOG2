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
    "file_description" => " <p>  Un exemple </p>",
    "file_url" => "https://www.google.com",
    "file_type" => "image/png",
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$exemple2 = new FileMapping([
    "exemple_id" => 2,
    "exemple_name" => "Un autre exemple",
    "exemple_description" => "Voici une description d'un être aimé, <br>, ou non",
    "exemple_number" => 21,
    "exemple_date" => "Miam",
    "exemple_boolean" => false,
    "exemple_float" => -82.3465,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$exemple3 = new ExempleMapping([
    "exemple_id" => 3,
    "exemple_name" => "Encore un \"autre\" exemple",
    "exemple_description" => "Voici une description d'un être aimé, <br>, ou non",
    "exemple_number" => 21,
    "exemple_date" => "Miam",
    "exemple_boolean" => false,
    "exemple_float" => -82.3465,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

echo $exemple3->getExempleName();

var_dump($date, $exemple1,$exemple2,$exemple3);
