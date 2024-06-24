<?php
require_once "../../../config.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

use model\Mapping\ArticleMapping;
use model\Mapping\CategoryMapping;
use model\Mapping\CommentMapping;
use model\Mapping\FileMapping;
use model\Mapping\PermissionMapping;
use model\Mapping\TagMapping;
use model\Mapping\UserMapping;

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
    <h2>Table Comment</h2>
    <p>Test de model/Mapping/CommentMapping.php</p>
    <?php
    $comment1 = new CommentMapping([
        "comment_id" => 1,
        "comment_text" => "Texte du commentaire",
        "comment_parent" => 0,
        "comment_date_create" => "2021-09-01 12:00:00",
        "comment_date_update" => "2023-09-01 12:00:00",
        "comment_date_publish" => new DateTime(),
        "comment_is_published" => true,
        "user_user_id" => 1,
        "article_article_id" => 1
    ]);
    var_dump($comment1);
    ?>
    <h2>Table File</h2>
    <p>Test de model/Mapping/FileMapping.php</p>
    <?php
    $file1 = new FileMapping([
        "file_id" => 1,
        "file_url" => "https://trello-logos.s3.amazonaws.com/c3f2bef1693561dfb24e0f00aa592c80/30.png",
        "file_description" => "Description du fichier",
        "file_type" => "png",
    ]);
    var_dump($file1);
    ?>
    <h2>Table Permission</h2>
    <p>Test de model/Mapping/PermissionMapping.php</p>
    <?php
    $permission1 = new PermissionMapping([
        "permission_id" => 1,
        "permission_name" => "Nom de la permission",
        "permission_description" => "Description de la permission",
    ]);
    var_dump($permission1);
    ?>
    <h2>Table Tag</h2>
    <p>Test de model/Mapping/TagMapping.php</p>
    <?php
    $tag1 = new TagMapping([
        "tag_id" => 1,
        "tag_slug" => "nom du tag",
        "tag_description" => "Description du tag",
    ]);
    var_dump($tag1);
    ?>
    <h2>Table User</h2>
    <p>Test de model/Mapping/UserMapping.php</p>
    <?php
    $user1 = new UserMapping([
        "user_id" => 1,
        "user_login" => "MikeTyson",
        "user_password" => "password",
        "user_full_name" => "Mike Tyson",
        "user_mail" => "test@cf2m.be",
        "user_status" => 1,
        "user_secret_key" => "secret 123",
        "permission_permission_id" => 1

    ]);
    var_dump($user1);
    ?>
</body>
</html>
