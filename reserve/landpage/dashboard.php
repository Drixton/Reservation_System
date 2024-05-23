<?php
// Start session
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport list</title>
   <style>
body, html {
    font-family: "Tilt Neon", sans-serif;
    margin: 0;
    padding: 0;
    height: 100%; /* Set height to cover the entire viewport */
    background: linear-gradient(to bottom, #000, #008000); /* Gradient from black to green */
}

header {
    background-color: #000; /* Set header background color to black */
    color: #fff;
    padding: 1px 20px; /* Adjusted padding */
    display: flex;
    justify-content: space-between;
    align-items: center;
}




    header img {
        height: 100px; /* Adjusted height */
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
    .button {
        background-color: blue;
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-left: -700px;
    }
    .button:first-child {
        margin-left: 0; /* Remove margin from the first button */
    }
    .button:hover {
        background-color: red; /* Change background color to red on hover */
    }
    .buttos {
        background-color: blue;
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-left: -800px;
    }
    .buttos:first-child {
        margin-left: 248px; 
        margin-top: 30px;/* Remove margin from the first button */
    }
    .buttos:hover {
        background-color: red; /* Change background color to red on hover */
    }
    .buttons {
        background-color: blue;
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 10px;
        margin-bottom: 40px ;
    }
    .buttons:first-child {
        margin-left: 0; /* Remove margin from the first button */
    }
    .buttons:hover {
        background-color: red; /* Change background color to red on hover */
    }
    h1 {
        margin-left: 18%;
        margin-top: 100px;
        font-size: 3.5em; /* Adjust the font size as needed */
        animation: moveUpDown 5s infinite; /* Apply animation */
    }
    p {
        margin-left: 18%;
    }

    @keyframes moveUpDown {
        0% {
            transform: translateY(0); /* Start at original position */
        }
        50% {
            transform: translateY(-20px); /* Move up */
        }
        100% {
            transform: translateY(0); /* Move back down */
        }
    }

    /* Footer styles moved here */
    footer .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: black;
        color: #fff;
        padding: 10px 0;
        overflow: hidden;
    }
    footer .footer img {
        max-width: 100px;
        height: auto;
        margin: 0 10px;
        animation: moveLeftToRight 10s linear infinite;
    }
    @keyframes moveLeftToRight {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(calc(100vw + 100%));
        }
    }

    @media screen and (max-width: 520px) {
    .container1 {
        width: 100%; /* Adjust width for responsiveness */
        height: auto; /* Adjust height to auto to maintain aspect ratio */
        margin-bottom: 20px; /* Add margin at the bottom of each container */
    }

    .container1:hover {
        width: 100%; /* Remove width expansion on hover */
    }

    .random-text {
        font-size: 20px; 
        color: white;/* Adjust font size for smaller screens */
    }

    .container1 img {
        width: 100%; /* Set image width to 100% for responsiveness */
        height: auto; /* Set image height to auto to maintain aspect ratio */
        object-fit: cover; /* Maintain aspect ratio and cover container */
    }
}

