<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du CategoryManager::selectAll()</h1>
    <div>
        <?php
        include PROJECT_DIRECTORY."/view/menu.homepage.view.php";

        if(is_null($selectAllCategories)):
        ?>
        <h3>Pas encore de catégories !</h3>
        <?php
    else:
        foreach($selectAllCategories as $item):
        ?>
            <h4>ID : <?=$item->getCategoryId()?> <a href="?route=category&view=<?=$item->getCategoryId()?>">Voir cette catégorie via son id</a> | <a href="?route=category&update=<?=$item->getCategoryId()?>">Mettre à jour</a> | <a href="?route=category&delete=<?=$item->getCategoryId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">Supprimer</a> </h4>
            <p>Nom : <?=$item->getCategoryName()?></p>
            <p>Slug : <?=$item->getCategorySlug()?></p>
            <p>Description : <?=$item->getCategoryDescription()?></p>
            <p>ID Parent : <?=$item->getCategoryParent() === 0 ? "Pas de parent" : $item->getCategoryParent()?></p>
        <?php
        endforeach;
        var_dump($selectAllCategories);
    endif;
        ?>
    </div>

</body>
</html>