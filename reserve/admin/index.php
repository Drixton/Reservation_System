<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            padding: 10px;
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .btn-like {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(to bottom, #000, #333);
            color: #fff;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 4px;
        }

        .btn-like:hover {
            background: linear-gradient(to bottom, #111, #444);
            color: white;
        }
    </style>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Sign-in</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">  
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
</head>
<body>
    <main class="bg-sign-in d-flex justify-content-center align-items-center">
        <div class="form-sign-in bg-white mt-2 h-auto mb-2 text-center pt-2 pe-4 ps-4 d-flex flex-column">
 <div>
          <h2 class="sign-in text-uppercase">ADMIN</h2>
       
        </div>           
		   <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "please enter your email or password"){
                        echo '<div class="alert alert-danger" role="alert">
                            please enter your Student ID or MPIN try again
                        </div>';
                    }
                    elseif($_GET['error'] == "email or password not found"){
                        echo '<div class="alert alert-danger" role="alert">
                            please enter your Student ID or MPIN try again
                        </div>';
                    }
                }    
            ?>
            <form id="signInForm" method="POST" action="login.php">
                <div class="mb-3 mt-3 text-start">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email']; }?>">
                </div>
                <div class="mb-3 text-start">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pass" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password']; }?>" autocomplete="on" onmouseover="showTooltip()" onmouseout="hideTooltip()">
                    <div id="tooltip" style="display: none; color: blue;">Minimum 8 characters</div>
                </div>
                
                <button type="submit" name="submit" class="btn-like">Sign In</button>
                <a class="btn-like" href="/reservation_system/reserve/">Home</a>
                 <br><br>
            </form>
        </div>
    </main>

                <!-- for background animate -->
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
                <div class="firefly"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("signInForm");
            form.addEventListener("keydown", function (event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    document.querySelector(".btn-like").click();
                }
            });
        });
        function showTooltip() {
            document.getElementById("tooltip").style.display = "block";
        }
        function hideTooltip() {
            document.getElementById("tooltip").style.display = "none";
        }
        function validateMPIN() {
            var mpin = document.getElementById("pwd").value;
            if (mpin.length < 8) {
                alert("MPIN must be at least 8 characters long");
                return false;
            }
            return true;
        }
    </script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="./js/validation.js"></script>
</body>
</html>
