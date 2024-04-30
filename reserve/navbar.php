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
            background-color: #000; /* Set header background color to black */
            color: #fff;
            padding: 1px 20px; /* Adjusted padding */
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative; /* Position the profile icon relative to the header */
            height: 120px; /* Set fixed height for the header */
        }

        header img {
            height: 100px; /* Adjusted height */
            transition: transform 0.3s; /* Add transition for smooth effect */
        }
        header img:hover {
            transform: scale(1.5); /* Enlarge the logo on hover */
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
            position: relative; /* Set position to relative for dropdown */
        }

        nav ul li:first-child {
            margin-left: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 40px; /* Adjust font size */
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
            top: 1;
            left: 50%;
            transform: translateX(-50%);
        }
        .prifle{
            width:40px;
            height:40px
        }
    
    </style>
</head>
<body>

<header>
    <img src="../assets/img/logo.png" alt="Logo">
    <div class="dropdown">
    <img src="../assets/img/profile.png" alt="Logo2" class="prifle dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> 
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">View profle</a></li>
    <li><a class="dropdown-item" href="#">test</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
  </ul>
</div>
    <div class="centered-text">
        <nav>
            <ul>
                <li><a href="#">CHOOSE YOUR SPORT</a></li>
            </ul>
        </nav>
    </div>

</header>

</body>
</html>
