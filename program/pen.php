<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parpel | Pena</title>
    <link rel="stylesheet" href="card.css">
</head>
<body>

    <?php include 'navbar.html'; ?>

    <div class="card-parent">
        <div class="card" style="width: 15rem;">
            <img src="assets/pen.png" class="card-img-top" alt="Pena">
            <div class="card-body">
                <h5 class="card-title">Pena</h5>
                <p class="card-text">Harga: Rp 5.000,-/ pc</p>
                <form method="post">
                    <input type="number" name="quantity" id="quantity" value="1" min="1">
                    <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Inventory</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
        $itemName = "Pen"; 
        $itemPrice = 5000.00; 
        $quantity = $_POST['quantity'];

        $totalPrice = $itemPrice * $quantity;

        $conn = new mysqli('localhost', 'root', 'root', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO keranjang(itemName, itemPrice, quantity, totalPrice) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sddd", $itemName, $itemPrice, $quantity, $totalPrice);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            
            echo "<script>alert('Item added to cart successfully.');</script>";
            header("Location: inventory.php");
            exit; 
        }
    }
    ?>

</body>
</html>
