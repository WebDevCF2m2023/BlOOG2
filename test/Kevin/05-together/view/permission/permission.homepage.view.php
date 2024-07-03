<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Permission Homepage</title>
</head>
<body>
    <h1>CRUD Permission Homepage</h1>
    <?php 
    if(is_null($allPermission)): 
    ?>
        <h2>Pas encore de permission</h2>
    <?php 
    else: 
        foreach($allPermission as $item):
    ?>
        <h3><?=$item->getPermissionId()?>: <?=$item->getPermissionName()?></h3>
        <p><?=$item->getPermissionDescription()?></p>
    <?php 
        endforeach;
    endif;
    ?>
</body>
</html>