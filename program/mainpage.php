<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parpel | Register</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="login-box">
  <h1>Parpel</h1>
  <p>Stationary Shopping Website</p>
  <h2>Get Started with Parpel</h2>
  <form action="items.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="login-button">Register</button>
  </form>
  <!--<form action="admin.php" method="post">
    <button type="submit" class="admin-button">Admin</button>
  </form>
  
  <form action="login.php" method="post">
    <button type="submit" class="login2-button">Login</button>
  </form>
  -->
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'parpel');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        header("Location: home.php");
        exit();
    }
}
?>

</body>
</html>
