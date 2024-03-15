<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parpel Database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>User Data</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'parpel');
            if($conn->connect_error){
                die('Connection Failed : '.$conn->connect_error);
            }
            $sql = "SELECT id, username, email FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td></tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
