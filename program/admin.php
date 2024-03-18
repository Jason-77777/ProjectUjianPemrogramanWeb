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
    <link rel="stylesheet" href="enter.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <form method="post" action="">
                <div>
                    <label style="color: white;"> Admin </label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Username">
                </div>
                <div><input type="submit" value="Login" class="login-button"></div>
            </form>
        </div>
    </div>
</body>
</html>
