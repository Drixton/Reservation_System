<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Units Report List</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <style>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            position: relative; /* Make the body a positioned parent */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            position: relative;
            font-weight: normal; /* Reset font weight */
        }
        th:not(:last-child), /* Exclude last child from applying background color */
        th:first-child ~ th { /* Apply styles from the second th onwards */
            background-color: #2e8b57; /* Changed background color */
            color: white; /* Changed text color to white */
            font-weight: bold;
        }
        .buttons-container {
            position: absolute; /* Position the container absolutely */
            top: 20px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            display: flex;
        }
        .buttons-container .button {
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            margin-left: 10px;
            transition: background-color 0.3s;
        }
        .buttons-container .button:hover {
            background-color: #0056b3;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .details {
            color: gray;
            cursor: pointer;
            display: block; /* Display the details button as a block element */
            width: 100%; /* Set the width to 100% */
            text-align: left; /* Align the text to the right */
        }
        .details-container {
            padding: 10px; /* Add some padding to the container */
        }
        @media only screen and (max-width: 600px) {
            th, td {
                padding: 5px;
            }
        }
        
 
    </style>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <?php include "component/sidebar.php"; ?>
        <div class="container-fluid px-4">
            
        <h1>Reservation Payments</h1>

<div class="buttons-container">
    <button class="button">Archive</button>
    <button class="button">Delete</button>
</div>

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

// SQL query to retrieve data from the reservation_payments table
$sql = "SELECT * FROM reservation_payments";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row in an HTML table
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Date</th><th>Time</th><th>Court Number</th><th>Duration</th><th>Promo Code</th><th>Reference No</th><th>GCash QR Code</th><th>Total</th><th>Created At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["court_number"] . "</td>";
        echo "<td>" . $row["duration"] . "</td>";
        echo "<td>" . $row["promo_code"] . "</td>";
        echo "<td>" . $row["reference_no"] . "</td>";
        echo "<td>" . $row["gcash_qrcode"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>


</main>
</body>

</html>
