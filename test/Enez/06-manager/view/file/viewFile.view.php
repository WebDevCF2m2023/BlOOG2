<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du FileManager::selectOneFile()</title>
</head>
<body>
    <h1>Exemple du FileManager::selectOneFile()</h1>
    <div>
        <?php

        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectOneFile)):
        ?>
        <h3>Fichier inexistant</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneFile->getFileId()?> <a href="?route=file&view=<?=$selectOneFile->getFileId()?>">Voir ce fichier via son id</a></h4>
    <p><?=$selectOneFile->getFileName()?></p>
    <p><?=$selectOneFile->getFileDateCreate()?></p><hr>
        <?php
    endif;
        ?>
    </div>
    
    <?php
var_dump($dbConnect,$fileManager,$selectOneFile);
    ?>
</body>
</html>