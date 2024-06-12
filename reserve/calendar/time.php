<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch time data from reservation_payments table
$timeData = [];
$sqlTime = "SELECT DISTINCT `time` FROM reservation_payments";
$resultTime = $conn->query($sqlTime);
if ($resultTime->num_rows > 0) {
    while($row = $resultTime->fetch_assoc()) {
        $timeData[] = $row['time'];
    }
}

// Fetch court_number data from reservation_payments table
$courtNumberData = [];
$sqlCourtNumber = "SELECT DISTINCT `court_number` FROM reservation_payments";
$resultCourtNumber = $conn->query($sqlCourtNumber);
if ($resultCourtNumber->num_rows > 0) {
    while($row = $resultCourtNumber->fetch_assoc()) {
        $courtNumberData[] = $row['court_number'];
    }
}

// Close database connection
$conn->close();

// Combine the fetched data into an associative array
$databaseResult = [
    'time' => $timeData,
    'court_number' => $courtNumberData
];

// Set response header to JSON
header('Content-Type: application/json');

// Output the JSON-encoded database result
echo json_encode($databaseResult);
?>