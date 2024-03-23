<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $quantity = $_POST['quantity'];

    // Example: Storing cart items in session
    $cartItem = array(
        'itemName' => $itemName,
        'itemPrice' => $itemPrice,
        'quantity' => $quantity
    );

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $cartItem);

    // Redirect back to the page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>
<body>
    
</body>
</html>