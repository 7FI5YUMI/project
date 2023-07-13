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
// $sql = "SELECT id from vehicle where user_id = $userId";
// $res = mysqli_query($conn, $sql);
// $numRows = mysqli_num_rows($res);
// if ($numRows > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//         $vehicleId = $row['id'];
//     }

// }
// if (!isset($_GET['param1'])) {
//     if (!isset($_GET['param2'])) {
//         header("Location:pnotfound.php");
//     }
// }
$selectedMsgErr = "";

// echo $vehicleId."<br>";
if (isset($_GET['param1'])) {
    if (isset($_GET['param2'])) {
        $parkingSelect = $_GET['param1'];
        $selectedVehicleId = $_GET['param2'];
        $sql = "SELECT id from parking where parkingslot_number = $parkingSelect";
        $res = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($res);
        if ($numRows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $parkingId = $row['id'];
            }

        }
        $vehicleIdExist = "SELECT vehicle_id FROM parking where vehicle_id = $selectedVehicleId";
        $res = mysqli_query($conn, $vehicleIdExist);
        $numExistRows = mysqli_num_rows($res);
        if ($numExistRows > 0) {
            echo "<script>alert('vehicle already exist in parking lot')</script>";
        } else {
            $sql = "UPDATE parking set vehicle_id = $selectedVehicleId, parking_status = 'occupied' where parkingslot_number = $parkingSelect";

            if ($selectedVehicleId == NULL) {
                header("Location:pnotfound.php");
            } else {
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    echo "success";
                    // header("Location:duration.php");

                } else {
                    die("undefined");
                }
            }
        }
    }
}



?>