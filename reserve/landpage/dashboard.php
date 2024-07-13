<?php session_start();

if ($_SESSION['status'] != 'valid') {
    header("Location: ../userlog/index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Bangers&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
      /* General Styles */
      body, html {
            font-family: "Tilt Neon", sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, white, #008000);
            height: 110%; /* Changed to 100% */
        }
        .main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            margin-top: 20px;
        }
        .container1 {
            width: 300px; /* Fixed width for all containers */
            text-align: center;
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .container1:hover {
            transform: translateY(-10px); /* Lift on hover */
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .random-text {
            background-color: #000;
            color: #fff;
            padding: 8px 0;
            margin-top: -10px;
            font-size: 20px;
            font-family: "Roboto Condensed", sans-serif;
            font-weight: bold;
        }
        .container1 img {
            width: 100%;
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Ensure the image covers the entire container */
            transition: filter 0.3s ease;
        }
        .container1:hover img {
            filter: brightness(0.8); /* Darken on hover */
        }
        .button-slide {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #00ff00;
            color: inherit;
            text-decoration: none;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            transition: opacity 0.3s ease, bottom 0.3s ease;
            opacity: 0;
        }
        .container1:hover .button-slide {
            bottom: 20px;
            opacity: 1;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 20%;
            text-align: center;
        }
        .modal-content p {
            margin-bottom: 20px;
        }
        .modal-content button {
            padding: 10px 20px;
            background-color: #00ff00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Header and Footer */
        header {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            height: 50px;
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
        }
        nav ul li:first-child {
            margin-left: 0;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        /* Footer */
        footer .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: black;
            color: #fff;
            padding: 10px 0;
            overflow: hidden;
            text-align: center;
        }

        /* Media Queries */
        @media screen and (max-width: 1024px) {
            .container1 {
                width: calc(50% - 20px); /* Two columns on tablets */
            }
        }
        @media screen and (max-width: 768px) {
            .container1 {
                width: 100%; /* Full width on smaller screens */
                max-width: none;
            }
            .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            text-align: center;
        }
        }
      li {
        text-align: left;
      }
    </style>
</head>
<body>
    <?php include '../header/navbar.php'; ?>
 
    <div class="main">
    <div class="container1">
            <div class="random-text">Arnis</div>
            <img src="../assets/img/arnis.jpg" alt="Arnis">
            <a href="../calendar/arnis.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Billiard</div>
            <img src="../assets/img/billiard.jpg" alt="Billiard">
            <a href="../calendar/billiard.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Badminton</div>
            <img src="../assets/img/badminton.jpg" alt="Badminton">
            <a href="../calendar/badminton.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Chess</div>
            <img src="../assets/img/chess.jpg" alt="Chess">
            <a href="../calendar/chess.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Dart</div>
            <img src="../assets/img/dart.jpg" alt="Dart">
            <a href="../calendar/dart.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Pickleball</div>
            <img src="../assets/img/pickleball.jpg" alt="Pickleball">
            <a href="../calendar/pickleball.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Sepak Takraw</div>
            <img src="../assets/img/sepaktakraw.jpg" alt="Sepak Takraw">
            <a href="../calendar/sepaktakraw.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Table Tennis</div>
            <img src="../assets/img/tabletennis.jpg" alt="Table Tennis">
            <a href="../calendar/tabletennis.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Taekwondo</div>
            <img src="../assets/img/taekwondo.jpg" alt="Taekwondo">
            <a href="../calendar/taekwondo.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Cornhole</div>
            <img src="../assets/img/cornhole.jpg" alt="Cornhole">
            <a href="../calendar/cornhole.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Basketball</div>
            <img src="../assets/img/basketball.jpg" alt="Cornhole">
            <a href="../calendar/basketball.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Judo</div>
            <img src="../assets/img/judo.jpg" alt="Cornhole">
            <a href="../calendar/judo.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Whole Venue</div>
            <img src="../assets/img/wholevenue.jpg" alt="Basketball">
            <a href="../calendar/wholevenue.php" class="button-slide">Click Here</a>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Terms and Conditions</h2>
            <ul>
                        <li>Observe cleanliness and orderliness.</li>
                        <li>Follow all safety guidelines and rules.</li>
                        <li>Stay hydrated and take necessary breaks.</li>
                    </ul>
                    <h3>Proper Attire:</h3>
                    <ul>
                        <li>Wear comfortable sports attire.</li>
                        <li>Use proper footwear.</li>
                        <li>Avoid loose clothing that may hinder movement.</li>
                    </ul>
                    <h3>Do's and Don'ts:</h3>
                    <ul>
                        <li>Respect other players and officials.</li>
                        <li>Listen to instructions carefully.</li>
                        <li>Avoid disruptive behavior.</li>
                    </ul>
            <button id="acceptButton">Accept and Proceed</button>
        </div>
    </div>
    <footer>
    <div class="footer">
        <p>&copy; 2024 Athlete Event Place. 📌Located at: CW, Sitio Ibaba, Brgy. Maguyam, Silang, Philippines.</p>
    </div>
</footer>
<script>
        // Get all 'Click Here' buttons
        const buttons = document.querySelectorAll('.button-slide');

        // Modal
        const modal = document.getElementById('modal');
        const acceptButton = document.getElementById('acceptButton');

        // Function to show modal
        function showModal() {
            modal.style.display = 'flex';
        }

        // Event listener for 'Click Here' buttons
        buttons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                // Show modal
                showModal();

                // Handle redirect after acceptance
                acceptButton.addEventListener('click', function() {
                    window.location.href = button.getAttribute('href');
                });
            });
        });

        // Close modal if clicked outside of modal content
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>

</body>
</html>
