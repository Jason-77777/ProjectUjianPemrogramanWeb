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
                <input type="number" id="quantity" value="1" min="1">
                <button onclick="decrementQuantity('quantity')">-</button>
                <button onclick="incrementQuantity('quantity')">+</button>
                <!-- <div>Total: Rp. <span id="total">2000</span></div> -->
                <button onclick="addToCart('Pensil', 2000, 'quantity')">Add to Inventory</button>
            </figcaption>
        </div>
        <!-- Add other items similarly -->
    </div>

    <?php
    session_start();
    ini_set('display_errors', 1);   
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $itemName = "Pensil"; 
        $itemPrice = 2000; 
        $quantity = $_POST['quantity'];

        
        $totalPrice = $itemPrice * $quantity;

        $conn = new mysqli('localhost', 'root', '', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO cart_items (item_name, item_price, quantity, total_price) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siii", $itemName, $itemPrice, $quantity, $totalPrice);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            
            header("Location: inventory.php");
            echo "<script>alert('Item added to cart successfully.');</script>";
        }
    }
    ?>

    <script>
        function incrementQuantity(inputId) {
            var input = document.getElementById(inputId);
            input.value = parseInt(input.value) + 1;
            calculateTotal(inputId);
        }

        function decrementQuantity(inputId) {
            var input = document.getElementById(inputId);
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                calculateTotal(inputId);
            }
        }

        function calculateTotal(inputId) {
            var input = document.getElementById(inputId);
            var total = parseInt(input.value) * parseInt(input.getAttribute('data-price'));
            document.getElementById('total' + inputId.slice(-1)).textContent = total;
        }

        function addToCart(itemName, itemPrice, inputId) {
            var input = document.getElementById(inputId);
            var quantity = parseInt(input.value);
            var total = quantity * itemPrice;
            var cartItem = itemName + ': Rp. ' + itemPrice + ' x ' + quantity + ' = Rp. ' + total;
            alert('Item added to cart:\n' + cartItem);
            // Anda bisa menambahkan logika lebih lanjut di sini untuk menambahkan item ke keranjang di inventory.php
            // Atau Anda dapat menyesuaikan dengan kebutuhan aplikasi Anda.
        }
    </script>


</body>
</html>
