<?php
// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images from gcash_qr_images table
$sql_gcash = "SELECT image_path FROM gcash_qr_images";
$result_gcash = $conn->query($sql_gcash);

// Fetch images from bank_qr_images table
$sql_bank = "SELECT image_path FROM bank_qr_images";
$result_bank = $conn->query($sql_bank);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Display</title>
    <style>
        img {
            width: 300px; /* Set default width */
            height: auto; /* Maintain aspect ratio */
            display: block; /* Ensure images are displayed as blocks */
            margin-bottom: 20px; /* Add some space between images */
        }
    </style>
</head>
<body>
    <h1>GCash QR Images</h1>
    <?php
    // Display GCash QR images
    if ($result_gcash->num_rows > 0) {
        while ($row = $result_gcash->fetch_assoc()) {
            echo '<img src="' . $row["image_path"] . '" alt="GCash QR">';
        }
    } else {
        echo "No GCash QR images found";
    }
    ?>

    <h1>Bank QR Images</h1>
    <?php
    // Display Bank QR images
    if ($result_bank->num_rows > 0) {
        while ($row = $result_bank->fetch_assoc()) {
            echo '<img src="' . $row["image_path"] . '" alt="Bank QR">';
        }
    } else {
        echo "No Bank QR images found";
    }
    ?>
</body>
</html>
