<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <style>
    header {
    background-color: #000; /* Set header background color to black */
    color: #fff;
    padding: 1px 20px; /* Adjusted padding */
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 120px;
}

body {
    font-family: "Tilt Neon", sans-serif;
    margin: 0;
    padding: 0;
}

.container{
    max-width: 100%; /* Ensures the container doesn't exceed the width of the viewport */
    height: 550px;
    display: flex;
    gap: 10px;
    margin: 0 auto;
    margin-top: 40px; /* Centers the container horizontally */
    padding: 0 20px; /* Adds padding to prevent elements from touching the edges */
    overflow-x: auto; /* Enables horizontal scrolling if the content exceeds the viewport width */
    overflow-y: hidden; /* Hides vertical overflow */
}
    .card{
        width: 25%;
        height: 100%;
        border-radius: 30px;
        position: relative;
        overflow: hidden;
        transition: width 0.5s;

    }
    .card:hover{
        width: 100%;
    }
    .background{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

.card-content{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        box-sizing: border-box;
        transform: translateY(100%);
        transition: opacity 0.5s, transform 0.5s;
        opacity: 0;
    }
    .card:hover .card-content{
        transform: translateY(0);
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .title, .end-title{
        color: white;
    }
    .end-title{
        text-align: center;
        margin-top: 50px;
        font-size: 36px;
    }
    .title{
        text-align: center;
    }
  </style>
</head>
<body>
<?php include '../navbar.php'; ?> 
    <div class="container">
        <div class="card">
            <img class="background" src="../assets/img/tabletennis.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>
        <div class="card">
            <img class="background" src="../assets/img/badminton.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>
        <div class="card">
            <img class="background" src="../assets/img/dart.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>
        <div class="card">
            <img class="background" src="../assets/img/billiard.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>
        <div class="card">
            <img class="background" src="../assets/img/pickleball.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>
        <div class="card">
            <img class="background" src="../assets/img/taekwondo.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>

        <div class="card">
            <img class="background" src="../assets/img/sepaktakraw.jpg"/>
            <div class="card-content">
                <h3 class="title">button nakalagay d2</h3>
            </div>
        </div>
        
    </div>

</body>
</html>