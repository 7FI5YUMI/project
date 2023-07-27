<?php
require("./database/databaseconn.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

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
if (isset($_GET['query'])) {
    $selectedVehicleId = $_GET['query'];
    
}


// //  

$parkingslot = "SELECT id from parking where vehicle_id = $selectedVehicleId";
$parkingresult = mysqli_query($conn, $parkingslot);
$numRows = mysqli_num_rows($parkingresult);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($parkingresult)) {
       echo  $parkingId = $row['id'];
    }
}



// $query = "SELECT entry_time from duration where vehicle_id = $selectedId";
// $result = mysqli_query($conn, $query);
// while ($row = mysqli_fetch_assoc($result)) {
//     $entryTime = $row['entry_time'];
// }
// $query = "SELECT exit_time from duration where vehicle_id = $selectedId";
// $result = mysqli_query($conn, $query);
// while ($row = mysqli_fetch_assoc($result)) {
//     $exitTime = $row['exit_time'];
// }

 



$entry_timeErr = $exit_timeErr = "";
$timePastErr = $timeFutureErr = "";
if (isset($_POST['selected-submit'])) {
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];



    if (empty($entry_time)) {
        $entry_timeErr = "entry time is required";
    } elseif (empty($exit_time)) {
        $exit_timeErr = "exit time is required";
    }
    $vehicleIdExist = "SELECT vehicle_id FROM parking where vehicle_id = $selectedVehicleId";
        $res = mysqli_query($conn, $vehicleIdExist);
        $numExistRows = mysqli_num_rows($res);
        if ($numExistRows > 0) {
            echo "<script>alert('vehicle already exist in parking lot')</script>";
        }
    else {
        $duration_insertSelected = "INSERT INTO duration(entry_time,exit_time,vehicle_id,parkingslot_id)VALUES('$entry_time','$exit_time',$selectedVehicleId,$parkingId)";
        $result = mysqli_query($conn, $duration_insertSelected);
        if ($result) {
            header("Location:ticket-test.php");
        } else {
            echo "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/duration-vehicle.css">
    <title>duration</title>
    <?php
    if ($successMsg != NULL) {
        ?>
        <style>
            .successMsg {
                display: block;
                color: white;
                background-color: lightseagreen;
                width: 30%;
                text-align: center;
                margin: auto;
                border-radius: 0.2rem;
                padding: 0.7rem
            }
        </style>
        <?php
    }
    ?>
</head>

<body>
    <?php include("./include/after-login-nav.php"); ?>
    <div class="wrapper-start-end">
        <form method="post" action="">
            <div class="wrapper-all">
                <div class="start-end">
                    <div class="start">
                        <label for="entrydate">Entry date and time</label>
                        <br>
                        <input type="datetime-local" id="dateInput" name="entry_time" class="entry-time" id="entryTime">
                        <div class="error">
                            <?php echo $entry_timeErr; ?>
                            <?php echo $timePastErr; ?>
                        </div>
                    </div>
                    <div class="end">
                        <label for="exitdate">Exit date and time</label>
                        <br>
                        <input type="datetime-local" id="dateExitInput" name="exit_time" class="exit-time"
                            id="exitTime">
                        <div class="error">
                            <?php echo $exit_timeErr; ?>
                            <?php echo $timeFutureErr; ?>
                        </div>
                    </div>
                    <br>

                    <input type="submit" name="selected-submit" value="Submit" class="datetime-submit">
                    <div class="successMsg">
                        <?php echo $successMsg; ?>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>

    <div class="footer-duration">
        <?php include("./include/footer.php"); ?>
    </div>
</body>

</html>