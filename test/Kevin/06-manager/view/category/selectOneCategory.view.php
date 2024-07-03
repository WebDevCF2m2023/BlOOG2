<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectOneCategory()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::selectOneCategory()</h1>
    <div>
        <?php

        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";
        
        ?>
        <?php if(is_null($selectOneCategory)): ?>
            <h3>Commentaire inexistant</h3>
        <?php else: ?>
            <h4>ID : <?=$selectOneCategory->getCategoryId()?> <a href="?route=category&view=<?=$selectOneCategory->getCategoryId()?>">Voir ce commentaire via son id</a></h4>
            <p>Nom : <?=$selectOneCategory->getCategoryName()?></p>
            <p>Slug : <?=$selectOneCategory->getCategorySlug()?></p>
            <p>Description : <?=$selectOneCategory->getCategoryDescription()?></p>
            <p>ID Parent : <?=$selectOneCategory->getCategoryParent() === 0 ? "Pas de parent" : $selectOneCategory->getCategoryParent()?></p>
        <?php endif; ?>
    </div>
    
    <?php
        var_dump($dbConnect,$categoryManager,$selectOneCategory);
    ?>
</body>
</html>