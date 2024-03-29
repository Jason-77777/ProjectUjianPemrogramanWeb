<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'navbar.html'; ?>

    <div class="image-catalog">
        <div class="image-box">
            <img src="assets/pensil.png">
            <figcaption>Pensil <br>
                Harga: Rp. 2000,-/ pc <br>
                <form method="post">
                    <input type="number" name="quantity" id="quantity" value="1" min="1">
                    <button type="submit" name="add_to_cart">Add to Inventory</button>
                </form>
            </figcaption>
        </div>
        <!-- Add other items similarly -->
    </div>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
        $itemName = "Pensil"; 
        $itemPrice = 2000.00; 
        $quantity = $_POST['quantity'];

        $totalPrice = $itemPrice * $quantity;

        $conn = new mysqli('localhost', 'root', '', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO keranjang(itemName, itemPrice, quantity, totalPrice) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sddd", $itemName, $itemPrice, $quantity, $totalPrice);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            
            // Menampilkan pesan notifikasi menggunakan JavaScript
            echo "<script>alert('Item added to cart successfully.');</script>";
            // Mengalihkan pengguna ke halaman inventaris setelah notifikasi ditampilkan
            header("Location: inventory.php");
            exit; // Memastikan bahwa tidak ada kode HTML lain yang dijalankan setelah mengalihkan pengguna
        }
    }
    ?>

</body>
</html>
