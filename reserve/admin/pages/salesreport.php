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

// Initialize an array to store the data
$sportsData = [];

// Fetch data for each sport grouped by day, week, and month
$sports = ['arnispage', 'badmintonpage', 'billiardpage', 'tabletennispage', 'chesspage', 'dartpage', 'picklepage', 'sepaktakrawpage', 'taekwondopage'];

foreach ($sports as $sport) {
    $sql = "SELECT DATE(created_at) AS date, 
                   DATE_FORMAT(created_at, '%Y-%u') AS week, 
                   DATE_FORMAT(created_at, '%Y-%m') AS month, 
                   SUM(total) AS total 
            FROM $sport 
            GROUP BY date, week, month 
            ORDER BY date";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $date = $row['date'];
        $week = $row['week'];
        $month = $row['month'];
        $total = $row['total'];
        
        if (!isset($sportsData['daily'][$date])) {
            $sportsData['daily'][$date] = array_fill_keys($sports, 0);
        }
        if (!isset($sportsData['weekly'][$week])) {
            $sportsData['weekly'][$week] = array_fill_keys($sports, 0);
        }
        if (!isset($sportsData['monthly'][$month])) {
            $sportsData['monthly'][$month] = array_fill_keys($sports, 0);
        }

        $sportsData['daily'][$date][$sport] += $total;
        $sportsData['weekly'][$week][$sport] += $total;
        $sportsData['monthly'][$month][$sport] += $total;

        // Calculate total sales for each sport by date
        if (!isset($sportsData['daily'][$date]['total_sales'])) {
            $sportsData['daily'][$date]['total_sales'] = 0;
        }
        $sportsData['daily'][$date]['total_sales'] += $total;

        if (!isset($sportsData['weekly'][$week]['total_sales'])) {
            $sportsData['weekly'][$week]['total_sales'] = 0;
        }
        $sportsData['weekly'][$week]['total_sales'] += $total;

        if (!isset($sportsData['monthly'][$month]['total_sales'])) {
            $sportsData['monthly'][$month]['total_sales'] = 0;
        }
        $sportsData['monthly'][$month]['total_sales'] += $total;
    }
}

$conn->close();
?>


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

        .top-right-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .top-right-buttons .btn {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .top-right-buttons .btn:hover {
            background-color: #0056b3;
        }

        .bottom-right-buttons {
            bottom: 20px;
            right: 20px;
            margin-left: 70%;
            margin-top:10px;
        }

        .bottom-right-buttons .btn {
            margin-left: 10px;
        }

        #tableBody td:last-child {
        font-weight: bold;
        }

        .table-container {
            position: relative;
        }
    
        .sales-navigation {
            margin-top:10px;
            margin-left: 90%;
        }

    </style>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <?php include "component/sidebar.php"; ?>
        <div class="container-fluid px-4">
            <div class="top-right-buttons">
                <button class="btn" onclick="showDaily()">Daily</button>
                <button class="btn" onclick="showWeekly()">Weekly</button>
                <button class="btn" onclick="showMonthly()">Monthly</button>
            </div>
            <h1>Sales Report</h1>
            <table id="sportTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Badminton</th>
                        <th>Billiards</th>
                        <th>Table Tennis</th>
                        <th>Pickle Ball</th>
                        <th>Sepak Takraw</th>
                        <th>Taekwondo</th>
                        <th>Darts</th>
                        <th>Arnis</th>
                        <th>Chess</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>

            <div class="sales-navigation">
                <button class="btn" onclick="showPreviousMonth()"><i class="fas fa-chevron-left"></i> </button>
                <button class="btn" onclick="showNextMonth()"><i class="fas fa-chevron-right"></i></button>
            </div>

            <div class="bar-chart-container">
                <canvas id="barChart" width="800" height="400"></canvas>
            </div>

        </div>
    </main>
    <script>
    const sportsData = <?php echo json_encode($sportsData); ?>;
    let currentDate = new Date(); // Get the current date

    function populateTable(data, timeFormat) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        for (const period in data) {
            const [year, month, day] = period.split('-');
            const currentDateYear = currentDate.getFullYear();
            const currentDateMonth = currentDate.getMonth() + 1;
            
            if (timeFormat === 'daily' && parseInt(month) !== currentDateMonth) {
                continue; // Skip if not in the current month
            }
            
            let formattedDate = new Date(year, month - 1, day).toLocaleDateString(undefined, { month: 'long', day: 'numeric', year: 'numeric' });
            if (timeFormat === 'weekly') {
                const week = period.split('-')[1];
                formattedDate = `Week ${week}, ${year}`;
            }

            if (timeFormat === 'monthly') {
                const [year, month] = period.split('-');
                formattedDate = new Date(`${year}-${month}-01`).toLocaleDateString(undefined, { year: 'numeric', month: 'long' });
            }

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${formattedDate}</td>
                <td>₱${data[period]['badmintonpage']}</td>
                <td>₱${data[period]['billiardpage']}</td>
                <td>₱${data[period]['tabletennispage']}</td>
                <td>₱${data[period]['picklepage']}</td>
                <td>₱${data[period]['sepaktakrawpage']}</td>
                <td>₱${data[period]['taekwondopage']}</td>
                <td>₱${data[period]['dartpage']}</td>
                <td>₱${data[period]['arnispage']}</td>
                <td>₱${data[period]['chesspage']}</td>
                <td>₱${data[period]['total_sales']}</td>
            `;

            tableBody.appendChild(row);
        }

        // Show or hide previous and next buttons based on timeFormat
        const salesNavigation = document.querySelector('.sales-navigation');
        if (timeFormat === 'daily') {
            salesNavigation.style.display = 'block'; // Show navigation buttons for daily report
        } else {
            salesNavigation.style.display = 'none'; // Hide navigation buttons for weekly and monthly reports
        }
    }

    function showDaily() {
        populateTable(sportsData.daily, 'daily');
    }

    function showWeekly() {
        populateTable(sportsData.weekly, 'weekly');
    }

    function showMonthly() {
        populateTable(sportsData.monthly, 'monthly');
    }

    function showPreviousMonth() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        showDaily(); // Refresh table with previous month's data
    }

    function showNextMonth() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        showDaily(); // Refresh table with next month's data
    }

    // Default view
    showDaily();

</script>


</body>

</html>