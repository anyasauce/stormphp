<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Users List</h1>
    <ul>
        <?php foreach ($data['users'] as $user): ?>
            <li><?= $user['name']; ?> - <?= $user['email']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>