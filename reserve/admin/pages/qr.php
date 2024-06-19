<?php

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

        // Determine table name based on qr_type
        if ($_POST['qr_type'] == 'bpi' || $_POST['qr_type'] == 'bdo') {
            $table_name = ($_POST['qr_type'] == 'bpi') ? 'bpi_qr_images' : 'bdo_qr_images';
        } else {
            $table_name = ($_POST['qr_type'] == 'gcash') ? 'gcash_qr_images' : 'bank_qr_images';
        }

        $select_sql = "SELECT id FROM $table_name WHERE id = 1";
        $result = $conn->query($select_sql);

        if ($result && $result->num_rows > 0) {
            // If an existing record is found, update the existing image file
            $image_path = $upload_directory . $new_qr_image; // Complete path to the new image
            $update_sql = "UPDATE $table_name SET image_path = ? WHERE id = 1";
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
            $insert_sql = "INSERT INTO $table_name (id, image_path) VALUES (1, ?)";
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update QR Image</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php include "component/sidebar.php"; ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
            <div class="container">
                <h1>Update QR Image</h1>
                <?php if(!empty($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                <form id="upload-form" method="post" enctype="multipart/form-data">
                    <label for="qr_type">Select QR Type:</label>
                    <select name="qr_type" id="qr_type">
                        <option value="bpi">BPI</option>
                        <option value="bdo">BDO</option>
                        <option value="gcash">Gcash</option>
                        <option value="bank">Bank</option>
                    </select>
                    <label for="new-qrcode">Upload New QR Image:</label>
                    <input type="file" id="new-qrcode" name="new-qrcode" accept="image/*">
                    <button type="submit">Update QR Image</button>
                </form>
            </div>

            <script>
                <?php if(!empty($message)): ?>
                    alert("<?php echo $message; ?>");
                <?php endif; ?>
            </script>
        </div>
        <!-- end content page -->
    </main>
</body>

</html>
