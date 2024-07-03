<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du CommentManager::selectAll()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectAllComments)):
        ?>
        <h3>Pas encore de commentaire !</h3>
        <?php
    else:
        foreach($selectAllComments as $item):
        ?>
    <h4>ID : <?=$item->getCommentId()?> <a href="?route=comment&view=<?=$item->getCommentId()?>">Voir ce commentaire via son id</a> | <a href="?route=comment&update=<?=$item->getCommentId()?>">Mettre à jour</a> | <a href="?route=comment&delete=<?=$item->getCommentId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a> </h4>
    <p><?=$item->getCommentText()?></p>
    <p><?=$item->getCommentDateCreate()?></p><hr>
        <?php
        endforeach;
        var_dump($selectAllComments);
    endif;
        ?>
    </div>

</body>
</html>