@media screen and (min-width: 521px) {
    @media screen and (min-width: 521px) {
    .main {
        display: flex; /* Use flexbox to arrange containers in a row */
        flex-wrap: nowrap; /* Prevent containers from wrapping */
        overflow-x: auto; /* Enable horizontal scrolling if containers exceed viewport width */
        background: linear-gradient(to bottom, #000, #008000); /* Gradient from black to green */
    }

    .container1 {
        position: relative;
        width: 23%; /* Set percentage width for each container */
        max-width: 240px; /* Set max-width for larger screens */
        height: 600px; /* Set height to auto to maintain aspect ratio */
        background-size: cover;
        background-position: center;
        margin: 0 1%; /* Add margin between containers */
        margin-bottom: 20px; /* Add margin at the bottom of each container */
        border: 2px solid #fff;
        border-radius: 10px;
        overflow: hidden;
        transition: width 0.3s ease, transform 0.3s ease; /* Added transform transition */
    }

    .container1:first-child {
        margin-left: 0; /* Remove left margin from the first container */
    }

    .container1:hover {
        width: 46%; /* Expand width on hover */
    }

    .container1:hover .random-text {
        font-size: 50px;
        color: black;
    }

    .container1:hover img {
        filter: blur(5px) brightness(0.5);
    }

    .random-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        color: orange;
        font-size: 25px;
        text-shadow: 0 0 5px black, 0 0 10px #0f0, 0 0 15px black;
        animation: glow 1.5s infinite alternate;
        transition: font-size 0.3s;
        z-index: 1;
    }

    .container1 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        position: relative;
        z-index: 0;
    }

    .button-slide {
        position: absolute;
        bottom: 10px; /* Adjusted initial position */
        left: 50%;
        transform: translateX(-50%);
        background-color:#00ff00;
        color: inherit; /* Ensures that text color matches its parent */
    text-decoration: none;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: opacity 0.3s ease, bottom 0.3s ease; /* Added opacity transition */
        opacity: 0; /* Initially hidden */
    }

    .container1:hover .button-slide {
        bottom: 30px; /* Slide up on hover */
        opacity: 1; /* Show button on hover */
    }
}




   </style>
</head>
<body>
<?php 
// Include navbar
include '../header/navbar.php'; 


?>  
    <div class="main">
    <div class="container1">
            <div class="random-text">Arnis</div>
            <img src="../assets/img/arnis.jpg" alt="Arnis">
            <a href="/reservation_system/reserve/calendar/arnis.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">BILLIARD</div>
            <img src="../assets/img/billiard.jpg" alt="Billiard">
            <a href="/reservation_system/reserve/calendar/billiard.php" class="button-slide">Click Here</a>
        </div>
    <div class="container1">
    <div class="random-text">BADMINTON</div>
    <img src="../assets/img/badminton.jpg" alt="Badminton">
    <a href="/reservation_system/reserve/calendar/badminton.php" class="button-slide">Click Here</a>
</div>
<div class="container1">
            <div class="random-text">Chess</div>
            <img src="../assets/img/chess.jpg" alt="Chess">
            <a href="/reservation_system/reserve/calendar/chess.php" class="button-slide">Click Here</a>
        </div>
        
        <div class="container1">
            <div class="random-text">DART</div>
            <img src="../assets/img/dart.jpg" alt="Dart">
            <a href="/reservation_system/reserve/calendar/dart.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">PICKLEBALL</div>
            <img src="../assets/img/pickleball.jpg" alt="Pickleball">
            <a href="/reservation_system/reserve/calendar/pickleball.php" class="button-slide">Click Here</a>
        </div>
        <div class="container1">
            <div class="random-text">SEPAK TAKRAW</div>
            <img src="../assets/img/sepaktakraw.jpg" alt="Sepak Takraw">
            <a href="/reservation_system/reserve/calendar/sepaktakraw.php" class="button-slide">Click Here</a>
        </div>
   
        <div class="container1">
            <div class="random-text">TABLE TENNIS</div>
            <img src="../assets/img/tabletennis.jpg" alt="Table Tennis">
            <a href="/reservation_system/reserve/calendar/tabletennis.php" class="button-slide">Click Here</a>
        </div>
      
        <div class="container1">
            <div class="random-text">TAEKWONDO</div>
            <img src="../assets/img/taekwondo.jpg" alt="Taekwondo">
            <a href="/reservation_system/reserve/calendar/taekwondo.php" class="button-slide">Click Here</a>
        </div>
      
        <div class="container1">
            <div class="random-text">Cornhole</div>
            <img src="../assets/img/cornhole.jpg" alt="Cornhole">
            <a href="/reservation_system/reserve/calendar/cornhole.php" class="button-slide">Click Here</a>
        </div>
      
    </div>
</body>
</html>
