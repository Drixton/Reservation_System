<?php session_start();

if ($_SESSION['status'] != 'valid') {
    header("Location: http://localhost/reservation_system/reserve/admin/index.php");
    exit();
}?>
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

        .float-screen {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    z-index: 1000;
    padding: 30px;
    width: 90%; /* Adjust the width of the floating screen */
    max-width: 900px; /* Limit maximum width */
    height: 60%; /* Adjust the height of the floating screen */
    max-height: 90%;
    overflow: auto;
    text-align: center;
}

.float-screen img {
    width: 100%; /* Occupy full width of the container */
    height: auto; /* Maintain aspect ratio */
    border: 1px solid #ddd; /* Add border for clarity */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add shadow to the image */
}
.button {
        cursor: pointer;
        color: white;
        border: 2px solid transparent;
        border-radius: 5px;
        padding: 4px 16px;
        margin-left: 10px;
        transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        font-size: 14px;
        text-transform: uppercase;
        display: inline-block;
        width: 100px; /* Set the width to ensure both buttons are the same size */
        text-align: center; /* Center text within the button */
    }

    .button-approve {
        background-color: #007bff; /* Blue color for approve button */
    }

    .button-approve:hover {
        background-color: #0056b3; /* Darker blue color on hover */
    }

    .button-delete {
        background-color: #dc3545; /* Red color for delete button */
    }

    .button-delete:hover {
        background-color: #c82333; /* Darker red color on hover */
    }
    button.button-delete
    {
        background-color: #dc3545; /* Red color for delete button */
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
    <script>
        $(document).ready(function () {
            $('.gcash-qrcode-link').click(function (e) {
                e.preventDefault();
                var imageSrc = $(this).children('img').attr('src');
                $('#qrCodeFloatScreen').html('<img src="' + imageSrc + '">');
                $('#qrCodeFloatScreen').fadeIn();
            });

            $('#qrCodeFloatScreen').click(function () {
                $(this).fadeOut();
            });
        });
    </script>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <?php include "component/sidebar.php"; ?>
        <div class="container-fluid px-4">
            <h1>Reservation Approval</h1>

            <?php
         include '../conixion.php';


            // Handle delete submission
            if (isset($_POST['delete_submit'])) {
                $delete_id = $_POST['delete_id'];

                // Retrieve the QR code filename for the given ID
                $qr_code_query = "SELECT gcash_qrcode FROM reservation_payments WHERE id = ?";
                $stmt_qr = $conn->prepare($qr_code_query);
                $stmt_qr->bind_param("i", $delete_id);
                $stmt_qr->execute();
                $stmt_qr->bind_result($gcash_qr_code);
                $stmt_qr->fetch();
                $stmt_qr->close();

                // Prepare a delete statement for reservation_payments table
                $delete_query = "DELETE FROM reservation_payments WHERE id = ?";
                $stmt_delete = $conn->prepare($delete_query);
                $stmt_delete->bind_param("i", $delete_id);
                if ($stmt_delete->execute()) {
                    echo "<script>alert('Record deleted successfully.');</script>";

                    // Delete QR code image file if it exists
                    if (!empty($gcash_qr_code)) {
                        $image_path = "qrcode/" . $gcash_qr_code;
                        if (file_exists($image_path)) {
                            unlink($image_path); // Delete the file
                        }
                    }
                } else {
                    echo "<script>alert('Error deleting record with ID $delete_id: " . $stmt_delete->error . "');</script>";
                }
                $stmt_delete->close(); // Close the prepared statement
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
                            case 'Basketball (Half Court)':
                                $moveQuery = "INSERT INTO basketballpage SELECT * FROM reservation_payments WHERE id = $id";
                                break;
                                case 'Judo':
                                    $moveQuery = "INSERT INTO judopage SELECT * FROM reservation_payments WHERE id = $id";
                                    break;
                            case 'Events':
                                $moveQuery = "INSERT INTO wholevenuepage SELECT * FROM reservation_payments WHERE id = $id";
                                break;
                        default:
                            // Handle other sports types if needed
                            break;
                    }

                    if ($conn->query($moveQuery) === TRUE) {
                        echo "<script>alert('Record Approved successfully.');</script>";
                    } else {
                        echo "<script>alert('Error moving record with ID $id: " . $conn->error . "');</script>";
                    }

                    // Delete record from reservation_payments table
                    $deleteQuery = "DELETE FROM reservation_payments WHERE id = $id";
                    if ($conn->query($deleteQuery) === TRUE) {
                        echo "Record with ID $id deleted successfully.<br>";
                    } else {
                        echo "Error                    deleting record with ID $id: " . $conn->error . "<br>";
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
            echo "<tr><th>Username</th><th>Sports</th><th>Date</th><th>Time</th><th>Field No:</th><th>Duration</th><th>Promo Code</th><th>Reference No</th><th>GCash QR Code</th><th>Total</th><th>Created At</th><th>Operation</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["sports"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["court_number"] . "</td>";
                echo "<td>" . $row["duration"] . "</td>";
                echo "<td>" . $row["promo_code"] . "</td>";
                echo "<td>" . $row["reference_no"] . "</td>";
                echo "<td>";

                // Check if there is a GCash QR Code filename
                $gcash_qr_code = $row["gcash_qrcode"];
                if (!empty($gcash_qr_code)) {
                    // Assuming the QR Code images are stored in "qrcode/" directory
                    $image_path = "qrcode/" . $gcash_qr_code;
                    // Make the image clickable with a class for styling
                    echo "<a href='#' class='gcash-qrcode-link'><img src='$image_path' alt='GCash QR Code' style='max-width: 100px; max-height: 100px;'></a>";
                } else {
                    echo "No QR Code available";
                }

                echo "</td>";
                echo "<td>" . $row["total"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";

                // Adding approve and delete buttons
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<button type='submit' name='submit' class='button button-approve'>Approve</button>";
                echo "</form>";
                echo "<form method='post' onsubmit='return confirmDelete(\"" . $row["id"] . "\")'>";
                echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' name='delete_submit' class='button button-delete'>Delete</button>";
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

<!-- Floating screen for displaying QR Code -->
<div id="qrCodeFloatScreen" class="float-screen"></div>

</body>
<script>
function confirmDelete(deleteId) {
    if (confirm("Are you sure you want to delete this record?")) {
        // If user confirms, submit the form for deletion
        return true;
    } else {
        // If user cancels, do not submit the form
        return false;
    }
}
</script>

</html>

