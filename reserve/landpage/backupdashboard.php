<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    body {
        font-family: "Anton", sans-serif;
  
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
    width: 16%; /* Set the width of each container */
    height: 550px; /* Set the height of each container */
    background-size: cover;
    background-position: center;
    display: inline-block;
    margin: 0; /* Adjusted margin to remove space */
    border: 2px solid #fff; /* Add border */
    border-radius: 10px; /* Add border-radius */
    position: relative;
    overflow: hidden;
    transition: transform 0.3s, filter 0.3s; /* Add transition for smooth effect */
    filter: blur(2px); /* Add blur to make slightly blurred */
}

.container:hover {
    transform: scale(1.1); /* Scale up by 10% when hovered over */
    filter: none; /* Remove blur on hover */
}

.container:hover .random-text {
    font-size: 50px; /* Enlarge the text size on hover */
}

    .container:nth-child(1) {
        background: url('badminton.jpg'); /* Change background to the image */
        background-size: cover;
    }

    .container:nth-child(2) {
        background: url('dart.jpg'); /* */
        background-size: cover;
    }

    .container:nth-child(3) {
        background: url('billiard.jpg'); /* en */
        background-size: cover;
    }

    .container:nth-child(4) {
        background: url('tabletennis.jpg'); /* le */
        background-size: cover;
    }

    .container:nth-child(5) {
        background: url('sepak.jpeg'); 
        background-size: cover;
    }

    .container:nth-child(6) {
        background: url('taek.jpeg'); /* /* Yellow */
        background-size: cover;
    }

    .random-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        color: #39FF14.; /* Change text color to green */
        font-size: 40px;
        text-shadow: 0 0 5px #0f0, 0 0 10px #0f0, 0 0 15px #0f0; /* Add text shadow for glowing effect */
        animation: glow 1.5s infinite alternate; /* Add animation for glowing effect */
    }

    @keyframes glow {
        from {
            text-shadow: 0 0 5px #0f0, 0 0 10px #0f0, 0 0 15px #0f0; /* Initial text shadow */
        }
        to {
            text-shadow: 0 0 10px #0f0, 0 0 20px #0f0, 0 0 30px #0f0; /* Final text shadow */
        }
    }
    </style>
</head>
<body>
    <?php include '../navbar.php'; ?> 
    <main>
        <!-- Your main content here -->
        <div class="container">
            <div class="random-text">BADMINTON </div>
        </div>
        <div class="container">
            <div class="random-text">DART</div>
        </div>
        <div class="container">
            <div class="random-text">BILLIARD</div>
        </div>
        <div class="container">
            <div class="random-text">TABLE TENNIS</div>
        </div>
        <div class="container">
            <div class="random-text">BILLIARD</div>
        </div>
        <div class="container">
            <div class="random-text">TAEKWONDO</div>
        </div>
    </main>
</body>
</html>
