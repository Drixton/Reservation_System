<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] === 'valid') {
    $logged_on_user = $_SESSION['username'];
} else {
    $logged_on_user = '';
}
if ($_SESSION['status'] != 'valid') {
    header("Location: ../userlog/index.php");
    exit();
}

include 'connection.php';

// Fetch the most recent reservation for the logged-in user
$sql = "SELECT username, date, time, sports, court_number, duration, total FROM reservation_payments WHERE username = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $logged_on_user);
$stmt->execute();
$stmt->bind_result($username, $date, $time,$sports, $court_number, $duration, $total);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* General styles */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom, green, white) no-repeat fixed;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
        p {
            font-size: 10px;
        }

        .container {
    max-width: 800px;
    width: 100%;
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .header p {
            margin: 5px 0 0;
            color: #666;
        }

        /* Invoice details */
        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details h2 {
            margin-top: 0;
            color: #333;
        }

        /* Table */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        /* Total */
        .total {
            text-align: right;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .customer{
            font-size: 16px;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .header h1, .header p, .invoice-details h2, .total p {
                font-size: 16px;
            }

            th, td {
                font-size: 14px;
                padding: 6px;
            }

            .container {
                padding: 10px;
                margin-top: 150px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Athlete Event Place</h1>
        <p>Invoice #<?php echo rand(100000, 999999); ?> | Date: <?php echo date('F j, Y'); ?></p>
    </div>

    <div class="invoice-details">
        <h2>Invoice Details</h2>
        <p>*Please arrive 30 or 15 mins before your designated time of reservation..</p>
        <p>*Kindly screenshot this invoice and show it at the front desk..</p>
        <p class = "customer"><strong>Customer:</strong> <?php echo htmlspecialchars($username); ?></p>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Sports Description</th>
                    <th>Date</th>
                    <th>Court/Facility Number</th>
                      <th>Time</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($sports); ?></td>
                    <td><?php echo htmlspecialchars($date); ?></td>
                    <td><?php echo htmlspecialchars($court_number); ?></td>
                     <td><?php echo htmlspecialchars($time); ?></td>
                    <td><?php echo htmlspecialchars($duration); ?></td>
                    <td><?php echo '₱' . htmlspecialchars($total); ?></td>
                    <td><?php echo '₱' . htmlspecialchars($total); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="total">
        <p><strong>Total:</strong> ₱<?php echo htmlspecialchars($total); ?></p>
    </div>

    <div class="footer">
        <p>Thank you for your business!</p>
        <p>CW, Sitio Ibaba, Brgy. Maguyam 4118 Silang, Cavite Philippines</p>
        <button type="button" class="back-button" onclick="window.location.href='../landpage/dashboard.php'">Back</button>
    </div>
</div>

</body>
</html>
