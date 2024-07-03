<?php
    session_start();

    // Check if the user is logged in and the session ID matches the one stored in cookies
    if(isset($_SESSION['status']) && $_SESSION['status'] === 'valid' && isset($_COOKIE['session_id']) && $_COOKIE['session_id'] === session_id()) {
        // If logged in and session ID matches, display welcome message with username
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        echo "<p class='welcome-message'>Welcome, $username!</p>";
        $profileDisabled = ""; // Profile is enabled
    } else {
        $profileDisabled = "disabled"; // Profile is disabled
    }
    ?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Teachers:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/landpage.css">   
    <title>AEP</title>

    <style>
        header{
            background-color: #040F13;
            color: #fff;
            padding: 1px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            height: 120px;
            position: relative; /* Ensure the header is positioned relatively */
        }

        header img {
            height: 100px;
            transition: transform 0.3s;
        }
        header img:hover {
            transform: scale(1.5);
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: right;
        }
        nav ul li {
            display: inline;
            margin-left: 20px;
            position: relative;
        }

        nav ul li:first-child {
            margin-left: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 40px;
        }

        .profile-icon {
            position: absolute;
            top: 10px;
            right: 20px;
            height: 40px;
            border-radius: 50%;
        }

        .centered-text {
            position: absolute;
            top: 50%; /* Move the text to the vertical center of the header */
            left: 250px; /* Push the text to the right */
            transform: translateY(-50%); /* Center vertically */
            font-size: -50px;
        }
        .prifle{
            width:80px;
            height:50px
        }

        /* Echoing welcome message style */
        .welcome-message {
            position: absolute;
            bottom: 0;
            right: 20px;
            color: white;
            margin-bottom: 5px;
        }
        body {
        background-color: #000; /* Background color */
        font-family: "Teachers", sans-serif;
    }
    header {
        background-color:  #040F13; /* Set header background color to black */
        color: #fff;
        padding: 1px 20px; /* Adjusted padding */
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative; /* Position the profile icon relative to the header */
        height: 120px; /* Set fixed height for the header */
    }
    header img {
        height: 180px; /* Adjusted height */
        transition: transform 0.3s; /* Add transition for smooth effect */
    }
    header img:hover {
        transform: scale(1.5); /* Enlarge the logo on hover */
    }
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        text-align: right;
    }
    nav ul li {
        display: inline;
        margin-left: 20px;
        position: relative; /* Set position to relative for dropdown */
    }
    nav ul li:first-child {
        margin-left: 0;
    }
    nav ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 20px; /* Adjust font size */
    }
    .profile-icon {
        position: absolute;
        top: 35px;
        right: 20px;
        height: 40px;
        border-radius: 50%;
    }
    /* Additional CSS */
    nav ul li:nth-last-child(2) a {
        text-decoration: none; /* Remove underline from "Login" */
    }
    nav ul li:last-child a {
        text-decoration: none; /* Remove underline from "Sign In" */
        color: white; /* Change color of "Sign In" */
    }
    /* Style for Login button */
    .login-button {
        background-color: #00ff00; /* Yellow-green color */
        color: #fff; /* White text color */
        padding: 8px 16px; /* Adjust padding */
        border-radius: 8px; /* Add border radius */
    }
    .login-button:hover {
        background-color: #00ff00; /* Darker shade of yellow-green on hover */
    }
    .login-button a {
        color: #fff; /* Set color of "Log In" link to white */
        text-decoration: none; /* Remove underline */
    }
    /* Style for dropdown menus */
    .dropdown-menu {
        background-color: #000; /* Black background color */
    }
    /* Style for dropdown menu items */
    .dropdown-menu a.dropdown-item {
        color: #fff; /* White text color */
    }
    /* Style for dropdown menu items on hover */
    .dropdown-menu a.dropdown-item:hover {
        background-color: #333; /* Darker background color on hover */
        color: #fff; /* White text color on hover */
    }
    #loginContainer {
        margin-top: 20px;
    }
    /* Gray container style */
    @keyframes fadeIn {
        from {
            opacity: 0; /* Start with opacity 0 */
        }
        to {
            opacity: 1; /* End with opacity 1 */
        }
    }
    .gray-container {
        display: none; /* Initially hide the gray container */
        background-color: #040F13; /* Gray background color */
        padding: 20px; /* Add padding */
        margin-top: 20px; /* Add top margin */
        max-width: 500px; /* Set maximum width */
        position: absolute; /* Position absolutely */
        top: 50%; /* Move to the middle vertically */
        right: 1%; /* Adjust the right position */
        transform: translateY(-50%); /* Center vertically */
        /* Additional styles */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        padding-top: 50px; /* Adjust padding top */
        padding-bottom: 20px; /* Adjust padding */
        animation: fadeIn 0.5s ease; /* Apply the animation */
    }
    .text {
        color: white; /* Change color of "Sign In" */
    }
    /* Reserve now button */
    .reserve-now {
        text-align: center; /* Center align text */
        margin-top: 20px; /* Add margin top */
    }
    /* Audio icon */
    .audio-icon {
        position: absolute;
        top: 10px; /* Adjust top position */
        right: 10px; /* Adjust right position */
        color: white; /* Icon color */
        font-size: 24px; /* Icon size */
    }
    .reserve-now button {
        background-color: #00ff00;
        color: #fff; /* Set text color to white */
        border-radius: 8px;
        padding: 12px 24px; /* Increase padding for larger button */
        font-size: 18px; /* Optional: Increase font size */
        border: 2px solid #00ff00; /* Set border color to match button color */
    }

    /* Media query for screens smaller than 768px (Bootstrap's small breakpoint) */
    @media (max-width: 767.98px) {
        header {
            flex-direction: column; /* Stack items vertically */
            height: 450px; /* Allow header height to adjust based on content */
            padding: 10px; /* Adjusted padding */
        }
        header img {
            height: 100px; /* Adjusted height for logo */
            
        }

        nav ul {
            text-align: center; /* Center align menu items */
            margin-top: 10px; /* Adjust margin */
        }
        nav ul li {
            display: block; /* Change to block display */
            margin: 10px 0; /* Adjust margin */
        }
        nav ul li:first-child {
            margin-top: 0; /* Reset margin */
        }
        .profile-icon {
            position: static; /* Reset position */
            margin-top: 10px; /* Adjust margin */
        }
        .gray-container {
            position: static; /* Reset position */
            top: auto; /* Reset top position */
            right: auto; /* Reset right position */
            transform: none; /* Reset transform */
            width: 90%; /* Adjust width */
            margin: 20px auto; /* Center horizontally with top margin */
        }
    }

    /* Media query for smaller tablets */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .gray-container {
            width: 70%; /* Adjust width */
        }
    }
    .audio-icon.playing::before {
            content: '\f028'; /* FontAwesome speaker icon */
            font-family: 'Font Awesome\ 5 Free';
            font-weight: 900;
            font-size: 24px;    
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .speaker-icon {
        position: absolute;
        top: 5px; /* Adjust top position */
        right: 5px; /* Adjust right position */
        width: 60px; /* Adjust width */
        height: auto; /* Maintain aspect ratio */
        z-index: 9999; /* Ensure it appears above other content */
    }
    @media (max-width: 575.98px) {
                header img {
                    height: 130px; /* Decrease logo size */
                }
                .centered-text {
                    left: 50%; /* Center the text horizontally */
                    transform: translateX(-50%) translateY(-50%); /* Center vertically and horizontally */
                }
                .profile-icon {
                    /* Reset position */
                    margin-top: -90px; /* Adjust margin */
                   
                    left: 520px;
                    
                }
                .gray-container {
                    position: static; /* Reset position */
                    top: auto; /* Reset top position */
                    right: auto; /* Reset right position */
                    transform: none; /* Reset transform */
                    width: 90%; /* Adjust width */
                    margin: 20px auto; /* Center horizontally with top margin */
                }
    .welcome-message {
        position: absolute;
        top: 94%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }


    </style>
    </head>
    <body>


    <header>
        <img src="assets/img/logo.png" alt="Logo">
        <div class="centered-text">
            <nav>
                <ul>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="sportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Available sports</a>
                        <ul class="dropdown-menu" aria-labelledby="sportsDropdown">
                            <li><a class="dropdown-item" href="#">Arnis</a></li>
                            <li><a class="dropdown-item" href="#">badminton</a></li>
                            <li><a class="dropdown-item" href="#">Billiard</a></li>
                            <li><a class="dropdown-item" href="#">Cornhole</a></li>
                            <li><a class="dropdown-item" href="#">Chess</a></li>
                            <li><a class="dropdown-item" href="#">Dart</a></li>
                            <li><a class="dropdown-item" href="#">Pickle Ball</a></li>
                            <li><a class="dropdown-item" href="#">Sepak takraw</a></li>
                            <li><a class="dropdown-item" href="#">Table tennis</a></li>   
                            <li><a class="dropdown-item" href="#">Taekwondo</a></li>  
                        </ul>
                    </li>
               
                    <li><a href="#">Support</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="locationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Our location</a>
                        <ul class="dropdown-menu" aria-labelledby="locationDropdown">
                            <li><a class="dropdown-item" href="https://www.google.com.ph/maps/place/Athlete+Event+Place/@14.2702578,121.0046655,17z/data=!3m1!4b1!4m6!3m5!1s0x33bd7d485454c201:0x64cd31fb87052134!8m2!3d14.2702526!4d121.0072458!16s%2Fg%2F11vm2kxqxt?entry=ttu">Google Map</a></li>
                            <li><a class="dropdown-item" href="https://www.waze.com/live-map/directions/ph/calabarzon/carmona/athlete-event-place?to=place.ChIJAcJUVEh9vTMRNCEFh_sxzWQ">Waze</a></li>
                            <!-- Add more locations here -->
                        </ul>
                    </li>
                    <li><a href="/reservation_system/reserve/userlog/create.php">Sign up</a></li>
                    <li><a href="#" class="login-button">Log In</a></li>
                </ul>
            </nav>
        </div>
        <!-- Add profile image here -->
        <div>
        <img src="assets/img/profile.png" alt="Profile" class="profile-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" <?php echo isset($_SESSION['status']) && $_SESSION['status'] === 'valid' ? '' : 'disabled'; ?>>
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'valid'): ?>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="header/userprofile.php">View profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="landpage/logout.php">Logout</a></li>
        </ul>
        <?php endif; ?>
    </div>

    
    </div>

    </div>
        <!-- Check if user is logged in -->
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'valid'): ?>
            <!-- If logged in, display welcome message with username -->
            <p class="welcome-message">Welcome, <?php echo $_SESSION['username']; ?>!</p>
            <!-- Display user email -->
            
        <?php endif; ?>
    </header>

    <div id="loginContainer"> <!-- Gray container -->
        <div class="gray-container" id="grayContainer"> 
        <img src="assets/icons/speakericon.gif" class="speaker-icon" alt="Speaker Icon"> <!-- Gray container -->
            <i class="fas fa-volume-up audio-icon"></i> <!-- Audio icon -->
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi impedit quam ipsam repudiandae, ab maxime provident? Quo porro voluptates saepe atque optio reiciendis facilis, tempore nam laboriosam et officiis quis expedita non ut doloribus aliquid molestias iure quae temporibus consequatur nihil. Aliquam sunt temporibus animi adipisci quae illo distinctio quisquam!.</p>
            <audio id="audioPlayer" controls autoplay loop>
                <source src="assets/audio/aepsong.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <div class="reserve-now"> <!-- Reserve now button -->
                <button class="btn btn-primary" id="reserveButton">Reserve Now</button>
            </div>
        </div
    
    </div>




    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome -->
    <script>
        // JavaScript to toggle the visibility of the container and audio playback when the login button is clicked
        document.querySelector('.login-button').addEventListener('click', function() {
            var grayContainer = document.getElementById('grayContainer');
            var audio = document.querySelector('audio'); // Select the audio element
            
            if (grayContainer.style.display === 'block') {
                grayContainer.style.display = 'none';
                audio.pause(); // Pause the audio
            } else {
                grayContainer.style.display = 'block';
                audio.play(); // Play the audio
            }
        });

        // JavaScript to redirect to the specified page after clicking the Reserve Now button
        document.getElementById('reserveButton').addEventListener('click', function() {
            window.location.href = '/reservation_system/reserve/userlog/index.php';
        });
    </script>


    </body>
    </html>
