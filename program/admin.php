<?php
session_start(); // Mulai sesi

// Periksa apakah data login telah disubmit
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Periksa apakah nama pengguna dan kata sandi yang dimasukkan benar
    if ($_POST['username'] == 'user' && $_POST['password'] == '123') {
        // Jika benar, set sesi authenticated menjadi true
        $_SESSION['authenticated'] = true;
        header("Location: db.php"); // Arahkan ke db.php
        die(); // Hentikan eksekusi
    } else {
        header("Location: mainpage.php"); // Arahkan ke secret.php
        die(); // Hentikan eksekusi
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
                    <label> Username </label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label> Password </label>
                    <input type="password" name="password">
                </div>
                <div><input type="submit" value="login" class="login-button"></div>
            </form>
        </div>
    </div>
</body>
</html>
