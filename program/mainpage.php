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
    <button type="submit" class="login-button">Register</button>
  </form>
  <form action="admin.php" method="post">
    <button type="submit" class="admin-button">Admin</button>
  </form>
</div>

<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parpel";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process form submission for registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password before storing for security
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Prepare and bind SQL statement to insert user data
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $hashed_password);

  // Check if query execution successful
  if ($stmt->execute()) {
    $affected_rows = $stmt->affected_rows;
    if ($affected_rows > 0) {
      echo "Registration successful!";
    } else {
      echo "Registration failed: No rows affected. (Check table structure/data types)";
    }
  } else {
    echo "Error: Registration failed. " . $stmt->error;
  }

  // Close the statement
  $stmt->close();
}

// Close the connection
$conn->close();
?>


</body>
</html>
