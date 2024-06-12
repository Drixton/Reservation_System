

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Arnis Reservation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
      body {
            background: linear-gradient(to bottom, green, black) no-repeat fixed;
            background-size: cover;
            color: white; /* Set text color to white for better visibility */
        }
        </style>
    </head>
    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Arnis Reservation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/reservation_system/reserve">Home</a>
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
                    <p id="currentDateDisplay"></p> <!-- Added id attribute -->
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Time buttons -->
                <div class="time-buttons-container">
                    <div class="row">
                        <div class="col">
                            <div class="time-column">
                                <button class="time-button" onclick="selectTime(this)">8:00 AM</button>
                            
            <button class="time-button" onclick="selectTime(this)">8:30 AM</button>
            <button class="time-button" onclick="selectTime(this)">9:00 AM</button>
            <button class="time-button" onclick="selectTime(this)">9:30 AM</button>
            <button class="time-button" onclick="selectTime(this)">10:00 AM</button>
            <button class="time-button" onclick="selectTime(this)">10:30 AM</button>
            <button class="time-button" onclick="selectTime(this)">11:00 AM</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="time-column">
                                <button class="time-button" onclick="selectTime(this)">1:00 PM</button>
                                <button class="time-button" onclick="selectTime(this)">1:00 AM</button>
                                <button class="time-button" onclick="selectTime(this)">1:30 AM</button>
                                <button class="time-button" onclick="selectTime(this)">2:00 PM</button>
                                <button class="time-button" onclick="selectTime(this)">2:30 PM</button>
                                <button class="time-button" onclick="selectTime(this)">3:00 AM</button>
                                <button class="time-button" onclick="selectTime(this)">3:30 AM</button>
                                <button class="time-button" onclick="selectTime(this)">4:00 PM</button>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- Court Selection -->
    <div class="court-selection-container mt-3">
        <div class="duration-text">COURT SELECTION</div>
        <select id="courtSelection" class="form-select" onchange="updateCourtNumber(this)">
        <option value="court1">Court 1</option>
        <option value="court2">Court 2</option>
        <option value="court3">Court 3</option>
        <!-- Add more courts as needed -->
    </select>


                <div class="additional-options-container mt-3">
                    <div class="duration-text">DURATION</div>
                    <div class="additional-option" onclick="selectDuration(this)">1 hour</div>
                    <div class="additional-option" onclick="selectDuration(this)">2 hours</div>
                    <div class="additional-option" onclick="selectDuration(this)">3 hours</div>
                    <div class="additional-option" onclick="selectDuration(this)">Open hours</div>
                    <button class="payment-option mt-3" onclick="goToPayment()">Go to payment</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Additional Options --

    <!-- Back to top button -->
    <button onclick="goBack()" class="btn btn-primary back-button fixed-bottom mx-auto mb-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg> Back</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript function to go back
        function goBack() {
            window.history.back();
        }

        // Define global variables for current date
        let currentYear, currentMonth;

        // Function to generate a calendar
        function generateCalendar(year, month) {
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const currentDate = new Date();
            currentYear = currentDate.getFullYear(); // Update global variable
            currentMonth = currentDate.getMonth(); // Update global variable
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
                        // Check if the date is a holiday
                        const isHoliday = philippineHolidays.some(holiday => holiday.month === month && holiday.day === dayCounter);
                        html += '<td class="' + (isHoliday ? 'holiday' : '') + ' ' + cellClass + '" onclick="selectDate(this)">' + dayCounter + '</td>';
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
            currentDateDisplay.textContent = formatDate(selectedDate);

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
    // Skip May (index 4) and July (index 6)
    if (currentMonth === 4) {
        currentMonth++; // Skip May
    }
    if (currentMonth === 6) {
        currentMonth++; // Skip July
    }
    generateCalendar(currentYear, currentMonth);
}


        // Function to select time
        function selectTime(button) {
            // Check if the button is clickable (not red)
            if (button.style.backgroundColor !== 'red') {
                // Deselect all buttons
                const timeButtons = document.querySelectorAll('.time-button');
                timeButtons.forEach(btn => {
                    btn.classList.remove('selected');
                });

                // Select the clicked button 
                button.classList.add('selected');
            }
        }






    // Function to select court
    function selectCourt(select) {
        const selectedCourt = select.value;
        // Update the court number input in the payment details section
        document.getElementById('court_number').value = selectedCourt;
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
    // Function to redirect to payment page
    function goToPayment() {
        // Get selected date, time, duration, and court
        const selectedDate = window.selectedFullDate; // Use the stored full date string
        const selectedTime = document.querySelector('.time-button.selected').textContent;
        const selectedDuration = document.querySelector('.additional-option.selected').textContent;
        const selectedCourt = document.getElementById('courtSelection').value; // Get the selected court

    // Redirect to payment.php with query parameters
    window.location.href = "http://localhost/reservation_system/reserve/payment/arnispayment.php" + 
                            "?date=" + encodeURIComponent(selectedDate) + 
                            "&time=" + encodeURIComponent(selectedTime) + 
                            "&duration=" + encodeURIComponent(selectedDuration) +
                            "&court=" + encodeURIComponent(selectedCourt); // Add court parameter

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
            window.location.href = "http://localhost/reservation_system/reserve/landpage/dashboard.php";
        }

        // Function to fetch data from the server
        function fetchDataFromServer() {
            // Perform an AJAX request to fetch data from the server
            fetch('arnis_script.php')
                .then(response => response.json())
                .then(data => {
                    // Call functions to update styling based on the fetched data
                    updateButtonStyling(data.time);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Function to update time button styling
        function updateButtonStyling(timeData) {
            const timeButtons = document.querySelectorAll('.time-button');
            timeButtons.forEach(button => {
                if (timeData.includes(button.textContent)) {
                    button.style.backgroundColor = 'red';
                }
            });
        }

        // Call the function to fetch data when the page loads
        document.addEventListener('DOMContentLoaded', fetchDataFromServer);
        // Function to select time
    function selectTime(button) {
        // Check if the button is clickable (not red)
        if (button.style.backgroundColor !== 'red') {
            // Deselect all buttons
            const timeButtons = document.querySelectorAll('.time-button');
            timeButtons.forEach(btn => {
                btn.classList.remove('selected');
                btn.style.backgroundColor = ''; // Reset background color
            });

            // Select the clicked button 
            button.classList.add('selected');
            button.style.backgroundColor = '#04a5ff'; // Change background color
        }
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
            durationOption.style.color = 'rgb(4, 165, 255)'; // Apply selected color
        }

        // Function to select time
        function selectTime(button) {
            // Check if the button is clickable (not red)
            if (button.style.backgroundColor !== 'red') {
                // Deselect all buttons
                const timeButtons = document.querySelectorAll('.time-button');
                timeButtons.forEach(btn => {
                    btn.classList.remove('selected');
                    btn.style.backgroundColor = ''; // Reset background color
                });

                // Select the clicked button 
                button.classList.add('selected');
                button.style.backgroundColor = '#04a5ff'; // Change background color
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

    </body>
    </html>
