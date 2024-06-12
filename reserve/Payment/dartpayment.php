
<?php
session_start();
if(isset($_SESSION['status']) && $_SESSION['status'] === 'valid') {
    $logged_on_user = $_SESSION['username'];
} else {
    $logged_on_user = '';
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $sport = $_POST['sport']; // Added
    $date = $_POST['date'];
    $time = $_POST['time'];
    $court_number = $_POST['court_number'];
    $duration = $_POST['duration'];
    $promo_code = $_POST['promo-code'];
    $reference_no = $_POST['reference-no'];
    // Process uploaded image
    $gcash_qrcode = $_FILES['gcash-qrcode']['name'];
    $gcash_qrcode_tmp = $_FILES['gcash-qrcode']['tmp_name'];

    // Directory path to store uploads
    $upload_directory = "qrcode/";

    // Create the directory if it doesn't exist
    if (!file_exists($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }

    // Move uploaded file to the uploads directory
    if (move_uploaded_file($gcash_qrcode_tmp, $upload_directory . $gcash_qrcode)) {
        // File uploaded successfully
    } else {
        // Failed to move the file
        echo "Failed to upload file.";
    }

    $total = $_POST['total'];

    // Check if the reservation already exists
    $check_sql = "SELECT * FROM reservation_payments WHERE date = ? AND time = ? AND court_number = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("sss", $date, $time, $court_number);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Reservation already exists, display alert
        echo "<script>alert('Reservation already exists, wait for admin approval');</script>";
    } else {
        // Reservation does not exist, insert into database
        $insert_sql = "INSERT INTO reservation_payments (username, sports, date, time, court_number, duration, promo_code, reference_no, gcash_qrcode, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssssssssd", $logged_on_user, $sport, $date, $time, $court_number, $duration, $promo_code, $reference_no, $gcash_qrcode, $total);
        $insert_stmt->execute();
        $insert_stmt->close();

        // Display success alert
        echo "<script>alert('Reservation successful!');</script>";
    }

    $check_stmt->close();
}

$sql_gcash = "SELECT * FROM gcash_qr_images";
$result_gcash = $conn->query($sql_gcash);

$sql_bank = "SELECT * FROM bank_qr_images";
$result_bank = $conn->query($sql_bank);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paywall</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, black, green);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
            margin: 0;
        }

        .paywall-container {
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .section {
            margin-bottom: 20px;
            flex: 0 0 48%;
        }

        .detail-item {
            margin-bottom: 10px;
        }

        .detail-item label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .detail-item input[type="text"],
        .detail-item input[type="file"] {
            width: calc(100% - 10px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .detail-item input[type="datetime-local"] {
            width: calc(100% - 10px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .pay-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pay-button:hover {
            background-color: #0056b3;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .image-preview {
            flex: 0 0 48%;
            max-width: 48%;
            text-align: center;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        @media only screen and (max-width: 600px) {
            .section {
                flex: 0 0 100%;
            }
        }

        .back-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: red;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .back-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="paywall-container">
        <form method="post" enctype="multipart/form-data">
            <div class="flex-container">
                <div class="section">
                    <h2>Reservation Details</h2>
                    <div class="detail-item">
                        <label for="sport">Sport:</label>
                        <input type="text" id="sport" name="sport" value="Dart" readonly>
                        </div>
                    <div class="detail-item">
                        <label for="date">Date:</label>
                        <input type="text" id="date" name="date" readonly>
                    </div>
                    <div class="detail-item">
                        <label for="time">Time:</label>
                        <input type="text" id="time" name="time" readonly>
                    </div>
                   <!-- Court Number -->
<div class="detail-item">
    <label for="court_number">Board Number:</label>
    <input type="text" id="court_number" name="court_number" readonly>
</div>


                    <div class="detail-item">
                        <label for="duration">Duration:</label>
                        <input type="text" id="duration" name="duration" readonly>
                    </div>
                    <div class="detail-item">
                        <label for="promo-code">Promo Code:</label>
                        <input type="text" id="promo-code" name="promo-code">
                    </div>
                </div>
                <div class="section">
                    <h2>Gcash Details</h2>
                    <div class="detail-item">
                        <label for="reference-no">Reference No:</label>
                        <input type="text" id="reference-no" name="reference-no">
                    </div>
                    <div class="detail-item">
                        <label for="gcash-qrcode">Upload Proof or Screenshot of payment:</label>
                        <input type="file" id="gcash-qrcode" name="gcash-qrcode" accept="image/*">
                        <div class="image-preview" id="image-preview">
                            <div class="image-title">Gcash QR Code</div>
                            <!-- This is where the uploaded image preview will be displayed -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-container">
                <div class="section">
                    <h2>GCash QR Code</h2>
                    <div class="image-container">
                        <?php  
                        if ($result_gcash->num_rows > 0) {
                            while ($row = $result_gcash->fetch_assoc()) {
                                echo '<div class="image-preview">';
                                echo '<img src="' . $row["image_path"] . '" alt="GCash QR Code">';
                                echo '</div>';
                            }
                        } else {
                            echo "No GCash QR code found";
                        }
                        ?>
                    </div>
                </div>
                <div class="section">
                    <h2>Bank QR Code</h2>
                    <div class="image-container">
                        <?php
                        if ($result_bank->num_rows > 0) {
                            while ($row = $result_bank->fetch_assoc()) {
                                echo '<div class="image-preview">';
                                echo '<img src="' . $row["image_path"] . '" alt="Bank QR Code">';
                                echo '</div>';
                            }
                        } else {
                            echo "No Bank QR code found";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="section">
                <h2>Payment Details</h2>
                <div class="detail-item">
                    <label for="total">Total:</label>
                    <input type="text" id="total" name="total" readonly>
                </div>
            </div>
            <div class="section">
                <button type="submit" class="pay-button">Confirm</button>
                <button type="button" class="back-button" onclick="window.location.href='http://localhost/reservation_system/reserve/calendar/dart.php'">Back</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('gcash-qrcode').addEventListener('change', function(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    while (preview.firstChild) {
                        preview.removeChild(preview.firstChild);
                    }
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Gcash QR Code';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
    function getUrlParameter(name) {
        name = name.replace(/[\[\]]/g, '\\$&');
        const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
        const results = regex.exec(window.location.href);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    document.getElementById('date').value = getUrlParameter('date');
    document.getElementById('time').value = getUrlParameter('time');
    document.getElementById('court_number').value = getUrlParameter('court'); // Populate court input

    document.getElementById('duration').value = getUrlParameter('duration');

    function updateTotal() {
        const duration = document.getElementById('duration').value;
        let total = 0;
        if (duration === '1 hour') {
            total = 100;
        } else if (duration === '2 hours') {
            total = 200;
        } else if (duration === '3 hours') {
            total = 300;
        } else if (duration === 'Open hours') {
            total = 400;
        }
        document.getElementById('total').value = total;
    }

    updateTotal();
});


        document.addEventListener('DOMContentLoaded', function() {
            function validateForm() {
                const referenceNoInput = document.getElementById('reference-no');
                const referenceNoValue = referenceNoInput.value.trim();
                if (referenceNoValue === '') {
                    alert('Please fill up the reference number. Do not leave it blank.');
                    return false;
                }
                return true;
            }

            document.querySelector('form').addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>