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
    echo "<h3>getters de article</h3><p>";
    echo $article1->getArticleId();
    echo "<br>";
    echo $article1->getArticleTitle();
    echo "<br>";
    echo $article1->getArticleSlug();
    echo "<br>";
    echo $article1->getArticleText();
    echo "<br>";
    echo $article1->getArticleDateCreate();
    echo "<br>";
    echo $article1->getArticleDateUpdate();
    echo "<br>";
    echo $article1->getArticleDatePublish();
    echo "<br>";
    echo $article1->getArticleIsPublished();
    echo "<br>";
    echo $article1->getUserUserId();
    echo "</p>";

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
    echo "<h3>getters de category</h3><p>";
    echo $category1->getCategoryId();
    echo "<br>";
    echo $category1->getCategoryName();
    echo "<br>";
    echo $category1->getCategorySlug();
    echo "<br>";
    echo $category1->getCategoryDescription();
    echo "<br>";
    echo $category1->getCategoryParent();
    echo "</p>";
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
    echo "<h3>getters de comment</h3><p>";
    echo $comment1->getCommentId();
    echo "<br>";
    echo $comment1->getCommentText();
    echo "<br>";
    echo $comment1->getCommentParent();
    echo "<br>";
    echo $comment1->getCommentDateCreate();
    echo "<br>";
    echo $comment1->getCommentDateUpdate();
    echo "<br>";
    echo $comment1->getCommentDatePublish();
    echo "<br>";
    echo $comment1->getCommentIsPublished();
    echo "<br>";
    echo $comment1->getUserUserId();
    echo "<br>";
    echo $comment1->getArticleArticleId();
    echo "</p>";
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
    echo "<h3>getters de file</h3><p>";
    echo $file1->getFileId();
    echo "<br>";
    echo $file1->getFileUrl();
    echo "<br>";
    echo $file1->getFileDescription();
    echo "<br>";
    echo $file1->getFileType();
    echo "</p>";
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
    echo "<h3>getters de permission</h3><p>";
    echo $permission1->getPermissionId();
    echo "<br>";
    echo $permission1->getPermissionName();
    echo "<br>";
    echo $permission1->getPermissionDescription();
    echo "</p>";
    var_dump($permission1);
    ?>
    <h2>Table Tag</h2>
    <p>Test de model/Mapping/TagMapping.php</p>
    <?php
    $tag1 = new TagMapping([
        "tag_id" => 1,
        "tag_slug" => "nom du tag",
    ]);
    echo "<h3>getters de tag</h3><p>";
    echo $tag1->getTagId();
    echo "<br>";
    echo $tag1->getTagSlug();
    echo "</p>";
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
    echo "<h3>getters de user</h3><p>";
    echo $user1->getUserId();
    echo "<br>";
    echo $user1->getUserLogin();
    echo "<br>";
    echo $user1->getUserPassword();
    echo "<br>";
    echo $user1->getUserFullName();
    echo "<br>";
    echo $user1->getUserMail();
    echo "<br>";
    echo $user1->getUserStatus();
    echo "<br>";
    echo $user1->getUserSecretKey();
    echo "<br>";
    echo $user1->getPermissionPermissionId();
    echo "</p>";
    var_dump($user1);
    ?>
</body>
</html>
