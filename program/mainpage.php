<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello!</title>
    <link rel="stylesheet" href="enter.css">
</head>
<body>
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
</body>
</html>
