<?php
include("./database/databaseconn.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
// $vehicleIdExistErr = "";
$sessionUser = $_SESSION['username'];
$query = "SELECT id from user  where username = '$sessionUser'";
$res = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $userId = $row['id'];
    }
}
$sql = "SELECT id from vehicle where user_id = $userId";
$res = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $vehicleId = $row['id'];
    }
}

$sql = "SELECT id from parking where vehicle_id = $vehicleId";
$res = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $parkingId = $row['id'];
    }
}

// selecting id of username to store in foreign key
// $query = "SELECT vehicle.id, user.username,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,parking.parkingslot_number,duration.entry_time,duration.exit_time,duration.parkingslot_id FROM vehicle INNER JOIN user ON user.$userId=vehicle.$vehicleId
// INNER JOIN parking
//   ON vehicle.$vehicleId = parking.$parkingId
//   INNER JOIN duration
//   ON parking.$parkingId = parking.$parkingId";
$query = "SELECT user.username,vehicle.id,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,parking.parkingslot_number,duration.entry_time,duration.exit_time FROM user INNER JOIN vehicle ON user.id = vehicle.user_id INNER JOIN parking ON vehicle.id = parking.vehicle_id INNER JOIN duration ON parking.id = duration.parkingslot_id WHERE vehicle.id = $vehicleId";
$res = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($res)) {
    $username = $row['username'];
    $vehiclePlateNumber = $row['vehicle_platenumber'];
    $vehicleCategory = $row['vehicle_category'];
    $vehicle_type = $row['vehicle_type'];
    $parkingSlot = $row['parkingslot_number'];
    $entryTime1 = $row['entry_time'];
    $exitTime1 = $row['exit_time'];

}
function shouldCheckout($entryTime, $exitTime, $exitTimeIntervalStart, $exitTimeIntervalEnd) {
    
    $entryDateTime = new DateTime($entryTime);
    $exitDateTime = new DateTime($exitTime);
    $exitTimeIntervalStart = new DateTime($exitTimeIntervalStart);
    $exitTimeIntervalEnd = new DateTime($exitTimeIntervalEnd);

    // Check if the entry time is within the exit time interval
    if ($entryDateTime >= $exitTimeIntervalStart && $entryDateTime <= $exitTimeIntervalEnd) {
        return true;
    } else {
        return false;
    }
}
$entryTime = '2023-07-24 10:00:00'; // Replace with the actual entry time
$exitTime = '2023-07-24 11:30:00'; // Replace with the actual exit time
$exitTimeIntervalStart = '2023-07-24 11:00:00'; // Replace with the exit time interval start
$exitTimeIntervalEnd = '2023-07-24 12:00:00'; // Replace with the exit time interval end

if (shouldCheckout($entryTime, $exitTime, $exitTimeIntervalStart, $exitTimeIntervalEnd)) {
    echo "User should checkout from the parking lot.";
} else {
    echo "User can stay in the parking lot.";
}



$entryTime_1 = $entryTime;
$exitTime_1 = $exitTime;


$entryDateTime = new DateTime($entryTime_1);
$exitDateTime = new DateTime($exitTime_1);

$interval = $entryDateTime->diff($exitDateTime);


$hours = $interval->h;

// if($hours===$hours){
//     echo "success";
// }

// echo "Hour difference: " . $hours;

if ($vehicleCategory === 'four_wheeler') {
    $rate = $hours * 50;


} else {
    $rate = $hours * 25;
}


// $vehicleExist = "SELECT vehicle_id FROM ticket where vehicle_id = $vehicleId";
// $res = mysqli_query($conn, $vehicleExist);
// $numExistRows = mysqli_num_rows($res);
// if ($numExistRows > 0) {
//     $vehicleIdExistErr = "vehicle plate number exist try another";
// } else {
//     $sql = "UPDATE  ticket set vehicle_id = $vehicleId,status = 'occupied' where status = 'free'";

//     $res = mysqli_query($conn, $sql);
//     if ($res) {
//         echo "vehicle id updated";
//     } else {
//         echo "not updated";
//     }

// }
require("./config.php");

$sql = "SELECT user_id from membership where user_id = $userId";
$res = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $membershipId = $row['id'];
    }
}
if ($membershipId == $userId) {
    $compare = "yes";
    // $amount = $rate / 100 * 10;
} else {
    $compare = "no";
}

$success = "Thank you for registering the vehicle";

