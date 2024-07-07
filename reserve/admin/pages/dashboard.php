<?php session_start();

if ($_SESSION['status'] != 'valid') {
    header("Location: http://localhost/reservation_system/reserve/admin/index.php");
    exit();
}?>
<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Queries to count records
$query_adminlogs = "SELECT COUNT(*) as count FROM adminlogs";
$query_reservation_payments = "SELECT COUNT(*) as count FROM reservation_payments";
$query_users = "SELECT COUNT(*) as count FROM users";
$query_arnispage = "SELECT COUNT(*) as count FROM arnispage";
$query_badmintonpage = "SELECT COUNT(*) as count FROM badmintonpage";
$query_billiardpage = "SELECT COUNT(*) as count FROM billiardpage";
$query_chesspage = "SELECT COUNT(*) as count FROM chesspage";
$query_cornholepage = "SELECT COUNT(*) as count FROM cornholepage";
$query_dartpage = "SELECT COUNT(*) as count FROM dartpage";
$query_picklepage = "SELECT COUNT(*) as count FROM  picklepage";
$query_sepaktakrawpage = "SELECT COUNT(*) as count FROM sepaktakrawpage";
$query_tabletennispage = "SELECT COUNT(*) as count FROM tabletennispage";
$query_taekwondopage = "SELECT COUNT(*) as count FROM taekwondopage";
$query_basketballpage = "SELECT COUNT(*) as count FROM basketballpage";
$query_wholevenuepage = "SELECT COUNT(*) as count FROM wholevenuepage";
$query_judopage = "SELECT COUNT(*) as count FROM judopage";



// Execute queries and fetch results
$result_adminlogs = $conn->query($query_adminlogs);
$result_reservation_payments = $conn->query($query_reservation_payments);
$result_users = $conn->query($query_users);
$result_arnispage = $conn->query($query_arnispage);
$result_badmintonpage = $conn->query($query_badmintonpage);
$result_billiardpage = $conn->query($query_billiardpage);
$result_chesspage = $conn->query($query_chesspage);
$result_cornholepage = $conn->query($query_cornholepage);
$result_dartpage = $conn->query($query_dartpage);
$result_picklepage = $conn->query($query_picklepage);
$result_sepaktakrawpage = $conn->query($query_sepaktakrawpage);
$result_tabletennispage = $conn->query($query_tabletennispage);
$result_taekwondopage = $conn->query($query_taekwondopage);
$result_basketballpage = $conn->query($query_basketballpage);
$result_wholevenuepage = $conn->query($query_wholevenuepage);
$result_judopage = $conn->query($query_judopage);


