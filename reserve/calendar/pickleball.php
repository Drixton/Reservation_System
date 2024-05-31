<!DOCTYPE html>
<html>
<head>
    <title>Navbar Example</title>
    <style>
        /* CSS for styling the navbar */
        .navbar {
            /*background: linear-gradient(to right, black, grey, green);*/
            background-color: black;
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
            margin-left: 150px;
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
            margin-right: -65px;
        }

        .time-button {
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-left: 68px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 17px;
          
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
            margin-left: 145px;
            font-size: 25px;
        }
        .session-link {
    color: green;
    text-decoration: none;
    font-size: 16px;
    position: fixed;
    margin-left: 850px;

}


        .text-link-container {
            position: fixed;
            top: 155px;
            right: -100px;
            padding: 15px 5px 0 0; /* Adjust padding for vertical orientation */
            border-radius: 20px;
            color: white;
            text-align: center;
            width: 20%;
            display: flex; /* Change display to flex */
            flex-direction: column; /* Set flex direction to column */
            align-items: flex-start; /* Align items to the end of the container */
            margin-top: 40px;
            margin-right: 200px;
        }

        .text-link {
            color: white;
            padding: 10px 10px;
            font-size: 25px;
            padding-left: 12px;
            text-decoration: none; /* Remove underline */
            border: 1px solid white;
            border-radius: 5px;
            margin-top: 15px;
        }

        .text-link:hover {
            background-color: green;
        }

        .court-text{
            padding-bottom: 25px;
            border-bottom: 2px solid white;
            font-size: 25px;
        }

        .additional-options-container {
            position: fixed;
            top: 175px;
            right: -76px;
            padding: 15px 5em 0 0; /* Adjust padding for vertical orientation */
            border-radius: 20px;
            color: white;
            text-align: center;
            margin-left: 120px; /* Adjust margin-right to move the container to the right */
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
            border-radius: 10px;
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
            box-shadow: 1px 1px 2px rgba(0, 1, 0, 1); /* Add shadow */
        }

        .duration-text{
            padding-top: 20px;
            padding-bottom: 25px;
            border-bottom: 2px solid white;
            font-size: 25px;
            width: 100%;
        }

        body {
            background: linear-gradient(to right, black,green); /* Set background gradient */
            margin: 0; /* Remove default margin */
            padding-top: 60px; /* Adjust padding to account for the navbar */
        }

        @media screen and (max-width: 1024px) {
    /* Adjust navbar text size and padding for smaller screens */
    .navbar-brand,
    .navbar-text,
    .navbar-account {
        font-size: 16px;
        padding: 10px;
    }
}

/* Adjust logo image height for smaller screens */
@media screen and (max-width: 480px) {
    .navbar-brand img {
        height: 20px;
    }
}
.back-icon svg {
        fill: #ffffff; /* White color */
    }     
       
        
        
    </style>
</head>
<body>

<div class="navbar">
    <!-- Logo Image -->
    <a href="#" class="navbar-brand"><img src="../assets/img/logo.png" alt="Logo"></a>
    
    <!-- Text in the Middle -->
    <a href="#" class="navbar-text">Schedule and Time</a>
    
    <!-- Account Icon and Name -->
    <div class="navbar-account">
        <span class="account-icon"><img src="../assets/img/profile.png" alt="icon-account" class="account-picture"></span> 
        <span class="account-name">Your Account Name</span>
    </div>
</div>

<div class="back-button-container">
    <a href="#" onclick="goBack()">
        <div class="back-icon"> 
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
            </svg>
        </div>
    </a>
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
<div class="text-link-container">
    <div class="court-text">Court Number</div>
    <a href="#" class="text-link" onclick="selectCourt(this)">Court 1</a>



</div>

<!-- Additional Options -->
<div class="additional-options-container">
    <div class="duration-text">Duration</div>
    <div class="additional-option" onclick="selectDuration(this)">1 hour</div>
    <div class="additional-option" onclick="selectDuration(this)">2 hours</div>
    <div class="additional-option" onclick="selectDuration(this)">3 hours</div>
    <div class="additional-option" onclick="selectDuration(this)">Open hours</div>
    <div class="payment-option" onclick="goToPayment()">Go to payment</div>
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

        // Store the selected date for redirection
        window.selectedFullDate = formatDate(selectedDate); // Store the formatted date string
    }

    // Function to format date
    function formatDate(date) {
        const options = { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' }; // Include day, month, and year
        return date.toLocaleDateString('en-US', options);
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

    // Function to select court number
    function selectCourt(courtLink) {
        // Deselect all court links
        const courtLinks = document.querySelectorAll('.text-link');
        courtLinks.forEach(link => {
            link.classList.remove('selected');
        });

        // Select the clicked court link
        courtLink.classList.add('selected');
    }

    // Function to select duration
    function selectDuration(durationOption) {
        // Deselect all duration options
        const durationOptions = document.querySelectorAll('.additional-option');
        durationOptions.forEach(option => {
            option.classList.remove('selected');
        });

        // Select the clicked duration option
        durationOption.classList.add('selected');
    }

    // Function to redirect to payment page
    function goToPayment() {
        // Get selected date, time, court number, and duration
        const selectedDate = window.selectedFullDate; // Use the stored full date string
        const selectedTime = document.querySelector('.time-button.selected').textContent;
        const selectedCourt = document.querySelector('.text-link.selected').textContent;
        const selectedDuration = document.querySelector('.additional-option.selected').textContent;

        // Redirect to payment.php with query parameters
        window.location.href = "http://localhost/reservation_system/reserve/payment/pickleballpayment.php" + 
                                "?date=" + encodeURIComponent(selectedDate) + 
                                "&time=" + encodeURIComponent(selectedTime) + 
                                "&court=" + encodeURIComponent(selectedCourt) + 
                                "&duration=" + encodeURIComponent(selectedDuration);
    }

    // Initialize the calendar with the current date
    const currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    generateCalendar(currentYear, currentMonth);
    currentDateDisplay.children[0].textContent = formatDate(currentDate);
</script>
<script>
    // JavaScript function to navigate back to the specified page
    function goBack() {
        // Redirect to the desired page
        window.location.href = "http://localhost/reservation_system/reserve/landpage/dashboard.php";
    }

    // Your existing JavaScript functions...
</script>
<!-- Your page content here -->

</body>
</html>