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

// Check if the AJAX request data is set and not empty
if (isset($_POST['rowData']) && !empty($_POST['rowData'])) {
    // Process the data and perform necessary operations
    $rowData = $_POST['rowData'];
    // Insert data into "badmintonpage" table
    // Example: $sql = "INSERT INTO badmintonpage (column1, column2, ...) VALUES ('$rowData[0]', '$rowData[1]', ...)";
    // Execute the SQL query
    // Example: if ($conn->query($sql) === TRUE) { /* Success */ } else { /* Error */ }
    // Delete data from "reservation_payments" table
    // Example: $sql = "DELETE FROM reservation_payments WHERE id = '$rowData[0]'";
    // Execute the SQL query
    // Example: if ($conn->query($sql) === TRUE) { /* Success */ } else { /* Error */ }
} else {
    // Handle the case when data is not set or empty
}

// Close connection
$conn->close();
?>
