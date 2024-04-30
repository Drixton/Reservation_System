<?php
ob_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "qrcode";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function deleteRecord($table, $id) {
    global $pdo;
    try {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Output JavaScript to reload the page
        echo "<script>window.location.href = window.location.href;</script>";
        exit();
    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

function deleteAllRecords($table) {
    global $pdo;
    try {
        $sql = "TRUNCATE TABLE $table";
        return $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Error deleting all records: " . $e->getMessage();
    }
}

if (isset($_POST['delete302'])) {
    $id = $_POST['delete302'];
    deleteRecord("reportsrestore", $id);
}

if (isset($_POST['deleteAllRecords'])) {
    deleteAllRecords("reportsrestore");
    deleteAllRecords("303restore");
}

$sql302 = "SELECT id, Last_Name, First_Name, section, year, studentNo, unit_number, timestamp, room
           FROM reportsrestore";
$result302 = $pdo->query($sql302);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>302 Archive</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .container-fluid {
            padding: 20px;
            margin: auto;
            width: 80%;
            margin-top: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            overflow-x: auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            border-bottom: 1px solid #dee2e6;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h1, h2 {
            color: #007bff;
        }

        .operation-buttons a {
            margin-right: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-container button {
            flex: 0 0 48%;
        }

        .action-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #dc3545;
            color: white;
            border: 1px solid #dc3545;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #808080;
            border-color: #808080;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #808080;
            border-color: #808080;
        }

        .print-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .print-button:hover {
            background-color: #808080;
            border-color: #808080;
        }
    </style>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <div class="container-fluid">

            <!-- reportsrestore Table -->
            <h2>Unit Reports Archive</h2>
            <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="table-responsive">
<table class="table table-striped" id="archiveTable">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Section</th>
                <th>Year</th>
                <th>Student No</th>
                <th>Unit number</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result302->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['Last_Name']; ?></td>
                    <td><?php echo $row['First_Name']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['studentNo']; ?></td>
                    <td><?php echo $row['unit_number']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td><?php echo $row['room']; ?></td>
                    <td class="operation-buttons">
                        <form method="post" action="" onsubmit="return confirmDelete(event);">
                            <input type="hidden" name="delete302" value="<?php echo $row['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

            <!-- 303restore Table -->
            <div class="table-responsive">
                <div class="btn-container">
                    <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete all records?');">
                        <input type="submit" name="deleteAllRecords" class="action-button" value="Delete All Records">
                        <button type="button" class="print-button" onclick="downloadTableAsImage()">Print table</button>
                    </form>
                    <a href="/TRACK-WISE/admin2/pages/unitreports.php" class="back-button">Back</a>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/script.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        function confirmDelete(event) {
        if (!confirm("Are you sure you want to delete this?")) {
            event.preventDefault(); // Prevent form submission if user clicks Cancel
        }
    }
    function downloadTableAsImage() {
        // Get the table element
        var table = document.querySelector('.table-responsive');

        // Create a container div to hold the title and table
        var container = document.createElement('div');
        container.innerHTML = '<h2>302 Save Records</h2>';
        container.appendChild(table.cloneNode(true));

        // Append the container to the body
        document.body.appendChild(container);

        // Use html2canvas to capture the container as an image
        html2canvas(container).then(function (canvas) {
            // Convert the canvas to a data URL
            var dataURL = canvas.toDataURL("image/png");

            // Create a link element to trigger the download
            var downloadLink = document.createElement('a');
            downloadLink.href = dataURL;
            downloadLink.download = 'table_image.png';

            // Trigger a click on the link to start the download
            document.body.appendChild(downloadLink);
            downloadLink.click();

            // Remove the container and link
            document.body.removeChild(container);
            document.body.removeChild(downloadLink);
        });
    }
    </script>
    <script>
    $(document).ready(function () {
        $("#searchInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#archiveTable tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


</body>
</html>
