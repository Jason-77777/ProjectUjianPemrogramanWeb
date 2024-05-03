<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gopay</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <?php include 'navbar.html'; ?>

    <div class="gopay">
        <form action="" method="post">
            <label for="namaGopay">Gopay Username:</label><br>
            <input type="text" id="namaGopay" name="namaGopay" required><br>

            <label for="nomorGopay">Gopay Number:</label><br>
            <input type="text" id="nomorGopay" name="nomorGopay" required><br>
            
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namaGopay = $_POST['namaGopay'];
        $nomorGopay = $_POST['nomorGopay'];

        $conn = new mysqli('localhost', 'root', 'root', 'parpel');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }
        else{
            $stmt = $conn->prepare("INSERT INTO gopay(namaGopay, nomorGopay) VALUES(?, ?)");
            $stmt->bind_param("si", $namaGopay, $nomorGopay); 
            if ($stmt->execute()) {
                echo '<p>Data inserted successfully.</p>';
                header("Location: gopay2.php");
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
