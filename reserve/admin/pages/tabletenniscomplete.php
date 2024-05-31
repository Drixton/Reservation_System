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
            font-weight: normal; /* Reset font weight */
        }

        th:not(:last-child),
        /* Exclude last child from applying background color */
        th:first-child~th {
            /* Apply styles from the second th onwards */
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
            th,
            td {
                padding: 5px;
            }
        }

        .dropdown-container {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 999; /* Ensure dropdown is on top */
        }
    </style>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                      <!--  <option value="/reservation_system/reserve/admin/pages/cornholecomplete.php">CORNHOLE</option>-->
                        <option value="/reservation_system/reserve/admin/pages/chesscomplete.php">CHESS</option>
                        <option value="/reservation_system/reserve/admin/pages/datcomplete.phpT">DART</option>
                        <option value="/reservation_system/reserve/admin/pages/pickleballcomplete.php">PICKLE BALL</option>
                        <option value="/reservation_system/reserve/admin/pages/sepaktakrawcomplete.php">SEPAK TAKRAW</option>
                        <option value="/reservation_system/reserve/admin/pages/tabletenniscomplete.php">TABLE TENNIS</option>
                        <option value="/reservation_system/reserve/admin/pages/taekwondocomplete.php">TAEKWONDO</option>
                    </select>
                </div>
            </div>
            <h1>Table Tennis Reservation</h1>
            <table id="sportTable">
                <thead>
                    <tr>
                        <th>No</th>
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
                        <th>Created At</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "reservation";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM Tabletennispage";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['sports'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['court_number'] . "</td>";
                            echo "<td>" . $row['duration'] . "</td>";
                            echo "<td>" . $row['promo_code'] . "</td>";
                            echo "<td>" . $row['reference_no'] . "</td>";
                            echo "<td>" . $row['gcash_qrcode'] . "</td>";
                            echo "<td>" . $row['total'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td><span class='details'>View Details</span></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo '<tr><td colspan="13">No data available</td></tr>';
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function navigateToUrl() {
            var selectedUrl = document.getElementById("sports").value;
            if (selectedUrl !== "#") {
                window.location.href = selectedUrl;
            }
        }
    </script>
</body>

</html>

                           
