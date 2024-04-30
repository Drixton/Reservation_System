<?php
// Database connection credentials
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

// Process login form submission
if(isset($_POST['submit'])) {
    // Retrieve email and password from form
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    // Query to fetch user details from database
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, redirect to dashboard or desired page
        echo "<script>alert('Success login'); window.location.href='../landpage/dashboard.php';</script>";
        exit();
    } else {
        // User not found or invalid credentials, redirect back to login page with error message
        header("Location: index.php?error=email or password not found");
        exit();
    }
}

// Close database connection
$conn->close();
?>
    