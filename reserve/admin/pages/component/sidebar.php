<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['logout'])) {
    $email = $_SESSION['email'];
    $logout_time = date("Y-m-d H:i:s");
    $update_query = "UPDATE adminlogs SET time_out = '$logout_time' WHERE email = '$email'";
    $conn->query($update_query);

    session_destroy();
    header("Location: ../index.php");
    exit();
}

$email = $_SESSION['email'];
$select_query = "SELECT profile_pictures FROM adminlogs WHERE email = '$email'";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profilePicturePath = $row['profile_pictures'];
} else {
    $profilePicturePath = 'default_profile_picture.jpg';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #dash-text {
            color: #fff;
        }
        .bg-sidebar {
            height: 100vh; /* Adjusted to cover full viewport height */
            width: 50%;
            position: fixed;
            background-color: black;
            background-image: linear-gradient(147deg, black 0%, green 80%);
        }
        .log {
            display: flex;
            justify-content: between;
        }
        .img-admin {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 2rem;
        }
        .bg-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-weight: bold;
            gap: 2rem;
            margin-top: 2rem;
        }
        ul.logout {
            display: flex;
            justify-content: start;
        }
        .h7 {
            font-size: 0.875rem; /* Adjust font size as needed */
        }
    </style>
</head>
<body>
    <div class="bg-sidebar">
        <div class="log d-flex justify-content-between" id="dash-text">
            <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">Administrator</h1>
            <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
        </div>
        <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
            <img class="rounded-circle" src="<?php echo $profilePicturePath; ?>" alt="img-admin" height="120" width="120">
            <h2 class="h6 fw-bold" id="dash-text"><?php echo $_SESSION['name']; ?></h2>
            <span class="h7 admin-color" id="side-text" style="color: #04b7ee;">Admin</span>
        </div>
        <div class="bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-2">
            <ul class="d-flex flex-column list-unstyled">
                <li class="h7"><a class="nav-link text-dark" href="dashboard.php"><i class="fal fa-home-lg-alt me-2" id="dash-text"></i> <span id="dash-text">Home</span></a></li>
                <li class="h7"><a class="nav-link text-dar  k" href="approval.php"><i class="fas fa-chalkboard-teacher me-2" id="dash-text"></i> <span id="dash-text">Reservation Approval</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="arniscomplete.php"><i class="fas fa-cube me-2" id="dash-text"></i> <span id="dash-text">Complete Transaction</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="records.php"><i class="fas fa-cube me-2" id="dash-text"></i> <span id="dash-text">Reports</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="customeracc.php"><i class="fas fa-cube me-2" id="dash-text"></i> <span id="dash-text">Customer accounts</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="records.php"><i class="fas fa-cube me-2" id="dash-text"></i> <span id="dash-text">Existing Rentals</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="salesreport.php"><i class="fas fa-user-shield me-2" id="dash-text"></i> <span id="dash-text">Sales Report</span></a></li>
 
             <!--   <li class="h7"><a class="nav-link text-dark" href="studentlogs.php"><i class="fas fa-user-graduate me-2" id="dash-text"></i> <span id="dash-text">Student accounts</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="\track-wise/admin/pages/schedulesystem/home.php"><i class="fas fa-calendar-plus me-2" id="dash-text"></i> <span id="dash-text">Add Schedules</span></a></li>-->
                <li class="h7"><a class="nav-link text-dark" href="adminregistration.php"><i class="fas fa-user-plus me-2" id="dash-text"></i> <span id="dash-text">Registration</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="qr.php"><i class="fas fa-cube me-2" id="dash-text"></i> <span id="dash-text">Update Qr</span></a></li>
                <li class="h7"><a class="nav-link text-dark" href="profile.php"><i class="fas fa-user-plus me-2" id="dash-text"></i> <span id="dash-text">Profile</span></a></li>
            </ul>
            <ul class="logout d-flex justify-content-start list-unstyled">
                <li class="h7">
                    <a id="logout-link" class="nav-link text-dark" href="?logout=1">
                        <span id="dash-text">Logout</span><i class="fal fa-sign-out-alt ms-2" id="dash-text"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
