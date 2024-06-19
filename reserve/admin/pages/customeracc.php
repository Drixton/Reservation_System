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
        .deleteButton {
    background-color: #dc3545; /* Red color */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 8px 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.deleteButton:hover {
    background-color: #c82333; /* Darker red on hover */
}


    </style>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <?php include "component/sidebar.php"; ?>
        <div class="container-fluid px-4">
            <h1>Customer Accounts</h1>
            <table id="sportTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th>Operation</th> <!-- New column for delete button -->
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
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td><button class='deleteButton' data-id='" . $row['id'] . "'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo '<tr><td colspan="5">No data available</td></tr>';
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            // Attach click event handler to all delete buttons
            $('.deleteButton').on('click', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this row?')) {
                    // Perform AJAX delete request or form submission here
                    // For simplicity, just remove the row from DOM
                    $(this).closest('tr').remove();
                }
            });
        });
    </script>
</body>

</html>
