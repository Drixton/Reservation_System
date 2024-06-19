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
            background-image: linear-gradient(to right, green, black);

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
        .hero-section {
    background: url('assets/img/sports-bg.jpg') no-repeat center center/cover;
    height: 80vh;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    margin-bottom: 30px;
}


        .hero-section h1 {
            font-size: 4em;
            margin: 0;
        }

        .hero-section p {
            font-size: 1.5em;
           
        }
        @keyframes moveUpDown {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.category-heading {
    animation: moveUpDown 2s ease-in-out infinite;
}
@keyframes changeColor {
    0% { color: orange; }
    33% { color: blue; }
    66% { color: green; }
    100% { color: orange; }
}

.category-heading span {
    animation: changeColor 6s linear infinite;
}


    </style>
</head>
<body>
<?php include 'header/headbar.php'; ?> 
<div class="hero-section">
<h1 class="category-heading">Welcome to <span>Athlete Event Place</span></h1>


    <p >Your ultimate destination for all things sports</p>
    <a href="/userlog/index.php" class="btn btn-primary">Explore Now</a>
</div>



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
