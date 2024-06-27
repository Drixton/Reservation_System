<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whole Venue Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(to bottom, green, white) no-repeat fixed;
            background-size: cover;
            color: #333;
            /* Dark text color */
            font-family: "Arial", sans-serif;
            /* Standard font family */
            text-align: center;
        }

        /* Navbar */
        .navbar {
            background-color: #000;
            /* Black background for navbar */
        }

        .navbar-brand {
            font-weight: bold;
            /* Bold font for the brand */
            color: #fff;
            /* White text color */
        }

        .nav-link {
            color: #fff;
            /* White text color for navbar links */
        }

        .nav-link:hover {
            color: #FFA500;
            /* Orange text color on hover */
        }

        /* Calendar */
        #calendar {
            background-color: #fff;
            /* White background for calendar */
            border-radius: 5px;
            /* Slightly rounded corners */
            padding: 20px;
            /* Increased padding for better spacing */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            margin-top: 40px;
        }

        .month-nav {
            color: #333;
            /* Dark text color for month navigation */
            font-weight: bold;
            /* Bold font for better visibility */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            /* Standard padding for cells */
        }

        th {
            color: #333;
            /* Dark text color for table headers */
        }

        .day {
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .day:hover {
            background-color: #009933;
            /* Light gray background on hover */
        }

        .today {
            background-color: #add8e6;
            /* Green background for today's date */
            color: #fff;
            /* White text color for today's date */
        }

        .holiday {
            color: orange;
            /* Orange text color for holidays */
        }

        /* Time buttons */
        .time-button {
            margin-bottom: 10px;
            /* Increased margin for better spacing */
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: white;
            /* Green background for time buttons */
            color: black;
            /* White text color */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .time-button:hover {
            background-color: #009933;
            /* Darker green on hover */
        }

        .time-button.selected {
            background-color: green !important;
            /* Darker green for selected time */
        }

        /* Court selection container */
        .court-selection-container {
            background-color: #fff;
            /* White background for container */
            border-radius: 5px;
            /* Slightly rounded corners */
            padding: 20px;
            /* Increased padding for better spacing */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            margin-top: 20px;
            /* Spacing from the calendar */
        }

        .form-select {
            margin-bottom: 10px;
            /* Increased margin for better spacing */
        }

        .duration-text {
            font-weight: bold;
            /* Bold font for duration text */
        }

        /* Duration options */
        .additional-option {
            cursor: pointer;
            margin-bottom: 10px;
            /* Increased margin for better spacing */
            padding: 10px;
            border-radius: 5px;
            transition: color 0.3s ease;
        }

        .additional-option.selected {
            color: #FFA500;
            /* Orange color for selected duration */
        }

        /* Payment button */
        .payment-option {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: #3366CC;
            /* Blue background for payment button */
            color: #fff;
            /* White text color */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .payment-option:hover {
            background-color: #00008B;
            /* Darker blue on hover */
        }

        /* Back to top button */
        .back-button {
            display: block;
            margin: 0 auto;
            border-radius: 5px;
            background-color: orange;
            /* Black background for back button */
            color: #fff;
            /* White text color */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: orange;
            /* Darker black on hover */
        }

        .selected-date {
            color: red !important;
            /* Red color for selected date */
            background-color: inherit !important;
            /* Inherit background color to keep hover effect */
        }

        /* Back to top button */
        .back-button {
            display: block;
            width: 100%;
            margin-top: 10px;
            /* Added margin for spacing */
            padding: 15px;
            /* Added padding for consistency */
            border: none;
            /* Removed border */
            border-radius: 5px;
            background-color: orange;
            /* Orange background for back button */
            color: #fff;
            /* White text color */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: darkorange;
            /* Darker orange on hover */
        }
    </style>




</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Whole Venue Reservation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://aepreserve.000webhostapp.com/">Home</a>
                    </li>
                    <!-- Add more navbar links as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <!-- Calendar -->

        <div class="row">
            <div class="col-lg-8">
                <div id="calendar"></div>
                <div class="current-date-display mt-3">
                    <input type='hidden' id="currentDateDisplay_input"></input>
                    <p id="currentDateDisplay"></p>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Time buttons -->
                <div class="time-buttons-container">
                    <h3>Time Selection</h3>
                    <div class="row">
                        <div class="col">
                            <div class="time-column">
                                <button class="time-button" id='time-button' value='8:00 AM'
                                    onclick="selectTime(this)">8:00 AM</button>
                                <button class="time-button" id='time-button' value='8:30 AM'
                                    onclick="selectTime(this)">8:30 AM</button>
                                <button class="time-button" id='time-button' value='9:00 AM'
                                    onclick="selectTime(this)">9:00 AM</button>
                                <button class="time-button" id='time-button' value='9:30 AM'
                                    onclick="selectTime(this)">9:30 AM</button>
                                <button class="time-button" id='time-button' value='10:00 AM'
                                    onclick="selectTime(this)">10:00 AM</button>
                                <button class="time-button" id='time-button' value='10:30 AM'
                                    onclick="selectTime(this)">10:30 AM</button>
                                <button class="time-button" id='time-button' value='11:00 AM'
                                    onclick="selectTime(this)">11:00 AM</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="time-column">
                                <button class="time-button" id='time-button' value='1:00 PM'
                                    onclick="selectTime(this)">1:00 PM</button>
                                <button class="time-button" id='time-button' value='1:30 PM'
                                    onclick="selectTime(this)">1:30 PM</button>
                                <button class="time-button" id='time-button' value='2:00 PM'
                                    onclick="selectTime(this)">2:00 PM</button>
                                <button class="time-button" id='time-button' value='2:30 PM'
                                    onclick="selectTime(this)">2:30 PM</button>
                                <button class="time-button" id='time-button' value='3:00 PM'
                                    onclick="selectTime(this)">3:00 PM</button>
                                <button class="time-button" id='time-button' value='3:30 PM'
                                    onclick="selectTime(this)">3:30 PM</button>
                                <button class="time-button" id='time-button' value='4   :00 PM'
                                    onclick="selectTime(this)">4:00 PM</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Court Selection -->
                <div class="court-selection-container mt-3">
                    <div class="duration-text">FACILITY SELECTION</div>
                    <select id="courtSelection" class="form-select" onchange="updateCourtNumber(this)">
                        <option value="Whole Venue">Whole Venue</option>


                        <!-- Add more courts as needed -->
                    </select>
                    <div class="duration-text">TYPE SELECTION</div>
                    <select id="sportSelection" class="form-select" onchange="updateSport(this)">
                        <option value="Events">Events</option>
                        <!-- Add more sports as needed -->
                    </select>

                    <div class="additional-options-container mt-3">
                        <div class="duration-text">DURATION</div>
                        <div class="additional-option" onclick="selectDuration(this)">12 hour</div>
                        <div class="additional-option" onclick="selectDuration(this)">24 hours</div>

                        <button class="payment-option mt-3" onclick="goToPayment()">Go to payment</button>
                        <button class="back-button" onclick="goBack()">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Back to top button -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript function to go back

        // Define global variables for current date
        let currentYear, currentMonth;

        // Function to generate a calendar
        function generateCalendar(year, month) {
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const currentDate = new Date();
            const todayYear = currentDate.getFullYear();
            const todayMonth = currentDate.getMonth();
            const currentDay = currentDate.getDate();
            const calendarDiv = document.getElementById('calendar');

            // Define Philippine holidays
            const philippineHolidays = [
                { month: 0, day: 1 }, // New Year's Day
                { month: 3, day: 9 }, // Araw ng Kagitingan
                { month: 4, day: 1 }, // Labor Day
                { month: 5, day: 12 }, // Independence Day
                { month: 6, day: 30 }, // National Heroes Day
                { month: 10, day: 30 }, // Bonifacio Day
                { month: 11, day: 25 }, // Christmas Day
                { month: 11, day: 30 }, // Rizal Day
                { month: 0, day: 23 }, // Chinese New Year
                { month: 2, day: 25 }, // EDSA People Power Revolution Anniversary
                { month: 6, day: 31 }, // Eid'l Fitr
                { month: 10, day: 1 }, // All Saints' Day
                { month: 10, day: 30 }, // All Souls' Day
                { month: 11, day: 8 }, // Feast of the Immaculate Conception of the Blessed Virgin Mary
                { month: 11, day: 31 }, // Last Day of the Year
                { month: 1, day: 25 }, // Chinese New Year
                { month: 11, day: 31 }, // Additional Special (Non-Working) Day
                { month: 8, day: 1 }, // Ninoy Aquino Day
                { month: 9, day: 27 }, // Eidul Adha
                { month: 11, day: 30 } // Christmas Eve
            ];

            let html = '<h2>';
            html += '<div onclick="previousMonth()" style="cursor: pointer;">◀</div>'; // Previous month button
            html += '<div class="month-nav">' + new Date(year, month).toLocaleString('default', { month: 'long' }) + ' ' + year + '</div>'; // Month title
            html += '<div onclick="nextMonth()" style="cursor: pointer;">▶</div>'; // Next month button
            html += '</h2>';
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
                        let isHoliday = philippineHolidays.some(holiday => holiday.month === month && holiday.day === dayCounter);
                        let classNames = 'day';
                        if (isHoliday) {
                            classNames += ' holiday';
                        }
                        if (year === todayYear && month === todayMonth && dayCounter === currentDay) {
                            classNames += ' today';
                        }
                        html += `<td class="${classNames}" onclick="selectDate(${year}, ${month}, ${dayCounter})">${dayCounter}</td>`;
                        dayCounter++;
                    }
                }
                html += '</tr>';
            }
            html += '</table>';

            calendarDiv.innerHTML = html;
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

        // Function to select a date
        // Function to select a date
        function selectDate(year, month, day) {
            const selectedDate = new Date(year, month, day);
            const formattedDate = selectedDate.toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
            const currentDateDisplay = document.getElementById('currentDateDisplay');

            $('#currentDateDisplay_input').val(formattedDate);
            currentDateDisplay.innerHTML = `Selected Date: <span style="color: red;">${formattedDate}</span>`;

            // Reset previous selected date style
            const selectedDateCell = document.querySelector('.selected-date');
            if (selectedDateCell) {
                selectedDateCell.classList.remove('selected-date');
            }

            // Find and style the newly selected date cell
            const dateCells = document.querySelectorAll('.day');
            dateCells.forEach(cell => {
                const cellDate = new Date(year, month, parseInt(cell.textContent));
                if (cellDate.getTime() === selectedDate.getTime()) {
                    cell.classList.add('selected-date');
                }
            });

            if ($('#currentDateDisplay').innerHTML != "") {
                var date = $('#currentDateDisplay_input').val();
                // alert(date);
                disabled_time_slots(date);
            }
        }

        function disabled_time_slots(date) {
            let buttons = document.querySelectorAll('.time-button');

            buttons.forEach(element => {
                element.classList.remove('bg-danger');
                element.disabled = false;
                element.style.pointerEvents = "all";
            })

            $.ajax({
                type: 'GET',
                url: 'booked_time.php?date=' + date + '&&sports=Events',
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);

                    if (res.status === 200) {
                        var result = res.data;
                        // console.log(result);
                        result.forEach((element, index) => {
                            console.log(element[4]);
                            let buttons = document.querySelectorAll('.time-button');

                            let foundButton = Array.from(buttons).find(button => {
                                return button.value === element[4];
                            });

                            if (foundButton) {
                                foundButton.classList.add('bg-danger');
                                foundButton.disabled = true;
                                foundButton.style.pointerEvents = "none";
                            } else {
                                console.log("No button found with the specified class and value.");
                            }
                        })
                    }
                    else {
                        let buttons = document.querySelectorAll('.time-button');

                        buttons.forEach(element => {
                            element.classList.remove('bg-danger');
                            element.disabled = false;
                            element.style.pointerEvents = "all";
                        })
                    }
                }
            })
        }


        // Initialize the calendar with the current date
        document.addEventListener('DOMContentLoaded', function () {
            const currentDate = new Date();
            currentYear = currentDate.getFullYear();
            currentMonth = currentDate.getMonth();
            generateCalendar(currentYear, currentMonth);
        });



        // Function to update the selected court number
        function updateCourtNumber(selectElement) {
            const selectedCourt = selectElement.value;
            console.log('Selected Court:', selectedCourt);
        }

        // Function to select a duration
        function selectDuration(div) {
            const selectedDuration = div.textContent;
            console.log('Selected Duration:', selectedDuration);
        }

        // Function to navigate to the payment page
        function goToPayment() {
            const selectedDateText = document.getElementById('currentDateDisplay').textContent;

            if (selectedDateText === '') {
                alert('Please select a date before proceeding to payment.');
                return;
            }

            const selectedDate = selectedDateText.replace('Selected Date: ', '');
            const selectedTime = document.querySelector('.time-button.selected').textContent;
            const selectedDuration = document.querySelector('.additional-option.selected').textContent;
            const selectedCourt = document.getElementById('courtSelection').value;
            const selectedSport = document.getElementById('sportSelection').value; // Assuming you add an ID to the sport selection

            // Make AJAX request to check if reservation exists
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const exists = JSON.parse(this.responseText);
                    if (exists) {
                        alert('The selected reservation already exists in the database.');
                    } else {
                        // Proceed to payment page
                        window.location.href = "../Payment/wholevenuepayment.php" +
                            "?date=" + encodeURIComponent(selectedDate) +
                            "&time=" + encodeURIComponent(selectedTime) +
                            "&duration=" + encodeURIComponent(selectedDuration) +
                            "&court=" + encodeURIComponent(selectedCourt);
                    }
                }
            };
            xhttp.open("POST", "check_reservation.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("date=" + selectedDate + "&time=" + selectedTime + "&sport=" + selectedSport + "&court=" + selectedCourt + "&duration=" + selectedDuration);
        }



        // Initialize the calendar with the current date
        const currentDate = new Date();
        currentYear = currentDate.getFullYear();
        currentMonth = currentDate.getMonth();
        generateCalendar(currentYear, currentMonth);
        document.getElementById('currentDateDisplay').textContent = formatDate(currentDate);

        // JavaScript function to navigate back to the specified page
        function goBack() {
            // Redirect to the desired page
            window.location.href = "../landpage/dashboard.php";
        }

    </script>
    <script>
        // Function to select duration
        function selectDuration(durationOption) {
            // Deselect all duration options
            const durationOptions = document.querySelectorAll('.additional-option');
            durationOptions.forEach(option => {
                option.classList.remove('selected');
                option.style.color = ''; // Reset text color
            });

            // Select the clicked duration option
            durationOption.classList.add('selected');
            durationOption.style.color = 'red'; // Apply selected color
        }

        // Function to select time
        function selectTime(button) {
            // Check if the button is clickable (not red)
            if (button.style.backgroundColor !== 'red') {
                // Deselect all buttons
                const timeButtons = document.querySelectorAll('.time-button');
                timeButtons.forEach(btn => {
                    btn.classList.remove('selected');
                    if (btn.style.backgroundColor !== 'red') {
                        btn.style.backgroundColor = ''; // Reset background color
                    }
                });

                // Select the clicked button 
                button.classList.add('selected');
                button.style.backgroundColor = '#04a5ff'; // Change background color

                // Check if the selected time already exists in the database
                const selectedDate = document.getElementById('currentDateDisplay').textContent.replace('Selected Date: ', '');
                const selectedTime = button.textContent;

                // Make AJAX request
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const exists = JSON.parse(this.responseText);
                        if (exists) {
                            // Time already exists in the database, change button color to red
                            button.style.backgroundColor = 'red';
                            // Disable further interaction with the button
                            button.disabled = true;
                            button.style.cursor = 'not-allowed';
                        }
                    }
                };
                xhttp.open("POST", "check_time.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("date=" + selectedDate + "&time=" + selectedTime);
            }
        }


    </script>

    <script>
        function updateCourtNumber(select) {
            const selectedCourt = select.value;
            // Update the court number input in the payment details section
            document.getElementById('court_number').value = selectedCourt;
        }
    </script>
    <script>


        document.addEventListener('DOMContentLoaded', () => {
            fetchDataFromServer();
        });

        function selectTime(button) {
            if (button.style.backgroundColor !== 'red') {
                const timeButtons = document.querySelectorAll('.time-button');
                timeButtons.forEach(btn => {
                    btn.classList.remove('selected');
                    if (btn.style.backgroundColor !== 'red') {
                        btn.style.backgroundColor = '';
                    }
                });

                button.classList.add('selected');
                button.style.backgroundColor = '#04a5ff';

                const selectedDate = document.getElementById('currentDateDisplay').textContent.replace('Selected Date: ', '');
                const selectedTime = button.textContent;

                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const exists = JSON.parse(this.responseText);
                        if (exists) {
                            button.style.backgroundColor = 'red';
                            button.disabled = true;
                            button.style.cursor = 'not-allowed';
                        }
                    }
                };
                xhttp.open("POST", "check_time.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("date=" + selectedDate + "&time=" + selectedTime);
            }
        }

        function goToPayment() {
            const selectedDateText = document.getElementById('currentDateDisplay').textContent;

            if (selectedDateText === '') {
                alert('Please select a date before proceeding to payment.');
                return;
            }

            const selectedDate = selectedDateText.replace('Selected Date: ', '');
            const selectedTime = document.querySelector('.time-button.selected').textContent;
            const selectedDuration = document.querySelector('.additional-option.selected').textContent;
            const selectedCourt = document.getElementById('courtSelection').value;
            const selectedSport = document.getElementById('sportSelection').value; // Assuming you add an ID to the sport selection

            // Make AJAX request to check if reservation exists
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const exists = JSON.parse(this.responseText);
                    if (exists) {
                        alert('The selected reservation already exists in the database.');
                    } else {
                        // Proceed to payment page
                        window.location.href = "../Payment/wholevenuepayment.php" +
                            "?date=" + encodeURIComponent(selectedDate) +
                            "&time=" + encodeURIComponent(selectedTime) +
                            "&duration=" + encodeURIComponent(selectedDuration) +
                            "&court=" + encodeURIComponent(selectedCourt);
                    }
                }
            };
            xhttp.open("POST", "check_reservation.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("date=" + selectedDate + "&time=" + selectedTime + "&sport=" + selectedSport + "&court=" + selectedCourt + "&duration=" + selectedDuration);
        }


        function selectDuration(durationOption) {
            const durationOptions = document.querySelectorAll('.additional-option');
            durationOptions.forEach(option => {
                option.classList.remove('selected');
                option.style.color = '';
            });

            durationOption.classList.add('selected');
            durationOption.style.color = 'red';
        }

        function updateCourtNumber(selectElement) {
            const selectedCourt = selectElement.value;
            console.log('Selected Court:', selectedCourt);

            // Redirect based on selected court

        }

    </script>

</body>

</html>