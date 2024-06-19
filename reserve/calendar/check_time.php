<?php
// check_time.php
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

$date = $_POST['date'];
$court = $_POST['court'];

$sql = "SELECT time FROM reservation_payments WHERE date = '$date' AND court_number = '$court'";
$result = $conn->query($sql);

$times = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $times[] = $row['time'];
  }
}

$conn->close();

echo json_encode($times);
?>
