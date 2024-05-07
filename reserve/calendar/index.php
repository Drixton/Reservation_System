<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0; /* Remove default margin */
            padding-top: 40px; /* Adjusted padding-top */
            background-color: black;
        }
        #navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background: linear-gradient(to right, black, grey, green);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        
        #profile-tab img {
            width: 60px; 
        }

        #logo img {
            width: 100px; 
        }
        #logo {
            flex: 1;
            text-align: left;
        }
        #title {
            flex: 1;
            color: white;
            font-size: 20px;
            display: flex;
            align-items: center;
            padding-left: 10px;
            padding-right: 10px;
        }
        #profile-tab {
            flex: 1;
            text-align: right;
            padding-right: 40px;
        }
        #header {
            text-align: left;
            margin-top: 20px; /* Adjusted margin-top */
            margin-bottom: 20px;
            margin-left: 20px; /* Adjusted margin to align with "Wed" column */
            display: flex;
            align-items: center;
            color: white;
        }
        table {
            width: 33%;
            float: left;
            margin-right: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            cursor: pointer;
            color: white;
        }
        #navigation {
            clear: both;
            display: flex;
            align-items: center;
            margin-left: 40px;
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
        #time-list-container .time-column .time-container1 {
            padding-left: 0px; /* Adjust this value to move the containers to the right */
        }
    
        .time-box {
            width: calc(50% - 10px);
            height: 30px;
            border: 1px solid black;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: grey;
            color: white;
            border-radius: 2px;
            cursor: pointer; /* Add cursor pointer */
        }

        .time-box.selected {
            background-color: #00cc00; /* Highlight color for selected time */
            color: white; /* Text color for selected time */
        }

        #button_1{
            padding-top: 40px;
            text-align: left;
            padding-left: 20px;
        }

        #select{
            font-size: 18px;
            text-align: left;
            padding-left: 20px;
            margin-top:20px;
            color: #00cc00;
        }

        #ph{
            font-size: 7px;
            color: white;
        }

        /* Style for the line */
        #ph-line {
            margin-top: 8px; /* Adjust as needed */
            width: 98%;
            border-bottom: 1px solid white;
            margin-left: 20px; /* Match the padding-left of the text */
        }

        #calendar-title{
            padding-left: 10px;
            padding-right: 10px;
            font-size: 30px;
            font-weight:normal;
        }

        /* Style for the icon buttons */
        .next-button, .prev-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: white; /* Set button color to black */
            margin-left:30px;
            margin-right:30px;

        }

        .icon-button{
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: white;
        }

        /* Style for the selected date indicator */
        .selected-date {
            background-color: #00cc00; /* Green background */
            color: white; /* White text color */
        }

        #date1 {
            display: flex;
            justify-content: center;
            padding-left: 15%;
            font-weight: bold;
            font-size: 25px;
            padding-bottom: 5px;
            color: white;
        }

        #text-link {
            text-align: center; /* Center the text link */
            padding-right: 140px;
            color: green; /* Change font color to green */
        }

        #text-link a {
            color: green; /* Change font color to green */
        }
        
        


        #button-container {
            position: fixed;
            top: 70%;
            right: 120px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column; /* Arrange buttons vertically */
            align-items: center; /* Align buttons to the right */
        }

        .text-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: black;
            margin-bottom: 10px;
        }

        #button_6 {
            border: none; /* Remove existing border */
            border-radius: 10px; /* Add rounded corners */
            background-color: #00cc00; /* Green background */
            color: white; /* White text color */
            height: 50px; /* Adjust height as needed */
            width: 200px; /* Adjust width as needed */
            margin-top: 10px; /* Adjust margin as needed */
            font-size: 20px; /* Set font size */
        }
        #button_2{
            border-top: 2px solid white;
            height: 40px;
            padding-top: 10px;
            width: 130%;
            color: white;
        }
        #button_3{
            border-top: 2px solid white;
            height: 40px;
            padding-top: 10px;
            width: 130%;
            color: white;
        }
        #button_4{
            border-top: 2px solid white;
            height: 40px;
            padding-top: 10px;
            width: 130%;
            color: white;
        }
        #button_5 {
            border-top: 2px solid white; /* Add a solid border on the top */
            border-bottom: 2px solid white;
            height: 50px;
            width: 130%;
            color: white;
           
        }

        #duration{
            font-size: 20px;
            color:white;
        }
    </style>
