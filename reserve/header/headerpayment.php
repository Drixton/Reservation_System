<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Header with Profile Icon</title>
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
            left: 600px; /* Push the text to the right */
            transform: translateY(-50%); /* Center vertically */
        }
        .prifle{
            width:40px;
            height:40px
        }

        /* Echoing welcome message style */
        .welcome-message {
            position: absolute;
            bottom: 0;
            right: 20px;
            color: white;
            margin-bottom: 5px;
        }
      
    </style>
</head>
<body>

<header>
    <a href="http://localhost/reservation_system/reserve/">
        <img src="../assets/img/logo.png" alt="Logo">
    </a>
    <div class="dropdown">
        <img src="../assets/img/profile.png" alt="Logo2" class="prifle dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> 
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">View profile</a></li>
            <li><a class="dropdown-item" href="#">test</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- Check if user is logged in -->
    <?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'valid'): ?>
        <!-- If logged in, display welcome message with username -->
        <p class="welcome-message">Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <?php endif; ?>
    <div class="centered-text">
        <nav>
            <ul>
                <li><a href="#" id="sportText" class="center">Payment</a></li>
            </ul>
        </nav>
    </div>

</header>

<script>
    setInterval(changeColor, 1000);

    function changeColor() {
        var colors = ['#FF0000', '#FFA500', '#008000', '#0000FF']; // Red, Orange, Green, Blue
        var sportText = document.getElementById('sportText');
        var randomColor = colors[Math.floor(Math.random() * colors.length)];
        sportText.style.color = randomColor;
    }
</script>

</body>
</html>
