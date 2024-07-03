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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #2e8b57;
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .dropdown {
            margin-bottom: 20px;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @media only screen and (max-width: 600px) {
            th, td {
                padding: 8px;
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
            
        <table id="sportTable">
    <thead>
        <tr>
            <th colspan="5">
                <div class="dropdown">
                    <select id="sports" name="sports" onchange="showSportList()">
                        <option value="ARNIS">ARNIS</option>
                        <option value="BADMINTON">BADMINTON</option>
                        <option value="BILLIARD">BILLIARD</option>
                        <option value="CORNHOLE">CORNHOLE</option>
                        <option value="CHESS">CHESS</option>
                        <option value="DART">DART</option>
                        <option value="PICKLE BALL">PICKLE BALL</option>
                        <option value="SEPAK TAKRAW">SEPAK TAKRAW</option>
                        <option value="TABLE TENNIS">TABLE TENNIS</option>
                        <option value="TAEKWONDO">TAEKWONDO</option>
                    </select>
                </div>
            </th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Table</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Paid/Unpaid</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample data will be inserted here dynamically -->
    </tbody>
</table>

<script>
    const sportListData = {
        'ARNIS': [
            { name: 'John Doe', table: 'A1', time_in: '10:00 AM', time_out: '12:00 PM', paid: 'Paid' },
            { name: 'Jane Smith', table: 'B2', time_in: '11:00 AM', time_out: '01:00 PM', paid: 'Unpaid' }
        ],
        'BADMINTON': [
            { name: 'Alice Johnson', table: 'C3', time_in: '09:00 AM', time_out: '11:00 AM', paid: 'Paid' },
            { name: 'Bob Brown', table: 'D4', time_in: '10:30 AM', time_out: '12:30 PM', paid: 'Unpaid' }
        ],
        // Add more sport data as needed
    };

    function showSportList() {
        const sport = document.getElementById('sports').value;
        const tableBody = document.querySelector('#sportTable tbody');
        tableBody.innerHTML = '';

        if (sportListData[sport]) {
            sportListData[sport].forEach(entry => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${entry.name}</td>
                    <td>${entry.table}</td>
                    <td>${entry.time_in}</td>
                    <td>${entry.time_out}</td>
                    <td>${entry.paid}</td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            tableBody.innerHTML = '<tr><td colspan="5">No data available for this sport</td></tr>';
        }
    }

    // Initialize the table with the first sport in the list
    document.addEventListener('DOMContentLoaded', () => {
        showSportList();
    });
</script>
   
</body>

</html>
