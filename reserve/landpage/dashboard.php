<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboardssss</title>
    <style>
    body {
        font-family: "Tilt Neon", sans-serif;
        margin: 0;
        padding: 0;
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

    /* Container styles */
  /* Container styles */
.container1 {
    position: relative; /* Add position relative */
    width: 220px;
    height: 500px; /* Set the height of each container */
    background-size: cover;
    background-position: center;
    display: inline-block;
    margin: 0; /* Adjusted margin to remove space */
    border: 2px solid #fff; /* Add border */
    border-radius: 10px; /* Add border-radius */
    overflow: hidden;
    transition: transform 0.1s; /* Add transition for smooth effect */
    max-width: 320px;
}

.container1:hover {
    transform: scale(1.1); /* Scale up by 10% when hovered over */
}

.container1:hover .random-text {
    font-size: 50px; /* Enlarge text size on hover */
    color: black; /* Change text color to white on hover */
}

.container1:hover img {
    filter: blur(5px) brightness(0.5); /* Blur and darken image on hover */
}

.random-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-45deg);
    color: black; /* Change text color to green */
    font-size: 40px;
    text-shadow: 0 0 5px black, 0 0 10px #0f0, 0 0 15px black; /* Add text shadow for glowing effect */
    animation: glow 1.5s infinite alternate; /* Add animation for glowing effect */
    transition: font-size 0.3s; /* Add transition for smooth font-size change */
    z-index: 1; /* Bring text to the forefront */
}

@keyframes glow {
    from {
        text-shadow: 0 0 5px #0f0, 0 0 10px #0f0, 0 0 15px #0f0; /* Initial text shadow */
    }
    to {
        text-shadow: 0 0 10px #0f0, 0 0 20px #0f0, 0 0 30px #0f0; /* Final text shadow */
    }
}

/* Image styles */
.container1 img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Make sure the image covers the whole container */
    display: block;
    position: relative; /* Add position relative */
    z-index: 0; /* Ensure image is behind text initially */
}

@media screen and (max-width: 520px) {
    .container1 {
        width: 100%;
    }
}

    </style>
</head>
<body>
    <?php include '../navbar.php'; ?> 
    <div class="main">
        <!-- Your main content here -->

        <div class="container1">
            <div class="random-text">BADMINTON</div>
            <img src="../assets/img/badminton.jpg" alt="Badminton">
        </div>
        <div class="container1">
            <div class="random-text">DART</div>
            <img src="../assets/img/dart.jpg" alt="Dart">
        </div>
        <div class="container1">
            <div class="random-text">BILLIARD</div>
            <img src="../assets/img/billiard.jpg" alt="Billiard">
        </div>
        <div class="container1">
            <div class="random-text">TABLE TENNIS</div>
            <img src="../assets/img/tabletennis.jpg" alt="Table Tennis">
        </div>
        <div class="container1">
            <div class="random-text">PICKLEBALL</div>
            <img src="../assets/img/pickleball.jpg" alt="Pickleball">
        </div>
        <div class="container1">
            <div class="random-text">TAEKWONDO</div>
            <img src="../assets/img/taekwondo.jpg" alt="Taekwondo">
        </div>
        <div class="container1">
            <div class="random-text">SEPAK TAKRAW</div>
            <img src="../assets/img/sepaktakraw.jpg" alt="Taekwondo">
        </div>
    </div>
</body>
</html>
