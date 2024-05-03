<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <title>OTP Verification</title>
</head>
<body>
    <?php include 'navbar.html'; ?>

    <div class="ovo2">
        <form action="ovo3.php" method="post">
        <h2>OTP Verification</h2>
            <label for="otp">Enter OTP:</label><br>
            <input type="password" id="otp" name="otp" required><br>
            <button type="submit" class="btn btn-primary">Verify OTP</button>
        </form>
    </div>
</body>
</html>
