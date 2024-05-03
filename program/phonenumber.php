<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Number</title>
    <link rel="stylesheet" href="stock.css">
</head>
<body>
    <?php include 'navbaradmin.html' ?>

    <div class="containerdatauser">
    <h2>Data OVO</h2>
    <table>
    
        <thead>
            <tr>
                <th>ID</th>
                <th>OVO Username</th>
                <th>OVO Number</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'parpel');
                    if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                    }
                    $sql = "SELECT id, ovoName, ovoNumber FROM ovo";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["ovoName"]."</td>";
                            echo "<td>".$row["ovoNumber"]."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
    </div>
</body>
</html>