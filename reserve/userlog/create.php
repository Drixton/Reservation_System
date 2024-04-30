<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            padding: 10px;
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            color: white; /* Added */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: white; /* Changed */
        }

        .btn-like {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(to bottom, #000, #333);
            color: white; /* Changed */
            text-decoration: none;
            border: 1px solid white; /* Changed */
            border-radius: 4px;
        }

        .btn-like:hover {
            background: linear-gradient(to bottom, #111, #444);
            color: white;
        }
        .bg-sign-in {
            background-image: url('../assets/img/logbg.jpg');
            background-size: cover; /* Ensure the background covers the entire container */
            background-repeat: no-repeat;
            background-position: center; /* Center the background image */
            min-height: 100vh;
        }


        .form-sign-in {
            background-color: rgba(128, 128, 128, 0.4); /* Adjust the alpha value (0.5 in this case) to set the transparency */
            padding: 20px;
            border-radius: 15px;
            color: white; /* Added */
        }


        .sign-in {
            font-family: "Anton", sans-serif; /* Change font family to your desired font */
            font-size: 24px; /* Adjust font size as needed */
            font-weight: bold; /* Optionally, make the text bold */
            color: lightgreen; 
        }

    </style>
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
            <a class="btn-like" href="/reserve/userlog/index.php">Back</a>
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

    // Check if password length is exactly 8 characters
    if (strlen($password) !== 8) {
        // Password does not meet the required length, display error message
        echo '<div class="alert alert-danger" role="alert">Password must be exactly 8 characters long.</div>';
        // Close database connection
        $conn->close();
        // Stop further execution
        exit();
    }

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
