<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Units Report List</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
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
            
        <h1>Records</h1>

<div class="buttons-container">
    <button class="button">Archive</button>
    <button class="button">Delete</button>
</div>

<table id="sportTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Court</th>
            <th>Table</th>
            <th>Time in</th>
            <th>Time out</th>
            <th>Amount</th>
            <th>Details</th> <!-- Empty column for the "View Details" button -->
        </tr>
    </thead>
    <tbody>
        <!-- Sample data will be inserted here dynamically -->
    </tbody>
</table>

<script>
    const sportListData = {
        'ARNIS': [
            { no: 1, name: 'John Doe', court: '', table: 'A1', time_in: '10:00 AM', time_out: '12:00 PM', amount: '$10' },
            { no: 2, name: 'Jane Smith', court: '', table: 'B2', time_in: '11:00 AM', time_out: '01:00 PM', amount: '$12' }
        ],
    };

    function showSportList() {
        const sport = 'ARNIS'; // If no dropdown, just hardcode the sport
        const tableBody = document.querySelector('#sportTable tbody');
        tableBody.innerHTML = '';

        if (sportListData[sport]) {
            sportListData[sport].forEach(entry => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${entry.no}</td>
                    <td>${entry.name}</td>
                    <td>${entry.court}</td>
                    <td>${entry.table}</td>
                    <td>${entry.time_in}</td>
                    <td>${entry.time_out}</td>
                    <td>${entry.amount}</td>
                    <td colspan="2"><span class="details">View Details</span></td> <!-- Expanded cell -->
                `;
                tableBody.appendChild(row);
            });
        } else {
            tableBody.innerHTML = '<tr><td colspan="8">No data available for this sport</td></tr>';
        }
    }

    // Initialize the table
    document.addEventListener('DOMContentLoaded', () => {
        showSportList();
        
        // Add click event to "View Details"
        const detailsCells = document.querySelectorAll('.details');
        detailsCells.forEach(cell => {
            cell.addEventListener('click', () => {
                alert('View details clicked!');
            });
        });
    });
</script>



   
</body>

</html>
