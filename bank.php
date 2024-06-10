<?php
session_start();

// Database connection parameters
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

$message = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process uploaded image
    if (!empty($_FILES['new-qrcode']['name'])) {
        $new_qr_image = $_FILES['new-qrcode']['name'];
        $new_qr_image_tmp = $_FILES['new-qrcode']['tmp_name'];

        // Directory path to store uploads
        $upload_directory = "../assets/img/";

        // Create the directory if it doesn't exist
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0777, true);
        }

        // Check if there is an existing image in the database
        $select_sql = "SELECT id FROM bank_qr_images WHERE id = 1";
        $result = $conn->query($select_sql);

        if ($result && $result->num_rows > 0) {
            // If an existing record is found, update the existing image file
            $image_path = $upload_directory . $new_qr_image; // Complete path to the new image
            $update_sql = "UPDATE bank_qr_images SET image_path = ? WHERE id = 1";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("s", $image_path);
            if ($update_stmt->execute()) {
                // Move uploaded file to the uploads directory
                if (move_uploaded_file($new_qr_image_tmp, $image_path)) {
                    $message = "QR image updated successfully.";
                } else {
                    $error = "Failed to move uploaded file.";
                }
            } else {
                $error = "Failed to update image in the database: " . $conn->error;
            }
            $update_stmt->close();
        } else {
            // If no existing record is found, insert a new record
            $image_path = $upload_directory . $new_qr_image; // Complete path to the new image
            $insert_sql = "INSERT INTO bank_qr_images (id, image_path) VALUES (1, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("s", $image_path);
            if ($insert_stmt->execute()) {
                // Move uploaded file to the uploads directory
                if (move_uploaded_file($new_qr_image_tmp, $image_path)) {
                    $message = "New QR image uploaded successfully.";
                } else {
                    $error = "Failed to move uploaded file.";
                }
            } else {
                $error = "Failed to insert image into the database: " . $conn->error;
            }
            $insert_stmt->close();
        }
    } else {
        $error = "Please select a file to upload.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update QR Image</title>
    <style>
        body {
            background-color: #f0f0f0; /* Light gray background */
            font-family: Arial, sans-serif;
            color: #333; /* Dark gray text */
            display: flex; /* Use flexbox to center the container */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Make the body take up the full viewport height */
        }

        .container {
            width: 50%; /* Set the width of the container */
            background-color: #fff; /* White background for the container */
            padding: 20px; /* Add some padding inside the container */
            border-radius: 10px; /* Add rounded corners to the container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow effect */
        }

        h1 {
            color: #009933; /* Green color for the heading */
        }

        form {
            margin-top: 20px; /* Add some space between the heading and the form */
        }

        label {
            display: block; /* Make labels display as blocks */
            margin-bottom: 10px; /* Add some space below labels */
        }

        input[type="file"] {
            margin-bottom: 10px; /* Add some space below the file input */
        }

        button[type="submit"] {
            background-color: #000; /* Black button background */
            color: #fff; /* White button text */
            padding: 10px 20px; /* Add some padding to the button */
            border: none; /* Remove button border */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        button[type="submit"]:hover {
            background-color: #333; /* Darken button background on hover */
        }

        .error {
            color: #ff0000; /* Red color for error message */
            margin-top: 10px; /* Add some space above the message */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Bank QR Image</h1>
        <?php if(!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form id="upload-form" method="post" enctype="multipart/form-data">
            <label for="new-qrcode">Upload New Gcash QR Image:</label>
            <input type="file" id="new-qrcode" name="new-qrcode" accept="image/*">
            <button type="submit">Update QR Image</button>
        </form>
    </div>

    <script>
        <?php if(!empty($message)): ?>
            alert("<?php echo $message; ?>");
        <?php endif; ?>
    </script>
</body>
</html>
