<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Permissions</title>
</head>
<body>
    <h1>Gestion des Permissions</h1>

    <?php if ($selectedPermission): ?>
        <h2>Permission ID : <?= $selectedPermission->getPermissionId() ?></h2>
        <p>Nom : <?= $selectedPermission->getPermissionName() ?></p>
        <p>Description : <?= $selectedPermission->getPermissionDescription() ?></p>
    <?php else: ?>
        <h2>Toutes les Permissions</h2>
        <ul>
            <?php foreach ($allPermission as $permission): ?>
                <li>
                    <?= $permission->getPermissionName() ?>
                    <a href="?permission_id=<?= $permission->getPermissionId() ?>">Voir</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>
</html>
