<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVO</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <?php include 'navbar.html'; ?>

    <div class="ovo">
        <form action="" method="post">
            <label for="ovoName">OVO Username:</label><br>
            <input type="text" id="ovoName" name="ovoName" required><br>

            <label for="ovoNumber">OVO Number:</label><br>
            <input type="text" id="ovoNumber" name="ovoNumber" required><br>
            
            <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ovoName = $_POST['ovoName'];
        $ovoNumber = $_POST['ovoNumber'];

        $conn = new mysqli('localhost', 'root', 'root', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }
        else{
            $stmt = $conn->prepare("INSERT INTO ovo(ovoName, ovoNumber) VALUES(?, ?)");
            $stmt->bind_param("si", $ovoName, $ovoNumber); 
            if ($stmt->execute()) {
                echo '<p>Data inserted successfully.</p>';
                header("Location: ovo2.php");
                exit();
            } else {
                echo '<p>Error inserting data into the database.</p>';
            }
            $stmt->close();
            $conn->close();
        }
    }
    ?>
</body>
</html>
