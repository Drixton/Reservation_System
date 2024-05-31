<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if IDs are passed from the client
if (isset($_POST['ids']) && !empty($_POST['ids'])) {
    $ids = $_POST['ids'];

    // Move records to 'badmintonpage' table and delete from 'reservation_payments' table
    $deleteSQL = "DELETE FROM reservation_payments WHERE id IN (" . implode(",", $ids) . ")";
    $insertSQL = "INSERT INTO badmintonpage (id, username, sports, date, time, court_number, duration, promo_code, reference_no, gcash_qrcode, total, created_at) SELECT id, username, sports, date, time, court_number, duration, promo_code, reference_no, gcash_qrcode, total, created_at FROM reservation_payments WHERE id IN (" . implode(",", $ids) . ")";

    if ($conn->query($deleteSQL) === TRUE && $conn->query($insertSQL) === TRUE) {
        echo "Records moved successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
