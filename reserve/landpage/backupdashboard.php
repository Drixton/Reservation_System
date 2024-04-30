<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    .container {
        width: 100%; /* Set the width to 100% for responsiveness */
        height: 200px; /* Adjusted height */
        background-size: cover;
        background-position: center;
        display: block; /* Changed to block for stacking on mobile */
        margin-bottom: 20px; /* Added margin bottom for spacing */
        border: 2px solid #fff; /* Add border */
        border-radius: 10px; /* Add border-radius */
        position: relative;
        overflow: hidden;
        transition: transform 0.3s; /* Add transition for smooth effect */
    }

    .container:hover {
        transform: scale(1.1); /* Scale up by 10% when hovered over */
    }

    .container:nth-child(odd) {
        background-color: #ff5733; /* Orange */
    }

    .container:nth-child(even) {
        background-color: #3498db; /* Blue */
    }

    .random-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        color: #fff;
        font-size: 20px;
    }

    @media only screen and (min-width: 768px) {
        .container {
            width: 30%; /* Set a smaller width for larger screens */
            height: 300px; /* Adjusted height for larger screens */
        }

        .random-text {
            font-size: 24px; /* Adjusted font size for larger screens */
        }

        .container:nth-child(odd),
        .container:nth-child(even) {
            float: left;
            clear: none;
            margin-right: 2%; /* Adjusted margin between containers */
            width: 48%; /* Adjusted width to fit two containers in a row */
        }

        .container:nth-child(2n) {
            margin-right: 0; /* Remove margin from even-indexed containers */
        }
    }
    </style>
</head>
<body>
    <?php include '../navbar.php'; ?> 
    <main>
        <!-- Your main content here -->
        <div class="container">
            <div class="random-text">SEPAK TAKRAW</div>
        </div>
        <div class="container">
            <div class="random-text">BADMINTON</div>
        </div>
        <div class="container">
            <div class="random-text">TAEKWONDO</div>
        </div>
        <div class="container">
            <div class="random-text">ARNIS</div>
        </div>
        <div class="container">
            <div class="random-text">BILLIARD</div>
        </div>
        <div class="container">
            <div class="random-text">TABLE TENNIS</div>
        </div>
    </main>
</body>
</html>
