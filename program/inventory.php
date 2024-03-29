<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'navbar.html'; ?>

    <div class="image-catalog">
        <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }

        // Query untuk mengambil data dari keranjang
        $sql = "SELECT * FROM keranjang";
        $result = $conn->query($sql);

        // Menampilkan data dari keranjang
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="image-box">';
                echo '<img src="assets/' . $row["itemName"] . '.png">';
                echo '<figcaption>' . $row["itemName"] . '<br>';
                echo 'Harga: Rp. ' . $row["itemPrice"] . ',-/ pc <br>';
                echo '<form method="post">';
                echo '<input type="number" name="quantity" value="' . $row["quantity"] . '" min="1">';
                echo '<button type="submit" name="update_quantity">Update Quantity</button>';
                echo '<input type="checkbox" name="pay" value="1"> Paid<br>';
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
    // Update jumlah barang jika tombol "Update Quantity" ditekan
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_quantity'])) {
        $quantity = $_POST['quantity'];
        $itemId = $_POST['item_id'];

        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }

        // Query untuk mengupdate jumlah barang di database
        $sql = "UPDATE keranjang SET quantity='$quantity' WHERE id='$itemId'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Quantity updated successfully.');</script>";
            // Redirect agar halaman direfresh setelah berhasil update
            header("Location: inventory.php");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>
</html>
