<?php
// Check if POST data is received
include '../admin/conixion.php';
    // Escape user inputs for security (not shown here, but recommended)
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Query to check if the combination exists
    $sql = "SELECT * FROM reservation_payments WHERE date = '$date' AND time = '$time'";
    $result = $conn->query($sql);

    // Check if any row is returned
    if ($result->num_rows > 0) {
        // Entry already exists
        echo json_encode(true);
    } else {
        // Entry does not exist
        echo json_encode(false);
    }

    // Close connection
    $conn->close();
}
?>
