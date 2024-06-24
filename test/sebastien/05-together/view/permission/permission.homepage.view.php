<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD permission homepage</title>
</head>
<body>
    <h1>CRUD permission homepage</h1>
    <?php
    if(is_null($allPermission)):
        ?>
        <h2>pas encore de permission</h2>
        <?php
        else:
            foreach($allPermission as $item):
        ?>
        <h3>ID:<?=$item->getPermissionId()?> intitule:<?=$item->getPermissionName()?></h3>
        <p><?=$item->getPermissionDescription()?></p>
        <?php
        endforeach;
    endif;
    ?>
</body>
</html>