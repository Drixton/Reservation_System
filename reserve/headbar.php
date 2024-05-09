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
                <li><a href="#">Promo</a></li>
                <li><a href="#">Support</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="locationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Our location</a>
                    <ul class="dropdown-menu" aria-labelledby="locationDropdown">
                        <li><a class="dropdown-item" href="https://www.google.com/maps/@14.3917056,120.9532416,13z?entry=ttu">Google Map</a></li>
                        <li><a class="dropdown-item" href="https://www.waze.com/live-map/">Waze</a></li>
                        <!-- Add more locations here -->
                    </ul>
                </li>
                <li><a href="#">Sign In</a></li>
                <li><a href="#" class="login-button">Log In</a></li>
            </ul>
        </nav>
    </div>
</header>

<div id="loginContainer"> <!-- Gray container -->
    <div class="gray-container" id="grayContainer"> 
    <img src="assets/icons/speakericon.gif" class="speaker-icon" alt="Speaker Icon"> <!-- Gray container -->
        <i class="fas fa-volume-up audio-icon"></i> <!-- Audio icon -->
        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi impedit quam ipsam repudiandae, ab maxime provident? Quo porro voluptates saepe atque optio reiciendis facilis, tempore nam laboriosam et officiis quis expedita non ut doloribus aliquid molestias iure quae temporibus consequatur nihil. Aliquam sunt temporibus animi adipisci quae illo distinctio quisquam!.</p>
        <audio id="audioPlayer" controls autoplay loop>
            <source src="assets/audio/welcome.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div class="reserve-now"> <!-- Reserve now button -->
            <button class="btn btn-primary" id="reserveButton">Reserve Now</button>
        </div>
    </div>
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
