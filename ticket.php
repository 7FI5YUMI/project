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
$query = "SELECT user.username,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,parking.parkingslot_number,duration.entry_time,duration.exit_time FROM user INNER JOIN vehicle ON user.id = vehicle.user_id INNER JOIN parking ON vehicle.id = parking.vehicle_id INNER JOIN duration ON parking.id = duration.parkingslot_id WHERE user.id = $userId";
$res = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($res)) {
    $username = $row['username'];
    $vehiclePlateNumber = $row['vehicle_platenumber'];
    $vehicleCategory = $row['vehicle_category'];
    $vehicle_type = $row['vehicle_type'];
    $parkingSlot = $row['parkingslot_number'];
    $entryTime = $row['entry_time'];
    $exitTime = $row['exit_time'];

}
$entryTime_1 = $entryTime;
$exitTime_1 = $exitTime;

// Create DateTime objects for entry time and exit time
$entryDateTime = new DateTime($entryTime_1);
$exitDateTime = new DateTime($exitTime_1);

$interval = $entryDateTime->diff($exitDateTime);

// Get the difference in hours
$hours = $interval->h;

// Display the result
echo "Hour difference: " . $hours;

if ($vehicleCategory == 'two_wheeler') {
    $rate =  $hours * 25;


}
if ($vehicleCategory == 'four_wheeler') {
    $rate=$hours * 50;
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
} else {
    $compare = "no";
}

$success = "Thank you for registering the vehicle";

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
            <?php include("./payment.php"); ?>
        </div>
        <div class="ticket-parent">
            <span>----------------------------------------</span>
            <h4 class="ticket-heading">Parking Receipt</h4>
            <span>----------------------------------------</span>
            <table class="ticket-style" border="1">
                <tr>
                    <th class="ticket_head">owner name:</th>
                    <th class="ticket_head">Vehicle name</th>
                    <th class="ticket_head">Vehicle plate number</th>
                    <th class="ticket_head">Vehicle category</th>
                    <th class="ticket_head">parking slot number</th>
                    <th class="ticket_head">Entry time</th>
                    <th class="ticket_head">Exit time</th>
                    <th class="ticket_head">parked hour</th>
                    <th class="ticket_head">rate</th>
                    <th class="ticket_head">membership</th>
                </tr>
                <?php
                include("./database/databaseconn.php");

                $sql = "SELECT user.username,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,parking.parkingslot_number,duration.entry_time,duration.exit_time FROM user INNER JOIN vehicle ON user.id = vehicle.user_id INNER JOIN parking ON vehicle.id = parking.vehicle_id INNER JOIN duration ON parking.id = duration.parkingslot_id WHERE user.id = $userId";
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
                        $datetime_1 = $entryTime;
                        $datetime_2 = $exitTime;

                        $start_datetime = new DateTime($datetime_1);
                        $diff = $start_datetime->diff(new DateTime($datetime_2));
                        $parkedHour = $diff->h;
                        echo '<tr>
                        <td>' . $username . '</td>
                        <td>' . $vehiclePlate . '</td>
                        <td>' . $vehicle_category . '</td>
                        <td>' . $vehicle_type . '</td>   
                        <td>' . $parkingSlotNumber . '</td>     
                        <td>' . $entryTime . '</td>   
                        <td>' . $exitTime . '</td>   
                        <td>' . $hours . 'hour' . '</td> 
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