<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.html'; ?>

    <div class="containerdatauser">
        <h2>Payment</h2>
        <form action="ovo2.php" method="post">
            <label for="ovoName">OVO Username:</label><br>
            <input type="text" id="ovoName" name="ovoName" required><br>

            <label for="ovoNumber">OVO Number:</label><br>
            <input type="int" id="ovoNumber" name="ovoNumber" required><br>
                    
        <button type="submit">Pay Now</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ovoName = $_POST['ovoName'];
    $ovoNumber = $_POST['ovoNumber'];

    $conn = new mysqli('localhost', 'root', '', 'parpel');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO ovo(ovoName, ovoNumber) VALUES(?, ?)");
        $stmt->bind_param("si", $ovoName, $ovoNumber); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        header("Location: ovo2.php");
        exit();
    }
}
?>
</body>
</html>
