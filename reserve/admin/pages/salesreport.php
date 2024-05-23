<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin list</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .toggle-password {
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
        }

        .password {
            display: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            padding: 0.2rem 0.5rem;
            background-color: #fff;
            border: 1px solid #ccc;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .sales-report {
            margin-top: 20px;
        }

        .sales-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .sales-table th,
        .sales-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .sales-table th {
            background-color: #2e8b57;
            color: white;
        }

        .toggle-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .toggle-buttons button {
            margin-left: 10px;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            background-color: #f1f1f1;
            color: #333;
        }

        .toggle-buttons button.active {
            background-color: #4CAF50;
            color: white;
        }

        .chart-header{
            margin-top:40px;
            
        }

        #chartContainer {
            border: 2px solid #4CAF50; /* Green border */
            padding: 10px; /* Add padding */
        }

        #editButton {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <?php 
            include "component/sidebar.php";
        ?>
        <div class="container-fluid px-4">
     
        <div class="container">
        <div class="toggle-buttons">
            <button id="dailyButton" onclick="showDailySales()">Daily</button>
            <button id="weeklyButton" onclick="showWeeklySales()">Weekly</button>
            <button id="monthlyButton" onclick="showMonthlySales()">Monthly</button>
        </div>

        <div class="report-header">
            <h2>Sales Report</h2>
        </div>

        <div class="sales-report">
            <table class="sales-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Badminton</th>
                        <th>Billiards</th>
                        <th>Table Tennis</th>
                        <th>Pickle Ball</th>
                        <th>Sepak Takraw</th>
                        <th>Taekwondo</th>
                        <th>Chess</th>
                        <th>Arnis</th>
                        <th>Darts</th>
                    </tr>
                </thead>
                <tbody id="salesReport">
                    <!-- Sales data will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
        <button id="editButton" onclick="enableEditing()">Edit</button>

        <div class="chart-header">
            <h2>Sales Chart</h2>
        </div>
        <div id="chartContainer">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <script>
        const dailySalesData = {
            'May 1, 2024': { 'Badminton': 150, 'Billiards': 120, 'Table Tennis': 100, 'Pickle Ball': 80, 'Sepak Takraw': 90, 'Taekwondo': 110, 'Chess': 70, 'Arnis': 10, 'Darts': 0 },
            'May 2, 2024': { 'Badminton': 110, 'Billiards': 200, 'Table Tennis': 110, 'Pickle Ball': 30, 'Sepak Takraw': 50, 'Taekwondo': 130, 'Chess': 80, 'Arnis': 0, 'Darts': 10 },
            'May 3, 2024': { 'Badminton': 230, 'Billiards': 160, 'Table Tennis': 90, 'Pickle Ball': 50, 'Sepak Takraw': 90, 'Taekwondo': 160, 'Chess': 50, 'Arnis': 10, 'Darts': 20 },
            'May 4, 2024': { 'Badminton': 140, 'Billiards': 140, 'Table Tennis': 30, 'Pickle Ball': 70, 'Sepak Takraw': 100, 'Taekwondo': 30, 'Chess': 100, 'Arnis': 20, 'Darts': 0 },
            'May 5, 2024': { 'Badminton': 100, 'Billiards': 60, 'Table Tennis': 110, 'Pickle Ball': 90, 'Sepak Takraw': 10, 'Taekwondo': 40, 'Chess': 60, 'Arnis': 0, 'Darts': 0 },
            'May 6, 2024': { 'Badminton': 200, 'Billiards': 100, 'Table Tennis': 50, 'Pickle Ball': 80, 'Sepak Takraw': 20, 'Taekwondo': 20, 'Chess': 20, 'Arnis': 0, 'Darts': 0 },
            'May 7, 2024': { 'Badminton': 180, 'Billiards': 80, 'Table Tennis': 150, 'Pickle Ball': 110, 'Sepak Takraw': 10, 'Taekwondo': 60, 'Chess': 180, 'Arnis': 0, 'Darts': 0 },
            // Add more data for May
        };

        const weeklySalesData = {
            'Week 1': { 'Badminton': 150, 'Billiards': 120, 'Table Tennis': 100, 'Pickle Ball': 80, 'Sepak Takraw': 90, 'Taekwondo': 110, 'Chess': 70, 'Arnis': 60, 'Darts': 50 },
            'Week 2': { 'Badminton': 140, 'Billiards': 130, 'Table Tennis': 110, 'Pickle Ball': 90, 'Sepak Takraw': 100, 'Taekwondo': 120, 'Chess': 80, 'Arnis': 70, 'Darts': 60 },
            // Add more data for the week
        };

        const monthlySalesData = {
            'May 2024': { 'Badminton': 400, 'Billiards':            350, 'Table Tennis': 300, 'Pickle Ball': 250, 'Sepak Takraw': 270, 'Taekwondo': 330, 'Chess': 200, 'Arnis': 180, 'Darts': 150 },
            'June 2024': { 'Badminton': 380, 'Billiards': 340, 'Table Tennis': 290, 'Pickle Ball': 220, 'Sepak Takraw': 280, 'Taekwondo': 310, 'Chess': 180, 'Arnis': 160, 'Darts': 140 },
            'July 2024': { 'Badminton': 420, 'Billiards': 370, 'Table Tennis': 320, 'Pickle Ball': 240, 'Sepak Takraw': 250, 'Taekwondo': 350, 'Chess': 210, 'Arnis': 190, 'Darts': 160 },
            // Add more data for other months
        };

        let currentSalesData = dailySalesData; // Set default data to daily

        function showDailySales() {
            currentSalesData = dailySalesData;
            displaySalesData();
            highlightButton('dailyButton');
            updateChart();
        }

        function showWeeklySales() {
            currentSalesData = weeklySalesData;
            displaySalesData();
            highlightButton('weeklyButton');
            updateChart();
        }

        function showMonthlySales() {
            currentSalesData = monthlySalesData;
            displaySalesData();
            highlightButton('monthlyButton');
            updateChart();
        }

        function displaySalesData() {
            const salesReport = document.getElementById('salesReport');
            salesReport.innerHTML = '';

            for (const [key, sales] of Object.entries(currentSalesData)) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${key}</td>
                    <td>${formatCurrency(sales['Badminton'])}</td>
                    <td>${formatCurrency(sales['Billiards'])}</td>
                    <td>${formatCurrency(sales['Table Tennis'])}</td>
                    <td>${formatCurrency(sales['Pickle Ball'])}</td>
                    <td>${formatCurrency(sales['Sepak Takraw'])}</td>
                    <td>${formatCurrency(sales['Taekwondo'])}</td>
                    <td>${formatCurrency(sales['Chess'])}</td>
                    <td>${formatCurrency(sales['Arnis'])}</td>
                    <td>${formatCurrency(sales['Darts'])}</td>
                `;
                salesReport.appendChild(row);
            }
        }

        function formatCurrency(amount) {
            // Add peso sign to the amount
            return '₱' + amount;
        }

        document.addEventListener('DOMContentLoaded', () => {
            showDailySales(); // Display daily sales by default
            updateChart(); // Initialize chart
        });

        function highlightButton(buttonId) {
            const buttons = document.querySelectorAll('.toggle-buttons button');
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            document.getElementById(buttonId).classList.add('active');
        }

        // Function to enable editing
        function enableEditing() {
            const cells = document.querySelectorAll('.sales-table td');
            cells.forEach(cell => {
                const input = document.createElement('input');
                input.type = 'text';
                input.value = cell.innerText;
                cell.innerText = '';
                cell.appendChild(input);
            });

            const editButton = document.getElementById('editButton');
            editButton.removeEventListener('click', enableEditing); // Remove event listener to prevent multiple clicks
            editButton.innerText = 'Save';
            editButton.addEventListener('click', saveData); // Add event listener for save function
        }

        // Function to save edited data
        function saveData() {
            const cells = document.querySelectorAll('.sales-table td');
            cells.forEach(cell => {
                const inputValue = cell.querySelector('input').value;
                cell.innerText = inputValue;
            });

            const editButton = document.getElementById('editButton');
            editButton.removeEventListener('click', saveData); // Remove event listener to prevent multiple clicks
            editButton.innerText = 'Edit';
            editButton.addEventListener('click', enableEditing); // Add event listener for edit function
        }

        // Function to reset the edit button
        function resetEditButton() {
            const editButton = document.getElementById('editButton');
            editButton.innerText = 'Edit';
            editButton.removeEventListener('click', saveData);
            editButton.addEventListener('click', enableEditing);
        }

        // Reset edit button when switching between different sales reports
        document.querySelectorAll('.toggle-buttons button').forEach(button => {
            button.addEventListener('click', resetEditButton);
        });

        // Chart.js setup
        let salesChart;

        const colors = ['#4CAF50', '#2196F3', '#FF9800', '#9C27B0', '#607D8B', '#F44336', '#795548', '#FF5722', '#CDDC39'];

        function updateChart() {
            const labels = Object.keys(currentSalesData);
            const sports = ['Badminton', 'Billiards', 'Table Tennis', 'Pickle Ball', 'Sepak Takraw', 'Taekwondo', 'Chess', 'Arnis', 'Darts'];

            const datasets = sports.map((sport, index) => {
                return {
                    label: sport,
                    data: labels.map(date => currentSalesData[date][sport]),
                    backgroundColor: colors[index], // Use fixed color for bars
                    borderColor: colors[index], // Use fixed color for border
                    borderWidth: 1 // Set border width for bars
                };
            });

            const ctx = document.getElementById('salesChart').getContext('2d');

            if (salesChart) {
                salesChart.destroy(); // Destroy previous chart if exists
            }

            salesChart = new Chart(ctx, {
                type: 'bar', // Change chart type to bar
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date',
                                fontSize: 16 // Adjust font size for x-axis labels
                            },
                            ticks: {
                                fontSize: 14 // Adjust font size for x-axis ticks
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Sales',
                                fontSize: 16 // Adjust font size for y-axis labels
                            },
                            ticks: {
                                fontSize: 14, // Adjust font size for y-axis ticks
                                callback: function(value, index, values) {
                                    return '₱' + value; // Add peso sign to y-axis ticks
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>
