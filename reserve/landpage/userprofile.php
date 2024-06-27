<?php
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "reservation";

try {
    $con = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch the email of the currently logged-in user based on the username
try {
    $emailQuery = "SELECT email FROM users WHERE username = :username";
    $emailStatement = $con->prepare($emailQuery);
    $emailStatement->bindParam(':username', $username);
    $emailStatement->execute();
    $emailResult = $emailStatement->fetch(PDO::FETCH_ASSOC);

    if ($emailResult && isset($emailResult['email'])) {
        $email = $emailResult['email'];
    } else {
        throw new Exception("Email not found for the user.");
    }
} catch (PDOException $e) {
    echo "Error fetching email: " . $e->getMessage();
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

// Directory where uploaded images will be saved
$uploadDirectory = 'profile_pictures/';

try {
    if (isset($_POST['save_picture'])) {
        $uploadedFile = $uploadDirectory . basename($_FILES['profile_picture']['name']);
        $maxFileSize = 2 * 1024 * 1024; // 2MB

        // Check file size
        if ($_FILES['profile_picture']['size'] > $maxFileSize) {
            echo '<script>alert("File size exceeds 2MB limit.");</script>';
        } else {
            // Move uploaded file to the directory
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadedFile)) {
                // Update database with file path
                $updateQuery = "UPDATE users SET profile_picture = :picture WHERE email = :email";
                $updateStatement = $con->prepare($updateQuery);
                $updateStatement->bindParam(':picture', $uploadedFile);
                $updateStatement->bindParam(':email', $email);
                $updateStatement->execute();

                $_SESSION['profile_picture'] = $uploadedFile;

                echo '<script>alert("Profile picture saved successfully.");</script>';
            } else {
                echo '<script>alert("Failed to upload profile picture.");</script>';
            }
        }
    }

    // Fetch current profile picture path for display
    $selectQuery = "SELECT profile_picture FROM users WHERE email = :email";
    $selectStatement = $con->prepare($selectQuery);
    $selectStatement->bindParam(':email', $email);
    $selectStatement->execute();
    $result = $selectStatement->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['profile_picture']) && !empty($result['profile_picture'])) {
        $profilePicturePath = $result['profile_picture'];
    } else {
        $profilePicturePath = 'default_profile_picture.jpg';
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit();
}

// Update profile information
if (isset($_POST['update_profile'])) {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
    } else {
        try {
            $updateQuery = "UPDATE users SET username = :newUsername, email = :newEmail, password = :newPassword WHERE email = :currentEmail";
            $updateStatement = $con->prepare($updateQuery);
            $updateStatement->bindParam(':newUsername', $newUsername);
            $updateStatement->bindParam(':newEmail', $newEmail);
            $updateStatement->bindParam(':newPassword', $newPassword);
            $updateStatement->bindParam(':currentEmail', $email);
            $updateStatement->execute();

            $_SESSION['username'] = $newUsername;
            $_SESSION['email'] = $newEmail;

            echo '<script>alert("Profile updated successfully.");</script>';
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/TRACK-WISE/asset/icon.png" type="image/x-icon">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #4CAF50;
        }

        .container {
            background-color: #333;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            color: #4CAF50;
            font-size: 16px;
            margin-bottom: 20px;
        }

        img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 2px solid #4CAF50;
            border-radius: 50%;
            margin: 10px auto 20px auto; /* Center the image horizontally */
            display: block; /* Ensures the image is centered correctly */
        }

        label {
            color: #4CAF50;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"] {
            display: none;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #4CAF50;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #444;
            color: #4CAF50;
        }

        .file-upload-label {
            display: inline-block;
            background-color: #4CAF50;
            color: #000;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button {
            background-color: #4CAF50;
            color: #000;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <p>Welcome, <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>!</p>
        <p>Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>



        <!-- Update Profile Form -->
        <form method="post" action="">
            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username" placeholder="Enter new username" required>

            <label for="new_email">New Email:</label>
            <input type="email" id="new_email" name="new_email" placeholder="Enter new email" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

            <button type="submit" name="update_profile">Update Profile</button>
            <button type="button" onclick="goBack()">Back</button>
        </form>
    </div>

    <script>
        function previewImage(input) {
            var profileImage = document.getElementById('profile_image');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                profileImage.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                profileImage.src = 'default_profile_picture.jpg';
            }
        }

        function goBack() {
            window.location.href = "../landpage/dashboard.php";
        }
    </script>
</body>
</html>
