<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du FileManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du FileManager::selectAll()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectAllFiles)):
        ?>
        <h3>Pas encore de fichier !</h3>
        <?php
    else:
        foreach($selectAllFiles as $item):
        ?>
    <h4>ID : <?=$item->getFileId()?> <a href="?route=file&view=<?=$item->getFileId()?>">Voir ce fichier via son id</a> | <a href="?route=file&update=<?=$item->getFileId()?>">Mettre à jour</a> | <a href="?route=file&delete=<?=$item->getFileId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?');">Supprimer</a> </h4>
    <p><?=$item->getFileName()?></p>
    <p><?=$item->getFileDateCreate()?></p><hr>
        <?php
        endforeach;
        var_dump($selectAllFiles);
    endif;
        ?>
    </div>

</body>
</html>