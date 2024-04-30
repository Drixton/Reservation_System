<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Profile Icon</title>
    <style>
        header {
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

        .centered-text {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

      
    </style>
</head>
<body>

<header>
    <img src="../assets/img/logo.png" alt="Logo">
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
