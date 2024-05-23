<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/landpage.css">     
    <style>
        body {
            background-color: #040F13;
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        
        main {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .category {
            text-align: center;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 1.2em;
            text-transform: uppercase;
            cursor: pointer;
        }

        .category:hover {
            background-color: #0056b3;
        }

        .image-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            margin-bottom: 20px;
        }

        .image-container img {
            width: 300px;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .image-container img:hover {
            transform: scale(1.05);
        }

        nav {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.2em;
            text-transform: uppercase;
            cursor: pointer;
        }

        nav a:hover {
            color: #f0f0f0;
        }

        @media only screen and (max-width: 768px) {
            .image-container {
                flex-wrap: wrap;
                justify-content: center;
            }

            .image-container img {
                width: 100%;
                max-width: 300px;
            }
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            display: none;
            z-index: 999;
        }
    </style>
</head>
<body>
<?php include 'header/headbar.php'; ?> 

<nav>
    <a href="#badminton">Badminton</a>
    <a href="#arnis">Arnis</a>
    <a href="#billiard">Billiard</a>
    <a href="#taekwondo">Taekwondo</a>
    <a href="#pickleball">Pickleball</a>
    <a href="#sepaktakraw">Sepak Takraw</a>
    <a href="#cornhole">Cornhole</a>
    <a href="#chess">Chess</a>
    <a href="#tabletennis">Table Tennis</a>
    <a href="#dart">Dart</a>
</nav>

<main>
    <a href="#badminton" class="category">Badminton</a>
    <div id="badminton" class="image-container">
        <img src="assets/img/badminton.jpg" alt="Badminton Image 1">
        <img src="assets/img/badminton.jpg" alt="Badminton Image 2">
        <img src="assets/img/badminton.jpg" alt="Badminton Image 3">
    </div>
    
    <a href="#arnis" class="category">Arnis</a>
    <div id="arnis" class="image-container">
        <img src="assets/img/arnis.jpg" alt="Arnis Image 1">
        <img src="assets/img/arnis.jpg" alt="Arnis Image 2">
        <img src="assets/img/arnis.jpg" alt="Arnis Image 3">
    </div>

    <a href="#billiard" class="category">Billiard</a>
    <div id="billiard" class="image-container">
        <img src="assets/img/billiard.jpg" alt="Billiard Image 1">
        <img src="assets/img/billiard.jpg" alt="Billiard Image 2">
        <img src="assets/img/billiard.jpg" alt="Billiard Image 3">
    </div>

    <a href="#taekwondo" class="category">Taekwondo</a>
    <div id="taekwondo" class="image-container">
        <img src="assets/img/taekwondo.jpg" alt="Taekwondo Image 1">
        <img src="assets/img/taekwondo.jpg" alt="Taekwondo Image 2">
        <img src="assets/img/taekwondo.jpg" alt="Taekwondo Image 3">
    </div>

    <a href="#pickleball" class="category">Pickleball</a>
    <div id="pickleball" class="image-container">
        <img src="assets/img/pickleball.jpg" alt="Pickleball Image 1">
        <img src="assets/img/pickleball.jpg" alt="Pickleball Image 2">
        <img src="assets/img/pickleball.jpg" alt="Pickleball Image 3">
    </div>

    <a href="#sepaktakraw" class="category">Sepak Takraw</a>
    <div id="sepaktakraw" class="image-container">
        <img src="assets/img/sepaktakraw.jpg" alt="Sepak Takraw Image 1">
        <img src="assets/img/sepaktakraw.jpg" alt="Sepak Takraw Image 2">
        <img src="assets/img/sepaktakraw.jpg" alt="Sepak Takraw Image 3">
    </div>

    <a href="#cornhole" class="category">Cornhole</a>
    <div id="cornhole" class="image-container">
        <img src="assets/img/cornhole.jpg" alt="Cornhole Image 1">
        <img src="assets/img/cornhole.jpg" alt="Cornhole Image 2">
        <img src="assets/img/cornhole.jpg" alt="Cornhole Image 3">
    </div>

    <a href="#chess" class="category">Chess</a>
    <div id="chess" class="image-container">
       
    <img src="assets/img/chess.jpg" alt="Chess Image 1">
        <img src="assets/img/chess.jpg" alt="Chess Image 2">
        <img src="assets/img/chess.jpg" alt="Chess Image 3">
    </div>

    <a href="#tabletennis" class="category">Table Tennis</a>
    <div id="tabletennis" class="image-container">
        <img src="assets/img/tabletennis.jpg" alt="Table Tennis Image 1">
        <img src="assets/img/tabletennis.jpg" alt="Table Tennis Image 2">
        <img src="assets/img/tabletennis.jpg" alt="Table Tennis Image 3">
    </div>

    <a href="#dart" class="category">Dart</a>
    <div id="dart" class="image-container">
        <img src="assets/img/dart.jpg" alt="Dart Image 1">
        <img src="assets/img/dart.jpg" alt="Dart Image 2">
        <img src="assets/img/dart.jpg" alt="Dart Image 3">
    </div>
</main>
<footer>
    <p>Email: example@example.com</p>
    <p>Contact: +1234567890</p>
</footer>

<script>
    window.addEventListener('scroll', function() {
        var footer = document.getElementById('footer');
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            footer.style.display = 'block';
        } else {
            footer.style.display = 'none';
        }
    });
</script>

</body>
</html>
