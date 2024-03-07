<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello!</title>
    <link rel="stylesheet" href="enter.css">
</head>
<body>
    <?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

?>

<div class="login-box">
        <h2>Welcome to Parpel!</h2>
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>
        <form action="admin.php" method="post">
            <button type="submit" class="admin-button">Admin</button>
        </form>
    </div>

<?php
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=web', 'root', '');
    
    // Assuming 'namapelanggan' has columns: username, email, password
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO namapelanggan(username, email, password, created_at, updated_at) VALUES (?, ?, ?, now(), now())';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $hashedPassword]); 
    header('location: admin.php');
} else {
    echo "Bad Request";
} 
?>

</body>
</html>
