<?php
// Connect to the database
include '../conixion.php';


// Check if ID is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo 'error';
}
?>
