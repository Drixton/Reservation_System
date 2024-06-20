<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";  // Use the actual password for the root user if set
$database = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
