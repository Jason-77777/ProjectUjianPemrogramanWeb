<?php

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
        <form method="post" action="db.php">
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
