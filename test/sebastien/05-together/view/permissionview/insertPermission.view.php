<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Permission</title>
</head>
<body>
    <h1>Ajouter une Permission</h1>
    <form action="insert_permission.php" method="post">
        <label for="name">Nom de la permission:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description de la permission:</label>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
