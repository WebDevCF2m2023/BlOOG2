<?php

// session
session_start();

// on va chercher le chemin de ExempleMapping
use model\Mapping\CommentMapping;


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

$exemple1 = new CommentMapping([
    "comment_id" => 1,
    "comment_text" => "   exemple1   ",
    "comment_parent" => 5,
    "comment_date_create" => new DateTime(),
    "comment_date_update" => new DateTime(),
    "comment_date_publish" => new DateTime(),
    "user_user_id" => 1,
    "article_article_id" => 1,
]);

$exemple2 = new CommentMapping([
    "comment_id" => 2,
    "comment_text" => " <p>  Un autre exemple </p>",
    "comment_parent" => 5,
    "comment_date_create" => "2024-03-01 12:17:00",
    "comment_date_update" => "2024-03-01 12:17:00",
    "comment_date_publish" => "2024-03-01 12:17:00",
    "user_user_id" => 1,
    "article_article_id" => 1,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$exemple3 = new CommentMapping([
    "comment_id" => 3,
    "comment_text" => "Voici une description d'un être aimé, <br>, ou non",
    "comment_parent" => 21,
    "comment_date_create" => "Miam",
    "comment_date_update" => "le",
    "comment_date_publish" => "chat",
    "user_user_id" => 1,
    "article_article_id" => 1,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);


var_dump($date, $exemple1,$exemple2,$exemple3);
