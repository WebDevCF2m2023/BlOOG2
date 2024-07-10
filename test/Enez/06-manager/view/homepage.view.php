<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<?php include "menu.homepage.view.php"; ?>
<p>Bienvenue sur la page d'accueil</p>
<h2>CRUD des tables de la DB</h2>
<p><a href="./?route=comment">Comment</a> -
    <a href="./?route=comment&insert">Insert Comment</a></p>
<p><a href="./?route=article">Article</a> -
    <a href="./?route=article&insert">Insert Article</a></p>
<p><a href="./?route=category">Category</a> -
    <a href="./?route=category&insert">Insert Category</a></p>
<p><a href="./?route=file">File</a> -
<a href="./?route=file&insert">Insert File</a></p>
<p><a href="./?route=permission">Permission</a> -
<a href="./?route=permission&insert">Insert Permission</a></p>
<p><a href="./?route=tag">Tag</a> -
<a href="./?route=tag&insert">Insert Tag</a></p>
<p><a href="./?route=user">User</a> -
<a href="./?route=user&insert">Insert User</a></p>
</body>
</html>
