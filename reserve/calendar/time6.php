<?php
// Establish a connection to the database
include 'db_connection.php';
// Fetch time data from reservation_payments table where court_number is 'court 1'
$timeData = [];
$sqlTime = "SELECT DISTINCT `time`, `court_number` FROM reservation_payments WHERE `court_number` = 'court 6'";
$resultTime = $conn->query($sqlTime);
if ($resultTime->num_rows > 0) {
    while ($row = $resultTime->fetch_assoc()) {
        $timeData[] = [
            'time' => $row['time'],
            'court_number' => $row['court_number']
        ];
    }
}

// Close database connection
$conn->close();

// Prepare response as JSON
$databaseResult = [
    'time' => $timeData
];

// Set response header to JSON
header('Content-Type: application/json');

// Output the JSON-encoded database result
echo json_encode($databaseResult);
?>
