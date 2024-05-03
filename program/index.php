<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'parpel');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {

        $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: home.php"); 
            exit();
        } else {
            header("Location: index.php"); 
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parpel | Login</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="login-box">
  <h1>Parpel</h1>
  <p>Stationary Shopping Website</p>
  <h2>Welcome to Parpel!</h2>
  <form action="items.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="login2-button">Login</button>
  </form>
  <form action="admin.php" method="post">
    <button type="submit" class="admin-button">Admin</button>
  </form>
  <p>No Account? <a href="mainpage.php">Create account here!</a></p>
</div>

</body>
</html>
