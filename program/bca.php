<?php
if (!isset($_FILES['pdfFile'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <title>BCA</title>
</head>
<body>
    <?php include 'navbar.html'; ?>
    <div class="bca">
    <form action="bca.php" method="post" enctype="multipart/form-data">
        <p>Insert 0222889918 to your BCA Account for transfer</p>  
        <label for="pdfFile">Transfer Proof</label><br>
        <input type="file" id="pdfFile" name="pdfFile" accept=".pdf" class="btn btn-primary" required><br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </body>
</html>
<?php
} else {
    $conn = new mysqli('localhost', 'root', 'root', 'parpel');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["pdfFile"]) && $_FILES["pdfFile"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);

            if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["pdfFile"]["name"]). " has been uploaded.";

                $file_name = $_FILES["pdfFile"]["name"];
                $file_path = $target_file;
                $sql = "INSERT INTO uploaded_files (file_name, file_path) VALUES ('$file_name', '$file_path')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                    header("Location: home.php");
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "No file uploaded or an error occurred during upload.";
        }
    }

    $conn->close();
}
    ?>