if (isset($_GET['q'])) {
    $ticketSelect = $_GET['q'];
    $sql = "SELECT id from ticket where ticket_number = $ticketSelect";
    $res = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($res);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $ticketId = $row['id'];
        }

    }
    // $vehicleIdExist = "SELECT vehicle_id FROM parking where vehicle_id = $vehicleId";
    // $res = mysqli_query($conn, $vehicleplateExist);
    // $numExistRows = mysqli_num_rows($res);
    // if ($numExistRows > 0) {
    //     echo " <script>alert( 'vehicle plate number exist try another');</script>";
    // }
    $sql = "UPDATE ticket set vehicle_id = $vehicleId,amount = $rate, status = 'occupied' where ticket_number = $ticketSelect";

    if ($vehicleId == NULL) {
        header("Location:pnotfound.php");
    } else {
        $res = mysqli_query($conn, $sql);

        if ($res) {
            // echo "success";
            header("ticket.php");

        } else {
            die("undefined");
        }
    }
}

// $query = "SELECT id from ticket where vehicle_id = $vehicleId";
// $res = mysqli_query($conn,$query);
// if(mysqli_num_rows($res)){
//     echo $ticket_id = $row['id'];
// }
// echo $ticket_id;
$sql = "SELECT id,amount from ticket where vehicle_id = $vehicleId";
$res = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $tickerId = $row['id'];
        $amount = $row['amount'];
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ticketgenerate.css">
    <title>Ticket</title>
    <style>
        <?php
        if ($success != NULL) {
            ?>
            <style>.success {
                display: block;
                color: white;
                background-color: lightseagreen;
                width: 80%;
                text-align: center;
                margin: auto;
                border-radius: 0.2rem;
                padding: 0.7rem;
            }
        </style>
        <?php
        }
        ?>
    </style>
</head>

<body>
    <?php include("./include/after-login-nav.php"); ?>

    <div class="ticket">
        <div class="payment">
            <form action="submit.php" method="POST">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key=<?php echo $publishableKey; ?> data-amount=<?php echo $amount; ?> data-name="vehicle parking"
                    data-desc="vehicle parking desc" data-currency="usd">
                    </script>
            </form>
        </div>
        <div class="ticket-parent">
            <span>----------------------------------------</span>
            <h4 class="ticket-heading">Parking Receipt</h4>
            <span>----------------------------------------</span>
            <table class="ticket-style" border="1">
                <tr>
                    <th class="ticket_head">owner name:</th>
                    <!-- <th class="ticket_head">Vehicle name</th> -->
                    <th class="ticket_head">Vehicle plate number</th>
                    <th class="ticket_head">Vehicle category</th>
                    <th class="ticket_head">Vehicle Type</th>
                    <th class="ticket_head">parking slot number</th>
                    <th class="ticket_head">Entry time</th>
                    <th class="ticket_head">Exit time</th>
                    <th class="ticket_head">parked hour</th>
                    <th class="ticket_head">rate</th>
                    <th class="ticket_head">membership</th>
                </tr>
                <?php
                include("./database/databaseconn.php");

                $sql = "SELECT user.username,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,parking.parkingslot_number,duration.entry_time,duration.exit_time FROM user INNER JOIN vehicle ON user.id = vehicle.user_id INNER JOIN parking ON vehicle.id = parking.vehicle_id INNER JOIN duration ON parking.id = duration.parkingslot_id WHERE vehicle.id = $vehicleId";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    $res = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $username = $row['username'];
                        $vehiclePlate = $row['vehicle_platenumber'];
                        $vehicle_category = $row['vehicle_category'];
                        $vehicle_type = $row['vehicle_type'];
                        $parkingSlotNumber = $row['parkingslot_number'];
                        $entryTime = $row['entry_time'];
                        $exitTime = $row['exit_time'];
                        $entryTime_1 = $entryTime;
                        $exitTime_1 = $exitTime;

                        echo '<tr>
                        <td>' . $username . '</td>
                        <td>' . $vehiclePlate . '</td>
                        <td>' . $vehicle_category . '</td>
                        <td>' . $vehicle_type . '</td>   
                        <td>' . $parkingSlotNumber . '</td>     
                        <td>' . $entryTime . '</td>   
                        <td>' . $exitTime . '</td>   
                        <td>' . $hours . ' hour ' . '</td> 
                        <td>' . $rate . '</td>   
                        <td>' . $compare . '</td>   

                        </tr>';

                    }
                    echo "</table>";

                } else {
                    echo "0 result";
                }
                ?>


        </div>
    </div>
    <div class="success">
        <?php echo $success; ?>
    </div>
</body>

</html>