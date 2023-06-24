<?php
session_start();
require("./database/databaseconn.php");
$sessionUser = $_SESSION['username'];

//selecting user id i.e foreign key of vehicle 
$query = "SELECT id from user  where username = '$sessionUser'";
$res = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $userId = $row['id'];
    }
}

//selecting user_id from vehicle to get vehicle_id via user_id
$sql = "SELECT id from vehicle where user_id = $userId";
$res = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $vehicleId = $row['id'];
    }
    
}
// echo $vehicleId."<br>";
if (isset($_GET['q'])) {
    $parkingSelect = $_GET['q'];
    $selectedVehicleId = $GET['query'];
    $sql = "SELECT id from parking where parkingslot_number = $parkingSelect";
    $res = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($res);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $parkingId = $row['id'];
        }
        
    }

    $sql = "UPDATE parking set vehicle_id = $vehicleId, parking_status = 'occupied' where parkingslot_number = $parkingSelect";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "success";
        header("Location:duration.php");

    }
    else{
        die("undefined");
    }

    // if($res){
    //     // echo "success";
    //     // $parking_status = 'occupied';
    //     // $parking_status = 'occupied';
    //     echo "success";
    // }
    // else{
    //     die("undefined");
    // }
    // $sql = "SELECT parking_status from parking";
    // $result = mysqli_query($conn, $sql);
    // $parkingstatus = mysqli_fetch_assoc($result);

    // $one = "SELECT vehicle_id from parking";
    // $res = mysqli_query($conn, $one);

    // $query = "UPDATE parking set parking_status = case when $vehicleId != 'NULL' then 'occupied'";
    // $result = mysqli_query($conn, $query);
    // if ($result) {
    //     echo "success";
    // } else {
    //     echo "not success";
    // }
}



?>