</head>
<body>
    <div id="navbar">
        <div id="logo">
            <img src="../assets/img/logo.png" alt="Logo">
        </div>
        <div id="title">
            <h1 id="nav-title">Schedule and Time</h1>
        </div>
        <div id="profile-tab">
            <img src="../assets/img/profile.png" alt="Profile">
        </div>
    </div>

    <div id="button_1">
        <button onclick="goBack()" style="margin-top: 50px;" class="icon-button"><i class="fas fa-arrow-left"></i></button>
    </div>

    <div id="select">
        <h1>Select Date and Time</h1>  
    </div>

    <div id="ph">
        <h1>Philippine Standard Time (GMT+8)</h1>
        <!-- Horizontal line -->
        <div id="ph-line"></div>
    </div>

    <div id="header">
        <div id="navigation">
            <button id="prev-month" class="prev-button"><i class="fas fa-chevron-left"></i></button>
            <h1 id="calendar-title">April 2024</h1>
            <button id="next-month" class="next-button"><i class="fas fa-chevron-right"></i></button>
        </div>

        <div id="date1">
            <h1></h1>  
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
            <div id="time-container1" class="time-container">
                <!-- Display available hours here -->
                <div class="time-box" onclick="selectTime(this)">7:00 AM</div>
                <div class="time-box" onclick="selectTime(this)">8:00 AM</div>
                <div class="time-box" onclick="selectTime(this)">9:00 AM</div>
                <div class="time-box" onclick="selectTime(this)">10:00 AM</div>
            </div>
        </div>
        <div class="time-column">
            <div id="time-container2" class="time-container">
                <!-- Display available hours here -->
                <div class="time-box" onclick="selectTime(this)">7:00 AM</div>
                <div class="time-box" onclick="selectTime(this)">8:00 AM</div>
                <div class="time-box" onclick="selectTime(this)">9:00 AM</div>
                <div class="time-box" onclick="selectTime(this)">10:00 AM</div>
            </div>
        </div>

        <div id="text-link">
            <a href="#">See all sessions</a>
        </div>
    </div>

    

    <!-- Button container -->
    <div id="button-container">

        <div id="duration">
            <h3>Duration</h3>  
        </div>

        <button id="button_2" class="text-button">1 hour</button>
        <button id="button_3" class="text-button">2 hour</button>
        <button id="button_4" class="text-button">3 hour</button>
        <button id="button_5" class="text-button">Open hours</button>
        <button id="button_6" class="text-button">Go to Payment</button>
    </div>

    <script>
        let currentYear, currentMonth;

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
    const selectedDate = new Date(event.target.dataset.date);
    const week = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });
    const month = selectedDate.toLocaleDateString('en-US', { month: 'long' });
    const day = selectedDate.getDate();

    // Remove the indicator class from the previously clicked cell, if any
    const lastClickedDate = document.querySelector('.selected-date');
    if (lastClickedDate) {
        lastClickedDate.classList.remove('selected-date');
    }

    // Remove the selected class from all time boxes
    const timeBoxes = document.querySelectorAll('.time-box');
    timeBoxes.forEach(box => {
        box.classList.remove('selected');
    });

    // Add the indicator class to the clicked cell
    event.target.classList.add('selected-date');

    // Display the selected date by week, month, and day in the "Date Now" element
    document.getElementById('date1').textContent = `${week}, ${month} ${day}`;
}

function displayCurrentDate() {
    const now = new Date();
    const week = now.toLocaleDateString('en-US', { weekday: 'long' });
    const month = now.toLocaleDateString('en-US', { month: 'long' });
    const day = now.getDate();

    // Display the current date in the "Date Now" element
    document.getElementById('date1').textContent = `${week}, ${month} ${day}`;
}

// Call the function to display the current date when the page loads
displayCurrentDate();


        function goToPreviousMonth() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentYear, currentMonth);
        }

        function goToNextMonth() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentYear, currentMonth);
        }

        function goBack() {
            window.history.back();
        }

        const now = new Date();
        currentYear = now.getFullYear();
        currentMonth = now.getMonth();
        generateCalendar(currentYear, currentMonth);

        document.getElementById('prev-month').addEventListener('click', goToPreviousMonth);
        document.getElementById('next-month').addEventListener('click', goToNextMonth);

        // Display the current date when the page loads
        displayCurrentDate();

        function selectTime(timeBox) {
            // Remove the selected class from all time boxes
            const timeBoxes = document.querySelectorAll('.time-box');
            timeBoxes.forEach(box => {
                box.classList.remove('selected');
            });

            // Add the selected class to the clicked time box
            timeBox.classList.add('selected');
        }
    </script>
</body>
</html>
