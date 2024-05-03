<?php
session_start(); 

if (isset($_POST["username"]) && isset($_POST["password"])) {
    if ($_POST['username'] == 'user' && $_POST['password'] == '123') {
        $_SESSION['authenticated'] = true;
        header("Location: db.php"); 
        die(); 
    } else {
        header("Location: mainpage.php"); 
        die(); 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <form method="post" action="stock.php">
                <div>
                    <h1>Parpel</h1>
                    <p>Stationary Shopping Website</p>
                    <h2>Hello Boss!</h2>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div><input type="submit" value="Login" class="login-button"></div>
            </form>
        </div>
    </div>
</body>
</html>
