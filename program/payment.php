<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'navbar.html'; ?>

    <div class="image-catalog">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }

        $sql = "SELECT * FROM keranjang";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="image-box">';
                echo '<img src="assets/' . $row["itemName"] . '.png">';
                echo '<figcaption>' . $row["itemName"] . '<br>';
                echo 'Harga: Rp. ' . $row["itemPrice"] . ',-/ pc <br>';
                echo 'Jumlah: ' . $row["quantity"] . '<br>'; // Display the quantity as static text
                echo 'Total Harga: Rp. ' . ($row["itemPrice"] * $row["quantity"]) . ',-<br>';
                echo '<form method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["id"] . '">';
                echo '<input type="checkbox" name="pay" value="1"> Pay<br>';
                echo '</form>';
                echo '<form method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["id"] . '">';
                echo '<button type="submit" name="delete_item">Delete</button>';
                echo '</form>';
                echo '</figcaption>';
                echo '</div>';
            }
        } else {
            echo "Keranjang kosong.";
        }
        $conn->close();
        ?>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_item'])) {
        $itemId = $_POST['item_id'];

        $conn = new mysqli('localhost', 'root', '', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }

        $sql = "DELETE FROM keranjang WHERE id='$itemId'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Item deleted successfully.');</script>";
            // Use JavaScript for redirection to avoid the "headers already sent" issue
            echo "<script>window.location.href = 'inventory.php';</script>";
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>
</html>
