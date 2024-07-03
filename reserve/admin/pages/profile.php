
<?php
session_start();

if ($_SESSION['status'] != 'valid') {
    header("Location: http://localhost/reservation_system/reserve/admin/index.php");
    exit();
}

$host = "localhost";
$username = "root";
$password = "";
$dbName = "reservation";

try {
    $con = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (!isset($_SESSION['full_name'])) {
    header("Location: index.php");
    exit();
}

$fullName = $_SESSION['full_name'];
$email = $_SESSION['email'];

try {
    $selectQuery = "SELECT profile_pictures FROM adminlogs WHERE email = :email";
    $selectStatement = $con->prepare($selectQuery);
    $selectStatement->bindParam(':email', $email);
    $selectStatement->execute();
    $result = $selectStatement->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['profile_pictures']) && !empty($result['profile_pictures'])) {
        $profilePicturePath = $result['profile_pictures'];
    } else {
        $profilePicturePath = 'profile_pictures/default_profile_picture.jpg'; // Adjust default path as per your directory structure
    }
} catch (PDOException $e) {
    echo "Error fetching profile picture: " . $e->getMessage();
}

if (isset($_POST['save_picture'])) {
    $uploadDirectory = 'profile_pictures/';
    $uploadedFile = $uploadDirectory . basename($_FILES['profile_picture']['name']);
    $maxFileSize = 2 * 1024 * 1024;

    if ($_FILES['profile_picture']['size'] > $maxFileSize) {
        echo '<script>alert("File size exceeds 2MB limit.");</script>';
    } else {
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadedFile)) {
            try {
                $updateQuery = "UPDATE adminlogs SET profile_pictures = :picture WHERE email = :email";
                $updateStatement = $con->prepare($updateQuery);
                $updateStatement->bindParam(':picture', $uploadedFile);
                $updateStatement->bindParam(':email', $email);
                $updateStatement->execute();

                $_SESSION['profile_picture'] = $uploadedFile;

                echo '<script>alert("Profile picture saved successfully.");</script>';
                // Reload the page after successful upload to reflect changes
                echo '<script>window.location.href = "profile.php";</script>';
            } catch (PDOException $e) {
                echo "Profile picture save failed: " . $e->getMessage();
            }
        } else {
            echo '<script>alert("Failed to upload profile picture.");</script>';
        }
    }
}

if (isset($_POST['update_profile'])) {
    $newFullName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    try {
        $updateQuery = "UPDATE adminlogs SET full_name = :newFullName, email = :newEmail, password = :hashedPassword WHERE email = :email";
        $updateStatement = $con->prepare($updateQuery);
        $updateStatement->bindParam(':newFullName', $newFullName);
        $updateStatement->bindParam(':newEmail', $newEmail);
        $updateStatement->bindParam(':hashedPassword', $hashedPassword);
        $updateStatement->bindParam(':email', $email);
        $updateStatement->execute();

        $_SESSION['full_name'] = $newFullName;
        $_SESSION['email'] = $newEmail;

        echo '<script>alert("Profile updated successfully.");</script>';
    } catch (PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #4d4855;
    background-image: linear-gradient(147deg, green 0%, black 74%);
    background: cover;
    color: #fff;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Profile</h1>
        <p>Welcome, <?php echo $fullName; ?>!</p>
        <p>Email: <?php echo $email; ?></p>

        <form method="post" action="" enctype="multipart/form-data">
            <label for="profile_picture">Profile Picture:</label>
            <img src="<?php echo $profilePicturePath; ?>" alt="Profile Picture" style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #4CAF50; border-radius: 50%; margin: 10px 0;">
            <input type="file" id="profile_picture" name="profile_picture">
            <button type="submit" name="save_picture">Save Picture</button>
        </form>

        <!-- Update Profile Form -->
        <form method="post" action="">
            <label for="new_name">New Full Name:</label>
            <input type="text" id="new_name" name="new_name" placeholder="Enter new full name" required>

            <label for="new_email">New Email:</label>
            <input type="text" id="new_email" name="new_email" placeholder="Enter new email" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

            <button type="submit" name="update_profile">Update Profile</button>
            <button type="button" onclick="goBack()">Back</button>
        </form>
    </div>

    <script>
        function goBack() {
            window.location.href = "/reservation_system/reserve/admin/pages/dashboard.php";
        }
    </script>
</body>
</html>