// Fetch the counts
$count_adminlogs = $result_adminlogs->fetch_assoc()['count'];
$count_reservation_payments = $result_reservation_payments->fetch_assoc()['count'];
$count_users = $result_users->fetch_assoc()['count'];
$count_arnispage = $result_arnispage->fetch_assoc()['count'];
$count_badmintonpage = $result_badmintonpage->fetch_assoc()['count'];
$count_billiardpage = $result_billiardpage->fetch_assoc()['count'];
$count_chesspage = $result_chesspage->fetch_assoc()['count'];
$count_cornholepage = $result_cornholepage->fetch_assoc()['count'];
$count_dartpage = $result_dartpage->fetch_assoc()['count'];
$count_picklepage = $result_picklepage->fetch_assoc()['count'];
$count_sepaktakrawpage = $result_sepaktakrawpage->fetch_assoc()['count'];
$count_tabletennispage = $result_tabletennispage->fetch_assoc()['count'];
$count_taekwondopage = $result_taekwondopage->fetch_assoc()['count'];
$count_basketballpage = $result_basketballpage->fetch_assoc()['count'];
$count_wholevenuepage = $result_wholevenuepage->fetch_assoc()['count'];
$count_judopage = $result_judopage->fetch_assoc()['count'];

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Reservation_System/reserve/assets/icons/titleicon.png" type="image/x-icon">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            height:200px;
        }
        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .navbar {
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .list-group {
            max-height: 200px;
            overflow-y: auto;
        }

        .animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 50%, 0);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .animated.fadeInUp {
            animation-name: fadeInUp;
        }

        .bg-content {
            background-color: #c3cbdc;
            background-image: linear-gradient(147deg, #c3cbdc 0%, #edf1f4 74%);
        }

        .container-fluid {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        .card__items {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card__items--blue {
            background: linear-gradient(to right, #1e2023, #2e8140);
    color: #fff;
        }

        .card__items--gradient {
            background: linear-gradient(to right, #1e2023, #2e8140);
            color: #fff;
        }

        .card__students,
        .card__users,
        .card__payments {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .card__nbr-students,
        .card__nbr-course,
        .card__nbr-students span {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php
         include "component/sidebar.php";
        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark wow fadeInUp">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Home</a>
                    <!-- Add more navigation links as needed -->
                </div>
            </nav>

            <div class="row gap-3 justify-content-center mt-5">
                <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Admin Logs</span>
                    </div>
                    <div class="card__nbr-students">
                        <span><?php echo $count_adminlogs; ?></span>
                    </div>
                </div>
                <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="fas fa-users"></i>
                        <span>Customer Logs</span>
                    </div>
                    <div class="card__nbr-students">
                        <span><?php echo $count_users; ?></span>
                    </div>
                </div>

                <div class="card card__items card__items--gradient col-md-3 position-relative animated fadeInUp">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Reservation.approval</span>
                    </div>
                    <div class="card__nbr-students">
                        <span><?php echo $count_reservation_payments; ?></span>
                    </div>
                </div>

               
                <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
                <div class="card__students d-flex flex-column gap-2 mt-3">
        <i class="fas fa-hockey-sticks"></i>
        <span>Arnis.Approved</span>
    </div>
    <div class="card__nbr-players">
        <span><?php echo $count_arnispage; ?></span>
    </div>
</div>
<div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
<div class="card__students d-flex flex-column gap-2 mt-3">
        <i class="fas fa-shuttlecock"></i>
        <span>Badminton.Approved</span>
    </div>
    <div class="card__nbr-players">
        <span><?php echo $count_badmintonpage; ?></span>
    </div>
</div>
<div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
<div class="card__students d-flex flex-column gap-2 mt-3">
<i class="fas fa-bowling-ball"></i>
        <span>Billiard.Approved</span>
    </div>
    <div class="card__nbr-players">
        <span><?php echo $count_billiardpage; ?></span>
    </div>
</div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-chess"></i>
            <span>Chess.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_chesspage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-bullseye"></i>
            <span>Cornhole.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_cornholepage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-bullseye"></i>
            <span>Dart.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_dartpage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-bowling-ball"></i>
            <span>PickleBall.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_picklepage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-bowling-ball"></i>
            <span>SepakTakraw.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_sepaktakrawpage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-table-tennis"></i>
            <span>TableTennis.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_tabletennispage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-fist-raised"></i>
            <span>Taekwondo.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_taekwondopage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-basketball-ball"></i>
            <span>Basketball.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_basketballpage; ?></span>
        </div>
    </div>
     <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
         <i class="fas fa-hand-paper"></i> 
            <span>Judo.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_judopage; ?></span>
        </div>
    </div>
    <div class="card card__items card__items--blue col-md-3 position-relative animated fadeInUp">
    <div class="card__students d-flex flex-column gap-2 mt-3">
    <i class="fas fa-map-marker-alt"></i>
            <span>WholeVenue.Approved</span>
        </div>
        <div class="card__nbr-players">
            <span><?php echo $count_wholevenuepage; ?></span>
        </div>
    </div>

            </div>
            
            
        </div>
        <!-- end content page -->
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="../js/script.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>

</html>
