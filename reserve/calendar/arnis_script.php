<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch time data from the database
$sql = "SELECT time FROM reservation_payments";
$result = $conn->query($sql);

$timeData = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $timeData[] = $row["time"];
    }
}

// Close connection
$conn->close();

// Return time data as JSON
echo json_encode(array("time" => $timeData));
?>
