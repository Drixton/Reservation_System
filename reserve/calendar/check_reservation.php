<?php
// Assuming you have a database connection established already
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize inputs
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Get POST data
$selectedDate = sanitize_input($_POST['date']);
$selectedTime = sanitize_input($_POST['time']);
$selectedSport = sanitize_input($_POST['sport']);
$selectedCourt = sanitize_input($_POST['court']);
$selectedDuration = sanitize_input($_POST['duration']);

// Prepare SQL query to check if reservation exists
$sql = "SELECT * FROM reservation_payments WHERE date = '$selectedDate' AND time = '$selectedTime' AND sports = '$selectedSport' AND court_number = '$selectedCourt' AND duration = '$selectedDuration'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Reservation exists
    echo json_encode(true);
} else {
    // Reservation does not exist
    echo json_encode(false);
}

$conn->close();
?>
