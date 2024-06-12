<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Approval</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            position: relative;
            font-weight: normal;
        }

        th:not(:last-child),
        th:first-child~th {
            background-color: #2e8b57;
            color: white;
            font-weight: bold;
        }

        .buttons-container {
            position: absolute;
            top: 20px;
            right: 20px;
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
            display: block;
            width: 100%;
            text-align: left;
        }

        .details-container {
            padding: 10px;
        }

        @media only screen and (max-width: 600px) {
            th,
            td {
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
            <h1>Reservation Approval</h1>

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

            // Handle delete submission
            if (isset($_POST['delete_submit'])) {
                $delete_id = $_POST['delete_id'];
                // Prepare a delete statement
                $deleteQuery = "DELETE FROM reservation_payments WHERE id = ?";
                $stmt = $conn->prepare($deleteQuery);
                $stmt->bind_param("i", $delete_id); // "i" indicates the type of parameter: integer
                if ($stmt->execute()) {
                    echo "<script>alert('Record with ID $delete_id deleted successfully.');</script>";
                } else {
                    echo "<script>alert('Error deleting record with ID $delete_id: " . $stmt->error . "');</script>";
                }
                $stmt->close(); // Close the prepared statement
            }

            // Handle form submission for approval
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];

                // Retrieve the sports value for the given ID
                $sportsQuery = "SELECT sports FROM reservation_payments WHERE id = $id";
                $result = $conn->query($sportsQuery);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $sports = $row['sports'];

                    // Move record to appropriate table based on sports value
                    switch ($sports) {
                        case 'Badminton':
                            $moveQuery = "INSERT INTO badmintonpage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Arnis':
                            $moveQuery = "INSERT INTO arnispage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Billiard':
                            $moveQuery = "INSERT INTO billiardpage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Taekwondo':
                            $moveQuery = "INSERT INTO taekwondopage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Pickle ball':
                            $moveQuery = "INSERT INTO picklepage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Chess':
                            $moveQuery = "INSERT INTO chesspage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Dart':
                            $moveQuery = "INSERT INTO dartpage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Sepak Takraw':
                            $moveQuery = "INSERT INTO sepaktakrawpage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                        case 'Table Tennis':
                            $moveQuery = "INSERT INTO tabletennispage SELECT * FROM reservation_payments WHERE id = $id";
                            break;
                            case 'Cornhole':
                                $moveQuery = "INSERT INTO cornholepage SELECT * FROM reservation_payments WHERE id = $id";
                                break;
                        default:
                            // Handle other sports types if needed
                            break;
                    }

                    if ($conn->query($moveQuery) === TRUE) {
                        echo "<script>alert('Record with ID $id moved successfully.');</script>";
                    } else {
                        echo "<script>alert('Error moving record with ID $id: " . $conn->error . "');</script>";
                    }

                    // Delete record from reservation_payments table
                    $deleteQuery = "DELETE FROM reservation_payments WHERE id = $id";
                    if ($conn->query($deleteQuery) === TRUE) {
                        echo "Record with ID $id deleted successfully.<br>";
                    } else {
                        echo "Error deleting record with ID $id: " . $conn->error . "<br>";
                    }
                } else {
                    echo "No sports data found for ID: $id";
                }
            }

            // SQL query to retrieve data from the reservation_payments table
            $sql = "SELECT * FROM reservation_payments";
            $result = $conn->query($sql);

            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Output data of each row in an HTML table
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Username</th><th>Sports</th><th>Date</th><th>Time</th><th>Field No:</th><th>Duration</th><th>Promo Code</th><th>Reference No</th><th>GCash QR Code</th><th>Total</th><th>Created At</th><th>Operation</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["sports"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo "<td>" . $row["court_number"] . "</td>";
                    echo "<td>" . $row["duration"] . "</td>";
                    echo "<td>" . $row["promo_code"] . "</td>";
                    echo "<td>" . $row["reference_no"] . "</td>";
                    echo "<td>" . $row["gcash_qrcode"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    // Adding approve button
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' name='submit' class='button'>Approve</button>";
                    echo "</form>";
                    // Adding delete button
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' name='delete_submit' class='button' style='background-color: red;'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </main>
</body>

</html>
