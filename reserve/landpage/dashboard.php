<?php session_start(); ?>
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
    <style>
        /* General Styles */
        body, html {
            font-family: "Tilt Neon", sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, white, #008000);
            height: 100%;
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
            width: calc(33.33% - 20px); /* Three columns on desktop */
            max-width: 300px;
            text-align: center;
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
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
        }
        .container1 img {
    width: 100%;
    height: 100%;
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
        }
    </style>
</head>
<body>
    <?php include '../header/navbar.php'; ?>
 
    <div class="main">
        <div class="container1">
            <div class="random-text">Arnis</div>
            <img src="../assets/img/arnis.jpg" alt="Arnis">
            <a href="/reservation_system/reserve/calendar/arnis.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Billiard</div>
            <img src="../assets/img/billiard.jpg" alt="Billiard">
            <a href="/reservation_system/reserve/calendar/billiard.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Badminton</div>
            <img src="../assets/img/badminton.jpg" alt="Badminton">
            <a href="/reservation_system/reserve/calendar/badminton.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Chess</div>
            <img src="../assets/img/chess.jpg" alt="Chess">
            <a href="/reservation_system/reserve/calendar/chess.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Dart</div>
            <img src="../assets/img/dart.jpg" alt="Dart">
            <a href="/reservation_system/reserve/calendar/dart.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Pickleball</div>
            <img src="../assets/img/pickleball.jpg" alt="Pickleball">
            <a href="/reservation_system/reserve/calendar/pickleball.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Sepak Takraw</div>
            <img src="../assets/img/sepaktakraw.jpg" alt="Sepak Takraw">
            <a href="/reservation_system/reserve/calendar/sepaktakraw.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Table Tennis</div>
            <img src="../assets/img/tabletennis.jpg" alt="Table Tennis">
            <a href="/reservation_system/reserve/calendar/tabletennis.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Taekwondo</div>
            <img src="../assets/img/taekwondo.jpg" alt="Taekwondo">
            <a href="/reservation_system/reserve/calendar/taekwondo.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">Cornhole</div>
            <img src="../assets/img/cornhole.jpg" alt="Cornhole">
            <a href="/reservation_system/reserve/calendar/cornhole.php" class="button-slide">Click Here</a>
        </div>
    </div>
    <footer>
    <div class="footer">
        <p>&copy; 2024 Athlete Event Place. 📌Located at: CW, Sitio Ibaba, Brgy. Maguyam, Silang, Philippines.</p>
    </div>
</footer>
>

</body>
</html>
