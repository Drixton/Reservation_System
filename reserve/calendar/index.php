<!DOCTYPE html>
<html>
<head>
    <title>Navbar Example</title>
    <style>
        /* CSS for styling the navbar */
        .navbar {
            /*background: linear-gradient(to right, black, grey, green);*/
            background-color: #17202A;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 75px;
            z-index: 1000; /* Ensure navbar is on top of other content */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand,
        .navbar-text,
        .navbar-account {
            color: white;
            font-size: 30px;
            text-decoration: none;
            padding: 10px 15px;
        }

        .navbar-brand img {
            height: 140px;
            vertical-align: middle;
        }

        .account-icon {
            margin-right: 5px;
        }

        .account-name {
            font-size: 15px;
            text-align: center; /* Center align account name */
        }

        .account-picture {
            width: 30px; /* Set width for the profile picture */
            height: 30px; /* Set height for the profile picture */
            display: block; /* Make profile picture a block element */
            margin: 0 auto; /* Center profile picture */
            padding-top: 10px;
        }

        .back-button-container {
            display: flex;
            align-items: center;
            padding-left:30px;
            margin-top: 20px;
        }

        .back-button {
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .back-text {
            color: white;
            font-size: 18px;
            margin-left: 5px;
        }

        .back-description{
            color: green;
            padding-left: 30px;
            padding-top: 10px;
            font-size: 30px;
        }

        .ph-description{
            color: white;
            text-align: center;
            font-size: 15px;
        }

        .ph-line {
            border: 1px solid white;
            width: 98%;
            margin: 0 auto; /* Center the line */
            margin-top: 10px; /* Adjust spacing between the line and text */
        }

        /* CSS for styling the calendar */
        .calendar {
            position: fixed;
            left: 0;
            top: 190px; /* Adjust this value to position the calendar below the ph-line */
            width: 410px;
            color: white;
            padding: 15px;
            box-sizing: border-box;
        }

        .calendar h2 {
            text-align: center;
            margin-top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 40px;
        }

        .calendar h2 .month-nav {
            align-items: center;
            padding-left: 10px;
        }

        .calendar table {
            width: 450px;
            height: 400px;
            border-collapse: collapse; /* Remove default table border */
        }

        .calendar th,
        .calendar td {
            padding: 5px;
            text-align: center;
            cursor: pointer; /* Add cursor pointer to indicate selectability */
        }

        .calendar th {
            color: white;
        }

        .calendar td {
            color: white;
        }

        .selected {
            background-color: green; /* Change background color for selected date */
            color: black; /* Change text color for selected date */
        }

        .current-date {
            background-color: #444; /* Change background color for current date */
        }

        /* CSS for styling the time buttons */
        .time-buttons-container {
            display: flex;
            justify-content: center;
        }

        .time-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 20px;
        }

        .time-button {
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 17px;
            width: 110%;
        }

        .time-button:hover {
            background-color: #555;
        }

        .time-button.selected {
            background-color: green;
        }

        .current-date-display{
            color: white; 
            text-align: center; 
            font-size: 25px;
        }

        .session-link {
            color: green;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
            display: block;
            text-align: center;
        }

        .additional-options-container {
            position: fixed;
            top: 175px;
            right: 20px;
            padding: 15px 5em 0 0;
            border-radius: 20px;
            color: white;
            text-align: center;
            width: 20%;
            
        }

        .additional-option {
            border-bottom: 2px solid white;
            color: white;
            padding: 20px 20px;
            cursor: pointer;
            font-size: 22px;
        }

        .additional-option:hover {
            background-color: green;
        }

        .payment-option{
            border-radius: 10px; /* Add rounded corners */
            background-color: green;
            color: white; /* White text color */
            height: 30px; /* Adjust height as needed */
            width: 200px; /* Adjust width as needed */
            font-size: 18px;
            padding-top: 7px;
            margin-top: 50px;
            margin-left: 15%;
        }

        .duration-text{
            padding-top: 20px;
            padding-bottom: 25px;
            border-bottom: 2px solid white;
            font-size: 25px;
            width: 100%;
        }

        body {
            background-color: black; /* Set background color to black */
            margin: 0; /* Remove default margin */
            padding-top: 60px; /* Adjust padding to account for the navbar */
        }

        @media screen and (max-width: 768px) {
            .navbar-brand,
            .navbar-text,
            .navbar-account {
                font-size: 16px;
                padding: 10px;
            }
        }

        /* Adjust font size for smaller screens */
        @media screen and (max-width: 480px) {
            .navbar-brand img {
                height: 20px;
            }
        }
        
    </style>
</head>
<body>

<div class="navbar">
    <!-- Logo Image -->
    <a href="/reservation_system/reserve/" class="navbar-brand"><img src="../assets/img/logo.png" alt="Logo"></a>
    
 
    <!-- Text in the Middle -->
    <a href="#" class="navbar-text">Schedule and Time</a>
    
    <!-- Account Icon and Name -->
    <div class="navbar-account">
        <span class="account-icon"><img src="../assets/img/profile.png" alt="icon-account" class="account-picture"></span> 
        <span class="account-name">Your Account Name</span>
    </div>
</div>

<!-- Back button icon -->
<div class="back-button-container">
    <div class="back-button" onclick="goBack()">&#8249;</div>
    <div class="back-text">Back</div>
</div>

<div class="back-description">Select a Date and Time</div>

<div class="phlippine">
    <div class="ph-description">Philippine Standard Time (GMT+8)</div>
    <hr class="ph-line">
</div>

<!-- Calendar -->
<div class="calendar" id="calendar"></div>

<!-- Current date display -->
<div class="current-date-display" id="currentDateDisplay">
    <p></p>
</div>

<!-- Time buttons -->
<div class="time-buttons-container">
    <div class="time-column">
        <button class="time-button" onclick="selectTime(this)">8:00 AM</button>
        <button class="time-button" onclick="selectTime(this)">8:30 AM</button>
        <button class="time-button" onclick="selectTime(this)">9:00 AM</button>
        <button class="time-button" onclick="selectTime(this)">9:30 AM</button>
        <button class="time-button" onclick="selectTime(this)">10:00 AM</button>
        <button class="time-button" onclick="selectTime(this)">10:30 AM</button>
        <button class="time-button" onclick="selectTime(this)">11:00 AM</button>
    </div>
    <div class="time-column">
        <button class="time-button" onclick="selectTime(this)">1:00 AM</button>
        <button class="time-button" onclick="selectTime(this)">1:30 AM</button>
        <button class="time-button" onclick="selectTime(this)">2:00 PM</button>
        <button class="time-button" onclick="selectTime(this)">2:30 PM</button>
        <button class="time-button" onclick="selectTime(this)">3:00 AM</button>
        <button class="time-button" onclick="selectTime(this)">3:30 AM</button>
        <button class="time-button" onclick="selectTime(this)">4:00 PM</button>
    </div>
</div>

<!-- Session link -->
<a href="#" class="session-link">See all Sessions</a>

<!-- Additional Options -->
<div class="additional-options-container">
    <div class="duration-text">Duration</div>
    <div class="additional-option">1 hour</div>
    <div class="additional-option">2 hours</div>
    <div class="additional-option">3 hours</div>
    <div class="additional-option">Open hours</div>
    <div class="payment-option">Go to payment</div>
</div>

<script>
    // JavaScript function to go back
    function goBack() {
        window.history.back();
    }

    // Function to generate a calendar
    function generateCalendar(year, month) {
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        const currentDay = currentDate.getDate();
        const calendarDiv = document.getElementById('calendar');

        let html = '<h2>';
        html += '<div onclick="previousMonth()" style="cursor: pointer;">&#8249;</div>'; // Previous month button
        html += '<div class="month-nav">' + new Date(year, month).toLocaleString('default', { month: 'long' }) + ' ' + year + '</div>'; // Month title
        html += '<div onclick="nextMonth()" style="cursor: pointer;">&#8250;</div>'; // Next month button
        html += '</h2>';
        html += '<table>';
        html += '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';
        
        let dayCounter = 1;
        for (let i = 0; i < 6; i++) {
            html += '<tr>';
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDayOfMonth) {
                    html += '<td></td>';
                } else if (dayCounter > daysInMonth) {
                    html += '<td></td>';
                } else {
                    let cellClass = '';
                    if (year === currentYear && month === currentMonth && dayCounter === currentDay) {
                        cellClass = 'current-date';
                    }
                    html += '<td class="' + cellClass + '" onclick="selectDate(this)">' + dayCounter + '</td>';
                    dayCounter++;
                }
            }
            html += '</tr>';
        }

        html += '</table>';
        calendarDiv.innerHTML = html;
    }

    // Call generateCalendar function with current year and month
    const currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    generateCalendar(currentYear, currentMonth);

    // Function to select the date
    function selectDate(cell) {
        const selectedCells = document.querySelectorAll('.selected');
        selectedCells.forEach(selectedCell => {
            selectedCell.classList.remove('selected');
        });
        cell.classList.add('selected');

        // Get the selected date
        const selectedDate = new Date(currentYear, currentMonth, parseInt(cell.textContent));

        // Update the current date display with the selected date
        const currentDateDisplay = document.getElementById('currentDateDisplay');
        currentDateDisplay.children[0].textContent = formatDate(selectedDate);

        // Get the current month and week
        const currentMonthWeekDisplay = document.getElementById('currentDateDisplay');
        const selectedMonth = selectedDate.toLocaleString('default', { month: 'long' });
        const selectedWeek = Math.ceil(cell.textContent / 7);
        currentMonthWeekDisplay.children[1].textContent = selectedMonth + ' Week ' + selectedWeek;
    }

    // Function to go to the previous month
    function previousMonth() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentYear, currentMonth);
    }

    // Function to go to the next month
    function nextMonth() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentYear, currentMonth);
    }

    // Function to format date
    function formatDate(date) {
        const options = { weekday: 'short', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    // Function to select time
    function selectTime(button) {
        // Deselect all buttons
        const timeButtons = document.querySelectorAll('.time-button');
        timeButtons.forEach(btn => {
            btn.classList.remove('selected');
        });

        // Select the clicked button
        button.classList.add('selected');
    }

    // Display current date
    const currentDateDisplay = document.getElementById('currentDateDisplay');
    currentDateDisplay.children[0].textContent = formatDate(currentDate);
    
</script>

<!-- Your page content here -->

</body>
</html>
