<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="enter.css">
</head>
<body>

<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');

// Fetch data from the namapelanggan table
$sql = 'SELECT * FROM namapelanggan';
$stmt = $pdo->query($sql);

if ($stmt) {
    ?>
    <div class="user-list">
        <h2>User List</h2>
        <ul>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <li><?= $row['username']; ?> - <?= $row['email']; ?></li>
            <?php } ?>
        </ul>
    </div>
    <?php
} else {
    echo "Error fetching data: " . $pdo->errorInfo()[2];
}
?>

</body>
</html>
