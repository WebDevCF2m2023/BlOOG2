<?php

// session
session_start();

// on va chercher le chemin de ExempleMapping
use model\Mapping\CategoryMapping;


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

$category1 = new CategoryMapping([
    "category_id" => 1,
    "category_name" => "category1",
    "category_slug" => "category1",
    "category_description" => "description1",
    "category_parent" => 0,

    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$category2 = new CategoryMapping([
    "category_id" => 2,
    "category_name" => "category2",
    "category_slug" => "category2",
    "category_description" => "description2",
    "category_parent" => 0,

    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$category3 = new CategoryMapping([
    "category_id" => 3,
    "category_name" => "category3",
    "category_slug" => "category3",
    "category_description" => "description3",
    "category_parent" => 0,

    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

echo $category3->getCategoryName();

var_dump($category1,$category2,$category3);
