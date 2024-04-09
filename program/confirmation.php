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
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'parpel');
                    if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                    }
                    $sql = "SELECT id, itemName, itemPrice, quantity, totalPrice FROM keranjang";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["itemName"]."</td>";
                            echo "<td>".$row["itemPrice"]."</td>";
                            echo "<td>".$row["quantity"]."</td>";
                            echo "<td>".$row["totalPrice"]."</td>";
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
            <button type="submit" name="delete_submit" style="margin-top: 10px;">Delete Selected</button>
            <button type="submit" name="confirm_submit" style="margin-top: 10px;">Confirm Selected</button>
        </form>
        <?php
        if(isset($_POST['delete_submit'])) {
            if(!empty($_POST['delete'])) {
                $conn = new mysqli('localhost', 'root', '', 'parpel');
                if($conn->connect_error){
                    die('Connection Failed : '.$conn->connect_error);
                }
                foreach($_POST['delete'] as $delete_id) {
                    $sql = "DELETE FROM keranjang WHERE id='$delete_id'";
                    $result = $conn->query($sql);
                    if(!$result) {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
                echo "Selected records deleted successfully.";
                $conn->close();
                header("Refresh:0"); 
            } 
            else {
                echo "Please select at least one record to delete.";
            }
        } elseif (isset($_POST['confirm_submit'])) {
            echo "Selected records confirmed successfully.";
        }
        ?>
    </div>
</body>
</html>
