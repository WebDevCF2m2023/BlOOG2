<?php

// session
session_start();

// on va chercher le chemin de ExempleMapping

use model\Mapping\ArticleMapping;


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

$article1 = new ArticleMapping([
    "article_id" => null,
    "article_title" => "   article1   ",
    "article_slug" => null,
    "article_text" => "Un text de article1",
    "article_date_create" => new DateTime(),
    "article_date_update" => new DateTime(),
    "article_date_publish" => null,
    "article_is_published" => false,
    "user_user_id" => 1,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$article2 = new ArticleMapping([
    "article_id" => null,
    "article_title" => " <p>   article2 </p>  ",
    "article_slug" => null,
    "article_text" => "Un text de article2",
    "article_date_create" => "2024-03-01 12:17:00",
    "article_date_update" => "2024-03-01 12:17:00",
    "article_date_publish" => null,
    "article_is_published" => false,
    "user_user_id" => 2,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$article3 = new ArticleMapping([
    "article_id" => null,
    "article_title" => " <p>  \"coucou\"  article3 </p>  ",
    "article_slug" => null,
    "article_text" => "Un text de <br> article3",
    "article_date_create" => "Bouh",
    "article_date_update" => "Bibou",
    "article_date_publish" => new DateTime(),
    "article_is_published" => true,
    "user_user_id" => 3,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

echo $article3->getArticleTitle();

var_dump($date, $article1,$article2,$article3);
