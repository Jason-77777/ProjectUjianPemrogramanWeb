<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Number</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbaradmin.html' ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Gopay Username</th>
                <th>Gopay Number</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'parpel');
                    if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                    }
                    $sql = "SELECT id, namaGopay, nomorGopay FROM gopay";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["namaGopay"]."</td>";
                            echo "<td>".$row["nomorGopay"]."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
</body>
</html>