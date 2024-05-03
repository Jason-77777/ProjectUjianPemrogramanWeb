<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parpel Database</title>
    <link rel="stylesheet" href="stock.css">
</head>
<body>
    <?php include 'navbaradmin.html'; ?>

    <div class="containerdatauser">
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Stock Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>New Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'root', 'root', 'parpel');
                    if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                    }
                    $sql = "SELECT id, stockName, stockQuantity FROM stock"; 
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["stockName"]."</td>";
                            echo "<td>".$row["stockQuantity"]."</td>";
                            echo "<td><input type='number' name='new_quantity[".$row["id"]."]' value='".(isset($_POST['new_quantity'][$row['id']]) ? $_POST['new_quantity'][$row['id']] : $row['stockQuantity'])."' min='0'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <button type="submit" name="update_submit">Update Quantities</button>
        </form>
        <?php
        if(isset($_POST['update_submit'])) {
            $conn = new mysqli('localhost', 'root', 'root', 'parpel');
            if($conn->connect_error){
                die('Connection Failed : '.$conn->connect_error);
            }
            foreach($_POST['new_quantity'] as $id => $newQuantity) {
                $newQuantity = intval($newQuantity); 
                $sql = "UPDATE stock SET stockQuantity='$newQuantity' WHERE id='$id'";
                if ($conn->query($sql) !== TRUE) {
                    echo "Error updating record: " . $conn->error;
                }
            }
            $conn->close();
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
        ?>
    </div>
</body>
</html>
