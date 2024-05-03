<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="card.css">
</head>
<body>

    <?php include 'navbar.html'; ?>

    <div class="image-catalog">
        <?php
        $conn = new mysqli('localhost', 'root', 'root', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }

        $sql = "SELECT * FROM keranjang";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card-parent">';
                echo '<div class="card" style="width: 15rem;">';
                echo '<img src="assets/' . $row["itemName"] . '.png">';
                echo '<div class="card-body">';
                echo '<h5>' . $row["itemName"] . '</h5>' . '<br>';
                echo '<p> Harga: Rp. ' . $row["itemPrice"] . ',-/ pc <br>';
                echo 'Jumlah: ' . $row["quantity"] . '<br>'; 
                echo 'Total Harga: Rp. ' . ($row["itemPrice"] * $row["quantity"]) . ',-<br>';
                echo '<form method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["id"] . '">';
                echo '<input type="checkbox" name="pay" value="1"> Pay<br>';
                echo '</form>';
                echo '<form method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["id"] . '">';
                echo '<a href="payment2.php"><button type="button" class="btn btn-primary">Proceed</button></a>';
                echo '</form>';
                echo '</p>';
                echo '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Keranjang kosong.";
        }
        $conn->close();
        ?>
    </div>

    <!-- <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_item'])) {
        $itemId = $_POST['item_id'];

        $conn = new mysqli('localhost', 'root', 'root', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }

        $sql = "DELETE FROM keranjang WHERE id='$itemId'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Item deleted successfully.');</script>";
            echo "<script>window.location.href = 'inventory.php';</script>";
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }
    ?> -->

</body>
</html>
