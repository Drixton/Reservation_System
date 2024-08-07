<?php
require("conixion.php");
session_start();
if (empty($_SESSION['status'])) {
    $_SESSION['status'] = 'invalid';
}

$logged = false;
if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM adminlogs WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['status'] = 'valid';
            $_SESSION['email'] = $row['email'];
            $_SESSION['full_name'] = $row['full_name'];
        
            // Display alert message and redirect
            echo "<script>alert('Successful login');</script>";
            echo "<script>window.location.href='http://localhost/reservation_system/reserve/admin/pages/dashboard.php';</script>";
            exit();
        } else {
            header("Location: index.php?error=email or password not found");
            exit();
        }
        
    } else {
        header("Location: index.php?error=email or password not found");
        exit();
    }
}
if(!empty($_GET['logged'])){
    $logged = true;
}
$conn->close();
?>


    


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
            color: white; /* Added */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: white; /* Changed */
        }

        .btn-like {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(to bottom, #000, #333);
            color: white; /* Changed */
            text-decoration: none;
            border: 1px solid white; /* Changed */
            border-radius: 4px;
        }

        .btn-like:hover {
            background: linear-gradient(to bottom, #111, #444);
            color: white;
        }
        .bg-sign-in {
            background: linear-gradient(to right, black, #008000);
            background-size: cover; /* Ensure the background covers the entire container */
            background-repeat: no-repeat;
            background-position: center; /* Center the background image */
            min-height: 100vh;
        }


        .form-sign-in {
            background-color: rgba(128, 128, 128, 0.4); /* Adjust the alpha value (0.5 in this case) to set the transparency */
            padding: 20px;
            border-radius: 15px;
            color: white; /* Added */
        }


        .sign-in {
            font-family: "Anton", sans-serif; /* Change font family to your desired font */
            font-size: 24px; /* Adjust font size as needed */
            font-weight: bold; /* Optionally, make the text bold */
            color: lightgreen; 
        }
.con{
    display:flex;
    flex-direction:row;
    align-items:center;
}

    </style>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="TRACK-WISE/asset/icon.png" type="../image/x-icon">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
</head> 
<body>

<main class="bg-sign-in d-flex justify-content-center align-items-center">
    <div class="form-sign-in bg-#C0C0C0 mt-2 h-auto mb-2 text-center pt-2 pe-4 ps-4 d-flex flex-column">

        <div>
            <h2 class="sign-in text-uppercase">ADMIN LOGIN</h2>

        </div>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "please enter your email or password"){
                echo '<div class="alert alert-danger" role="alert">
                            please enter your Email or Password try again
                        </div>';
            }
            elseif($_GET['error'] == "email or password not found"){
                echo '<div class="alert alert-danger" role="alert">
                            please enter your Email or Password try again
                        </div>';
            }
        }
        ?>
        <form id="signInForm" method="POST" action="">
            <div class="mb-3 mt-3 text-start">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email']; }?>">
            </div>
            <div class="mb-3 text-start">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Insert Password" name="pass" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password']; }?>" autocomplete="on" onmouseover="showTooltip()" onmouseout="hideTooltip()">
                <div id="tooltip" style="display: none; color: blue;">Minimum 8 characters</div>
            </div>


            <button type="submit" name="submit" class="btn-like">Sign In</button>
            <a class="btn-like" href="/reservation_system/reserve/index.php">Home</a>
            <br><br>
        </form>
    </div>
</main>
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
<?php if($logged): ?>
<script type="text/javascript">
    window.onload = () => {
      const myModal = new bootstrap.Modal('#staticBackdrop');
      myModal.show();
    }
</script>
<?php endif?>
<script src="./js/validation.js"></script>
</body>
</html>