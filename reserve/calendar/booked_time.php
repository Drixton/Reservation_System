<?php 
include 'db_connection.php';

if(isset($_GET['date']) && isset($_GET['sports'])){

    $date = $_GET['date'];
    $sports = $_GET['sports'];

    $select = "select * from reservation_payments where date = '$date' and sports = '$sports'";
    $select_run = mysqli_query($conn,$select);
    if(!mysqli_num_rows($select_run) > 0){
        
        $res = [
            'status' => 400,
            'message' => 'no reservation found'
            
            
        ];
        echo json_encode($res);
        return false;

    }else{

        $row = mysqli_fetch_all($select_run);
        $res = [
            'status' => 200,
            'message' => 'Success',
            'data' => $row
            
        ];
        echo json_encode($res);
        return false;
    }
}

?>