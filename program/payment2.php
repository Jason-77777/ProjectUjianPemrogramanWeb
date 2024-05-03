<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <?php include 'navbar.html'; ?>

    <div class="payment-container">
        <div class="payment-options">
            <h2>Select Payment Method</h2>
            <div class="payment-methods">
                <div class="payment-method">
                    <a href="gopay.php"><img src="assets/gopay.png" width="150px"></a>
                    <p>GoPay</p>
                </div>
                <div class="payment-method">
                    <a href="ovo.php"><img src="assets/ovo.png" width="150px"></a>
                    <p>OVO</p>
                </div>
                <div class="payment-method">
                    <a href="bca.php"><img src="assets/bca.png" width="150px"></a>
                    <p>BCA<p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
