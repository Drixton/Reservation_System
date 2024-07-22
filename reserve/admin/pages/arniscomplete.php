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
    <title>Sport List</title>
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        .dropdown-container {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 999;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 780px; /* Adjusted max-width */
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
    margin: auto;
    padding: 20px;
    text-align: center;
}

        .modal img {
            max-width: 100%;
            height: auto;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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

    </style>
</head>
<body class="bg-content">
    <main class="dashboard d-flex">
        <?php include "component/sidebar.php"; ?>
        <div class="container-fluid px-4">
            <div class="dropdown-container">
                <div class="dropdown">
                    <select id="sports" name="sports" onchange="navigateToUrl()">
                        <option value="#">Select a sport</option>
                        <option value="/reservation_system/reserve/admin/pages/arniscomplete.php">ARNIS</option>
                        <option value="/reservation_system/reserve/admin/pages/badmintoncomplete.php">BADMINTON</option>
                        <option value="/reservation_system/reserve/admin/pages/billiardcomplete.php">BILLIARD</option>
                        <option value="/reservation_system/reserve/admin/pages/chesscomplete.php">CHESS</option>
                        <option value="/reservation_system/reserve/admin/pages/dartcomplete.php">DART</option>
                        <option value="/reservation_system/reserve/admin/pages/pickleballcomplete.php">PICKLE BALL</option>
                        <option value="/reservation_system/reserve/admin/pages/sepaktakrawcomplete.php">SEPAK TAKRAW</option>
                        <option value="/reservation_system/reserve/admin/pages/tabletenniscomplete.php">TABLE TENNIS</option>
                        <option value="/reservation_system/reserve/admin/pages/taekwondocomplete.php">TAEKWONDO</option>
                        <option value="/reservation_system/reserve/admin/pages/cornholecomplete.php">CORNHOLE</option>
                        <option value="/reservation_system/reserve/admin/pages/basketballcomplete.php">BASKETBALL</option>
                        <option value="/reservation_system/reserve/admin/pages/judocomplete.php">JUDO</option>
                        <option value="/reservation_system/reserve/admin/pages/wholevenuecomplete.php">WHOLE VENUE</option>
                    </select>
                </div>
            </div>
          
            <h1>Arnis Reservation</h1>
            <table id="sportTable">
                <thead>
                    <tr>
               
                        <th>Username</th>
                        <th>Sports</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Court Number</th>
                        <th>Duration</th>
                        <th>Promo Code</th>
                        <th>Reference No</th>
                        <th>Gcash QR Code</th>
                        <th>Total</th>
                        <th>Reservation_timestamp</th>
                        <th>Operation</th>
                  
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connect to the database
                    include '../conixion.php';


                    // Check if the delete form is submitted
                    if (isset($_POST['delete_submit'])) {
                        // Prepare SQL to delete row based on id
                        $delete_id = $_POST['delete_id'];
                        $sql_select = "SELECT * FROM arnispage WHERE id = $delete_id";
                        $result_select = $conn->query($sql_select);

                        if ($result_select->num_rows > 0) {
                            $row = $result_select->fetch_assoc();
                            $gcash_qrcode = $row['gcash_qrcode'];

                            // Delete row from database
                            $delete_sql = "DELETE FROM arnispage WHERE id = $delete_id";
                            if ($conn->query($delete_sql) === TRUE) {
                                echo "<script>alert('Record deleted successfully');</script>";

                                // Delete QR code image from directory
                                $imagePath = "qrcode/" . $gcash_qrcode;
                                if (file_exists($imagePath)) {
                                    unlink($imagePath); // Delete the file
                                }
                                
                                // Optionally, you can redirect to avoid resubmission on refresh
                                // header("Location: ".$_SERVER['PHP_SELF']);
                                // exit();
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        } else {
                            echo "Record not found.";
                        }
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM arnispage";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                  
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['sports'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['court_number'] . "</td>";
                            echo "<td>" . $row['duration'] . "</td>";
                            echo "<td>" . $row['promo_code'] . "</td>";
                            echo "<td>" . $row['reference_no'] . "</td>";
                            echo "<td>"; // Open TD for QR Code Image
                            
                            // Check if image file exists
                            $imagePath = "qrcode/" . $row['gcash_qrcode'];
if (file_exists($imagePath)) {
// Display QR code image with a click event
echo "<img src='$imagePath' alt='GCash QR Code' style='max-width: 100px; cursor: pointer;' onclick='showQRCode(\"$imagePath\")'>";
} else {    
echo "Image not found";
}
echo "</td>"; // Close TD for QR Code Image
                        
echo "<td>" . $row['total'] . "</td>";
echo "<td>" . $row['created_at'] . "</td>";
echo "<td>"; // Open TD for Operation buttons
echo "<form method='post' onsubmit='return confirmDelete()'>";
echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
echo "<button type='submit' name='delete_submit' class='button' style='background-color: red;'>Delete</button>";
echo "</form>";

echo "</td>"; // Close TD for Operation buttons

echo "</tr>";
}
} else {
echo '<tr><td colspan="14">No data available</td></tr>';
}

// Close the database connection
$conn->close();
?>
</tbody>
</table>
</div>
</main>

<!-- Modal for displaying QR code -->
<div id="myModal" class="modal">
<div class="modal-content">
<span class="close" onclick="closeModal()">&times;</span>
<img id="modalImage" src="" alt="GCash QR Code">
</div>
</div>

<script>
function navigateToUrl() {
var selectedUrl = document.getElementById("sports").value;
if (selectedUrl !== "#") {
window.location.href = selectedUrl;
}
}



function showQRCode(imagePath) {
var modal = document.getElementById("myModal");
var modalImg = document.getElementById("modalImage");

// Display the modal with the QR code image
modal.style.display = "flex"; // or "block" for a block-level element
modalImg.src = imagePath;
}

function closeModal() {
var modal = document.getElementById("myModal");
modal.style.display = "none";
}
function confirmDelete() {
    return confirm("Are you sure you want to delete it?");
}
</script>
</body>
</html>

