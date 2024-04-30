<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<main class="bg-sign-in d-flex justify-content-center align-items-center">
    <div class="form-sign-in bg-#C0C0C0 mt-2 h-auto mb-2 text-center pt-2 pe-4 ps-4 d-flex flex-column">

        <div>
            <h2 class="sign-in text-uppercase">CREATE ACCOUNT</h2>
        </div>

        <!-- Registration form -->
        <form id="registerForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3 mt-3 text-start">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            </div>
            <div class="mb-3 text-start">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3 text-start">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
            </div>

            <button type="submit" name="submit" class="btn-like">Register</button>
            <a class="btn-like" href="/TRACK-WISE/login.php">Back to Login</a>
            <br><br>
        </form>

        <?php
// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve username, email, and password from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // Email already exists, display error message
        echo '<div class="alert alert-danger" role="alert">Account with this email already exists. Please use a different email.</div>';
    } else {
        // Email does not exist, proceed with registration
        // Query to insert user into database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, display success message with JavaScript
            echo '<script>
                    alert("Registration successful. You can now login.");
                    window.location.href = "index.php";
                  </script>';
        } else {
            // Registration failed, display error message
            echo '<div class="alert alert-danger" role="alert">Registration failed. Please try again.</div>';
        }
    }

    // Close database connection
    $conn->close();
}
?>



    </div>
</main>

<script src="./js/bootstrap.bundle.js"></script>
</body>
</html>
