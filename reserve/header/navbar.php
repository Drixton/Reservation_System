<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Header with Profile Icon</title>
    <style>
        header {
            background-color: #040F13;
            color: #fff;
            padding: 1px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            height: 120px;
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

        .prifle {
            position: absolute;
            top: -15px;
            right: 20px;
            height: 40px;
            border-radius: 50%;
        }

        .centered-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .welcome-message {
            position: absolute;
            bottom: 0;
            right: 30px;
            color: white;
            margin-bottom: 5px;
        }

        @media only screen and (max-width: 600px) {
       header img {
            height: 100px;
            transition: transform 0.3s;
            margin-left:-20px;
        }

        header img:hover {
            transform: scale(1.5);
        }
            nav ul li {
                display: block;
                margin-left: 0;
                text-align: center;
            }

            nav ul li:first-child {
                margin-top: 20px;
            }

            nav ul li a {
                font-size: 24px;
            }
        }
           .prifle {
            position: absolute;
            top: -20px;
            right: 10px;
            height: 50px;
            border-radius: 50%;
        }
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
        <a href="/reservation_system/reserve/index.php">
            <img src="../assets/img/logo.png" alt="Logo">
        </a>
        <div class="dropdown">
            <img src="../assets/img/profile.png" alt="Logo2" class="prifle dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false">
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">View profile</a></li>
                <li><a class="dropdown-item" href="#">test</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </div>
        <!-- Check if user is logged in -->
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'valid') : ?>
            <!-- If logged in, display welcome message with username -->
            <p class="welcome-message"> <?php echo $_SESSION['username']; ?>!</p>
        <?php endif; ?>
        <div class="centered-text">
            <nav>
                <ul>
                    <li><a href="#" id="sportText" class="center">RESERVE NOW!</a></li>
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