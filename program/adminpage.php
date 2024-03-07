<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="enter.css">
</head>
<body>
<?php
session_start();


//apakah ada data login yang dikirim
if (isset($_POST["username"]) && isset($_POST["password"])) {
    //jika data login benar, set session authenticated dan redirect ke secret
    if ($_POST['username'] == 'user' && $_POST['password'] == 'password'){
        $_SESSION['authenticated'] = true;
        header("Location: secret.php");
        die();
    } else {
        $error = 'Login salah';
    }
}
?>


<html>
    <body>
        <form method="post" action="login.php">
            <div>
                <label> Username </label>
                <input type="text" name="username">
            </div>
            <div>
                <label> Password </label>
                <input type="password" name="password">
            </div>
            <div><input type="submit" value="login"></div>
        </form>
        <?php if (isset($error)) { echo "<p>$error<?P>";} ?>
    </body>
</html>

</body>
</html>