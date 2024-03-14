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
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="login-button">Register</button>
  </form>
  <form action="admin.php" method="post">
    <button type="submit" class="admin-button">Admin</button>
  </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'parpel');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
        echo "GA JALAN";
    }
    else{
        $stmt = $conn->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        echo "UDA JALAN";
        $stmt->close();
        $conn->close();
    }
}
?>



</body>
</html>
