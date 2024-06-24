<?php
require_once "../../../config.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

use model\Mapping\ArticleMapping;
use model\Mapping\CategoryMapping;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test des Mappings stagiaires G2</title>
</head>
<body>
    <h1>Test des Mappings stagiaires G2</h1>
<h2>Table Article</h2>
<p>Test de model/Mapping/ArticleMapping.php</p>
    <?php
    $article1 = new ArticleMapping([
        "article_id" => 1,
        "article_title" => "Titre de l'article",
        "article_slug" => "titre-de-l-article",
        "article_text" => "Texte de l'article",
        "article_date_create" => "2021-09-01 12:00:00",
        "article_date_update" => "2023-09-01 12:00:00",
        "article_date_publish" => new DateTime(),
        "article_is_published" => true,
        "user_user_id" => 1
    ]);
    var_dump($article1);
    ?>
    <h2>Table Category</h2>
    <p>Test de model/Mapping/CategoryMapping.php</p>
    <?php
    $category1 = new CategoryMapping([
        "category_id" => 1,
        "category_name" => "Nom de la catégorie",
        "category_slug" => "nom-de-la-categorie",
        "category_description" => "Description de la catégorie",
        "category_parent" => 0
    ]);
    var_dump($category1);
    ?>
</body>
</html>
