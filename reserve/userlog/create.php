<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <style>
        /* Remove margin and padding from body and html */
        body, html {
            margin: 0;
            padding: 0;
        }

        .bg-sign-in {
            background: linear-gradient(to right, black, #008000);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh; /* Set height to 100 viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-sign-in {
            background-color: rgba(128, 128, 128, 0.4);
            padding: 20px;
            border-radius: 15px;
            color: white;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .form-sign-in h2 {
            font-family: "Anton", sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: lightgreen;
            margin-bottom: 20px;
        }

        .form-sign-in label {
            display: block;
            margin-bottom: 0.5rem;
            text-align: left;
        }

        .form-sign-in input[type="text"],
        .form-sign-in input[type="email"],
        .form-sign-in input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-sign-in button[type="submit"],
        .form-sign-in a.btn-like {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(to bottom, #000, #333);
            color: white;
            text-decoration: none;
            border: 1px solid white;
            border-radius: 4px;
            margin-right: 10px;
        }

        .form-sign-in button[type="submit"]:hover,
        .form-sign-in a.btn-like:hover {
            background: linear-gradient(to bottom, #111, #444);
            color: white;
        }
    </style>
</head>
<body>
<main class="bg-sign-in">
    <div class="form-sign-in">

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
            <a class="btn-like" href="index.php">Back</a>
            <br><br>
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection credentials
    include '../admin/conixion.php';

    // Retrieve username, email, and password from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize inputs (optional but recommended)
    $username = $conn->real_escape_string($username);
    $email = $conn->real_escape_string($email);

    // Query to check if the email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // Email already exists, display error message
        echo '<div class="alert alert-danger" role="alert">Account with this email already exists. Please use a different email.</div>';
    } else {
        // Email does not exist, proceed with registration

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query to insert user into database with hashed password
        $sql = "INSERT INTO users (username, email, password, time_in) VALUES ('$username', '$email', '$hashed_password', NOW())";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, display success message with JavaScript
            echo '<script>
                alert("Registration successful. You can now login.");
                window.location.href = "index.php"; // Redirect to login page
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
