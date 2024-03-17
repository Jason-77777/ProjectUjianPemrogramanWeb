<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'parpel');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        // Check if the username and password match
        $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // Login successful
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Redirect to the dashboard page
            exit();
        } else {
            // Login failed
            header("Location: login.php"); // Redirect back to the login page
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
  <title>Hello!</title>
  <link rel="stylesheet" href="enter.css">
</head>
<body>

<div class="login-box">
  <h2>Welcome to Parpel!</h2>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="login2-button">Login</button>
  </form>
  <form action="admin.php" method="post">
    <button type="submit" class="admin-button">Admin</button>
  </form>
  <p style="color: blue;"><a href="mainpage.php">No account? Create account here!</a></p>
</div>

</body>
</html>
