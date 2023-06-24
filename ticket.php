<?php
include("./database/databaseconn.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
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
$query = "SELECT vehicle.id, user.username,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,parking.parkingslot_number,duration.entry_time,duration.exit_time,duration.parkingslot_id FROM vehicle INNER JOIN user ON user.$userId=vehicle.$vehicleId
INNER JOIN parking
  ON vehicle.$vehicleId = parking.$parkingId
  INNER JOIN duration
  ON parking.$parkingId = parking.$parkingId";
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
$datetime_1 = $entryTime;
$datetime_2 = $exitTime;

if ($vehicleCategory == 'two_wheeler') {
    $start_datetime = new DateTime($datetime_1);
    $diff = $start_datetime->diff(new DateTime($datetime_2));
    $rate = $diff->h * 25;


}

if ($vehicleCategory == 'four_wheeler') {
    $start_datetime = new DateTime($datetime_1);
    $diff = $start_datetime->diff(new DateTime($datetime_2));
    $rate = $diff->h * 50;
    
}
$parkedHour = $diff->h;

$sql = "UPDATE  ticket set vehicle_id = $vehicleId,status = 'occupied' where status = 'free'";
$res = mysqli_query($conn,$sql);
if($res){
    echo "vehicle id updated";
}
else{
    echo "not updated";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ticket_generate.css">
    <title>Document</title>
</head>

<body>

    <div class="ticket">
    <div class="payment">
                <?php include("./payment.php");?>
            </div>
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
                    echo '<tr>
                        <td>' . $username . '</td>
                        <td>' . $vehiclePlate . '</td>
                        <td>' . $vehicle_category . '</td>
                        <td>' . $vehicle_type . '</td>   
                        <td>' . $parkingSlotNumber . '</td>     
                        <td>' . $entryTime . '</td>   
                        <td>' . $exitTime . '</td>   
                        <td>' . $parkedHour .'hour'. '</td> 
                        <td>' . $rate . '</td>   
                          
                           
                                
                        </tr>';

                }
                echo "</table>";
            } else {
                echo "0 result";
            }
            ?>
            
    </div>
</body>

</html>