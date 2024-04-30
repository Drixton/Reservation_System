<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<main class="bg-sign-in d-flex justify-content-center align-items-center">
    <div class="form-sign-in bg-#C0C0C0 mt-2 h-auto mb-2 text-center pt-2 pe-4 ps-4 d-flex flex-column">

        <div>
            <h2 class="sign-in text-uppercase">CREATE ACCOUNT</h2>
        </div>

        <!-- Registration form -->
        <form id="registerForm" method="POST" action="register.php">
            <div class="mb-3 mt-3 text-start">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3 text-start">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
            </div>

            <button type="submit" name="submit" class="btn-like">Register</button>
            <a class="btn-like" href="/TRACK-WISE/login.php">Back to Login</a>
            <br><br>
        </form>
    </div>
</main>

<script src="./js/bootstrap.bundle.js"></script>
</body>
</html>
