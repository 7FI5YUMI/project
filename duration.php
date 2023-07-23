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
//vehicle id foreign key
$sql = "SELECT id from vehicle where user_id = $userId";
$res = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $vehicleId = $row['id'];
    }
}

$parkingslot = "SELECT id from parking where vehicle_id = $vehicleId";
$parkingresult = mysqli_query($conn, $parkingslot);
$numRows = mysqli_num_rows($parkingresult);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($parkingresult)) {
        $parkingId = $row['id'];
    }
}

$query = "SELECT entry_time from duration where vehicle_id = $vehicleId";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $entryTime = $row['entry_time'];
}
$query = "SELECT exit_time from duration where vehicle_id = $vehicleId";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $exitTime = $row['exit_time'];
}

// $queryOne = "SELECT id from parking where vehicle = $vehicleId";
// $result = mysqli_query($conn,$queryOne);
// while($row=mysqli_fetch_assoc($result)){
//     $parkingId = $row['id'];
// }

// $datetime_1 = $entryTime;
// $datetime_2 = $exitTime;

// $start_datetime = new DateTime($datetime_1);
// $diff = $start_datetime->diff(new DateTime($datetime_2));

//echo $diff->days.' Days total<br>'; 
//echo $diff->y.' Years<br>'; 
//echo $diff->m.' Months<br>'; 
//echo $diff->d.' Days<br>'; 
// echo $diff->h.' Hours<br>'; 
//echo $diff->i.' Minutes<br>'; 
//echo $diff->s.' Seconds<br>';



// echo $diff->i.' Minutes<br>'; 
// echo $diff->s.' Seconds<br>';
// if($difference == $difference){
//     $sql = "UPDATE parking set vehicle_id = NULL where vehicle_id = $vehicleId";
//     $res = mysqli_query($conn,$sql);
//     if($res){
//         echo "updated successfully";

//     }
// }
// $currentTimestamp = time();
// $selectedTimestamp = strtotime($date);

// if ($selectedTimestamp === false) {
//     echo "Invalid date format!";
// } elseif ($selectedTimestamp > $currentTimestamp) {
//     echo "Selected date is in the future!";
// } else {
//     echo "Selected date is valid.";
// }



$entry_timeErr = $exit_timeErr = "";
$timePastErr = $timeFutureErr = "";
if (isset($_POST['date-time-submit'])) {
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];
    // $entryDateTime = new DateTime($entry_time);
    // $exitDateTime = new DateTime($exit_time);

    // // Get the current DateTime object
    // $currentDateTime = new DateTime();



    if (empty($entry_time)) {
        $entry_timeErr = "entry time is required";
    } elseif (empty($exit_time)) {
        $exit_timeErr = "exit time is required";
    } elseif ($entryDateTime < $currentDateTime && $exitDateTime < $currentDateTime) {
        // Entry or exit time is in the past
        $timePastErr = "Please select current date and time";
    } elseif ($entryDateTime > $currentDateTime && $exitDateTime > $currentDateTime) {
        $timeFutureErr = "future date not accepted";
    } else {
        $duration_insert = "INSERT INTO duration(entry_time,exit_time,vehicle_id,parkingslot_id)VALUES('$entry_time','$exit_time',$vehicleId,$parkingId)";
        $result = mysqli_query($conn, $duration_insert);
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
    <!-- <h1>
        //
    </h1> -->
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

                    <input type="submit" name="date-time-submit" value="Submit" class="datetime-submit">
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