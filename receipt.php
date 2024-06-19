<?php
session_start();

// Check if user is logged in
if(isset($_SESSION['status']) && $_SESSION['status'] === 'valid') {
    $logged_on_user = $_SESSION['username'];
} else {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Ensure required parameters are passed via GET
if(isset($_GET['date']) && isset($_GET['time']) && isset($_GET['court'])) {
    $date = $_GET['date'];
    $time = $_GET['time'];
    $court_number = $_GET['court'];
} else {
    // Redirect or handle error if parameters are missing
    header("Location: reservation_form.php");
    exit;
}

// Get current date and time
$current_date = date('Y-m-d');
$current_time = date('H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-details {
            margin-bottom: 20px;
        }
        .receipt-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .receipt-details table td {
            padding: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h1>Reservation Receipt</h1>
        </div>
        <div class="receipt-details">
            <table>
                <tr>
                    <td><strong>Username:</strong></td>
                    <td><?php echo htmlspecialchars($logged_on_user); ?></td>
                </tr>
                <tr>
                    <td><strong>Date:</strong></td>
                    <td><?php echo htmlspecialchars($date); ?></td>
                </tr>
                <tr>
                    <td><strong>Time:</strong></td>
                    <td><?php echo htmlspecialchars($time); ?></td>
                </tr>
                <tr>
                    <td><strong>Court Number:</strong></td>
                    <td><?php echo htmlspecialchars($court_number); ?></td>
                </tr>
                <tr>
                    <td><strong>Issued Date:</strong></td>
                    <td><?php echo htmlspecialchars($current_date); ?></td>
                </tr>
                <tr>
                    <td><strong>Issued Time:</strong></td>
                    <td><?php echo htmlspecialchars($current_time); ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
