<?php

require("./database/databaseconn.php");

if (isset($_GET['q'])) {
    $vehicleIdf = $_GET['q'];

    // echo $vehicleIdf;


    $sql = "SELECT parkingslot_number from parking where parking_status = 'free'";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $parkingNumber = $row['parkingslot_number'];
        // $parkingStatus = $row['parking_status'];
        // echo $parkingNumber . "<br>";

    }

    $vehicle_select = "SELECT vehicle_id from parking where parking_status = 'free'";
    $res = mysqli_query($conn, $vehicle_select);
    while ($row = mysqli_fetch_assoc($res)) {
        $vehicle_id = $row['vehicle_id'];

    }
    // $status = "SELEECT parking_status from parking where parking_status = 'free'";
    // $res = mysqli_query($conn,$status);
    // while($row=mysqli_fetch_assoc($res)){
    //     $parking_status = $row['parking_status'];
    // }
    $sql = "SELECT parkingslot_number from parking where parking_status = 'free'";
    $res = mysqli_query($conn, $sql);
    $parking_status = 'free';
    while ($row = mysqli_fetch_assoc($res)) {
        $parkingNumber = $row['parkingslot_number'];
        // $parkingStatus = $row['parking_status'];
        // echo $parkingNumber . "<br>";
        if ($vehicle_id == NULL && $parking_status != 'occupied') {
            $query = "INSERT INTO parking(parkingslot_number,vehicle_id) VALUES($parkingNumber,$vehicleIdf)";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                // $parking_status = 'occupied';
                echo "successfully parked vehicle";
            }
            else{
                echo "denied";
            }
    
        }

    }
    // $queryOne = "SELECT parkingslot_number from parking where parking_status = 'occupied'";
    // $outres - mysqli_query($conn,$queryOne);
    // while($row = mysqli_fetch_assoc($outres)){
    //     $parkingslot = $row['parkingslot_number'];
    // }
    // if($parkingslot == 'occupied'){
    //     echo "parking slot packed";
    // }
    // // echo $parkingNumber;
    // if ($vehicleIdf == NULL && $parkingStatus == 'free') {
    // $query = "INSERT INTO parking(parkingslot_number,parking_status,vehicle_id) VALUES($parkingNumber,$vehicleIdf)";
    // $resutl = mysqli_query($conn, $query);
    // if($result){
    //     echo "successfully parked a vehicle";
    // }
    // else{
    //     echo "denied";
    // }
    // echo $result = mysqli_query($conn,$query);
    // if($result){
    //     echo "successfull";
    //     $parkingStatus = 'occupied';
    // }
    // else{
    //     echo "not success";
    // }
    // }
    // else{
    //     echo "occupied";
    // }
}



?>