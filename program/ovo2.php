<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <?php include 'navbar.html'; ?>

    <h2>OTP Verification</h2>
    <form action="ovo3.php" method="post">
        <label for="otp">Enter OTP:</label><br>
        <input type="password" id="otp" name="otp" required><br>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
