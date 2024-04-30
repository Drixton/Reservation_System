<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        #header {
            text-align: left;
            margin-bottom: 20px;
            margin-left: 20px; /* Adjusted margin to align with "Wed" column */
        }
        table {
            width: 50%;
            float: left;
            margin-right: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            border: 1px solid black;
            cursor: pointer;
        }
        th {
            background-color: #f2f2f2;
        }
        #navigation {
            margin-top: 20px;
            clear: both;
        }
        #time-list-container {
            width: 40%;
            float: left;
        }
        .time-column {
            width: 50%;
            float: left;
            margin-bottom: 20px;
        }
        .time-box {
            width: calc(50% - 10px);
            height: 30px;
            border: 1px solid #ccc;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: green;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1 id="calendar-title">April 2024</h1>
        <div id="navigation">
            <button id="prev-month">Previous Month</button>
            <button id="next-month">Next Month</button>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body"></tbody>
    </table>

    <div id="time-list-container">
        <div class="time-column">
            <h2>Available time</h2>
            <div id="time-container1" class="time-container"></div>
        </div>
        <div class="time-column">
            <h2>Available time</h2>
            <div id="time-container2" class="time-container"></div>
        </div>
    </div>

    <script>
        let currentYear, currentMonth;
        let lastClickedDate = null;

        function generateCalendar(year, month) {
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDayIndex = new Date(year, month, 1).getDay();
            const tbody = document.getElementById('calendar-body');
            tbody.innerHTML = '';

            let date = 1;

            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');

                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDayIndex) {
                        const cell = document.createElement('td');
                        row.appendChild(cell);
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const cell = document.createElement('td');
                        cell.textContent = date;
                        cell.dataset.date = `${year}-${month + 1}-${date}`;
                        cell.addEventListener('click', showTimes);
                        row.appendChild(cell);
                        date++;
                    }
                }

                tbody.appendChild(row);
            }

            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            document.getElementById('calendar-title').textContent = `${monthNames[month]} ${year}`;
        }

        function showTimes(event) {
            const selectedDate = event.target.dataset.date;
            const timeContainer1 = document.getElementById('time-container1');
            const timeContainer2 = document.getElementById('time-container2');

            if (selectedDate === lastClickedDate) {
                timeContainer1.innerHTML = '';
                timeContainer2.innerHTML = '';
                lastClickedDate = null;
                return;
            }

            const hours = [
                '7:00 AM', '8:00 AM',
                '9:00 AM', '10:00 AM',
                '11:00 AM', '12:00 PM',
                '1:00 PM', '2:00 PM',
                '3:00 PM', '4:00 PM'
            ];

            timeContainer1.innerHTML = '';
            timeContainer2.innerHTML = '';

            for (let i = 0; i < hours.length; i++) {
                const div = document.createElement('div');
                div.className = 'time-box';
                div.textContent = hours[i];
                if (i % 2 === 0) {
                    timeContainer1.appendChild(div);
                } else {
                    timeContainer2.appendChild(div);
                }
            }

            lastClickedDate = selectedDate;
        }

        function updateCalendar() {
            generateCalendar(currentYear, currentMonth);
        }

        function goToPreviousMonth() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            updateCalendar();
        }

        function goToNextMonth() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            updateCalendar();
        }

        const now = new Date();
        currentYear = now.getFullYear();
        currentMonth = now.getMonth();
        generateCalendar(currentYear, currentMonth);

        document.getElementById('prev-month').addEventListener('click', goToPreviousMonth);
        document.getElementById('next-month').addEventListener('click', goToNextMonth);
    </script>
</body>
</html>
