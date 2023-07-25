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
                    // echo "success";
                  header("Location:durationSelect.php");

                } else {
                    die("undefined");
                }
            }
        }
    }
}


?>
