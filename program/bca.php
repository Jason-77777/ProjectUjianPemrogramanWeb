<?php
if (!isset($_FILES['pdfFile'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA</title>
</head>
<body>
    <?php include 'navbar.html'; ?>
    <form action="bca.php" method="post" enctype="multipart/form-data">
        <p>Insert 0222889918 to your BCA Account for transfer</p>  
        <label for="pdfFile">Transfer Proof</label><br>
        <input type="file" id="pdfFile" name="pdfFile" accept=".pdf" required><br><br>
        <button type="submit">Submit</button>
    </form>
    </body>
</html>
<?php
} else {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "parpel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if a file is uploaded
        if (isset($_FILES["pdfFile"]) && $_FILES["pdfFile"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);
            
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["pdfFile"]["name"]). " has been uploaded.";

                // Insert record into the database
                $file_name = $_FILES["pdfFile"]["name"];
                $file_path = $target_file;
                $sql = "INSERT INTO uploaded_files (file_name, file_path) VALUES ('$file_name', '$file_path')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                    header ("home.php");
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

    // Close connection
    $conn->close();
}
    ?>

