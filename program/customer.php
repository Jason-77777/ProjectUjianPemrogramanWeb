<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parpel Database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbaradmin.html'; ?>
    <div class="containerdatauser">
        <h2>User Data</h2>
        <form action="" method="post">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
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
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["username"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td><input type='checkbox' name='delete[]' value='".$row["id"]."'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <button type="submit" name="submit" style="margin-top: 10px;">Delete Selected</button>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            if(!empty($_POST['delete'])) {
                $conn = new mysqli('localhost', 'root', '', 'parpel');
                if($conn->connect_error){
                    die('Connection Failed : '.$conn->connect_error);
                }
                foreach($_POST['delete'] as $delete_id) {
                    $sql = "DELETE FROM users WHERE id='$delete_id'";
                    $result = $conn->query($sql);
                    if(!$result) {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
                echo "Selected records deleted successfully.";
                $conn->close();
                header("Refresh:0"); 
            } else {
                echo "Please select at least one record to delete.";
            }
        }
        ?>
    </div>
</body>
</html>
