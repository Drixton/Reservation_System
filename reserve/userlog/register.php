<?php
// Database connection credentials
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form submission
if(isset($_POST['submit'])) {
    // Retrieve email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to insert user into database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        // Registration failed, redirect back to registration page with error message
        header("Location: create_account.php?error=registration_failed");
        exit();
    }
}

// Close database connection
$conn->close();
?>
