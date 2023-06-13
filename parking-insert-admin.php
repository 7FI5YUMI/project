<?php
require("./database/databaseconn.php");
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location:login.php");
// }
// $sessionUser = $_SESSION['username'];
// //selecting user id i.e foreign key of vehicle 
// $query = "SELECT id from user  where username = '$sessionUser'";
// $res = mysqli_query($conn, $query);
// $numRows = mysqli_num_rows($res);
// if ($numRows > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//         $userId = $row['id'];
//     }
// }

// //selecting user_id from vehicle to get vehicle_id via user_id
// $sql = "SELECT id from vehicle where user_id = $userId";
// $res = mysqli_query($conn, $sql);
// $numRows = mysqli_num_rows($res);
// if ($numRows > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//         $vehicleId = $row['id'];
//     }
// }


$parking_Slot_Error = $parking_statusErr = "";
$status = "";
if(isset($_POST['parking-login'])){
    $parking_Slot_Number = $_POST['parking-slot-number'];
    $parking_status = $_POST['parking_status'];

    if(empty($parking_Slot_Number)){
        $parking_Slot_Error = "parking slot is required";
    }
    elseif(empty($parking_status)){
        $parking_statusErr = "parking status is required";
    }
    elseif($parking_status == 'occupied'){
        echo "parking is occupied";
    }
    else{
        $parkingInsert = "INSERT INTO parking(parkingslot_number,parking_status) VALUES
        ($parking_Slot_Number,'$parking_status')";
        $result = mysqli_query($conn,$parkingInsert);
        if($result){
            $status = "parking added successfully";
            // header("Location:duration.php");
        }
        else{
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
    <link rel="stylesheet" href="./styles/parking.css">
    <title>Parking</title>
    <style>
        .error{
            color: #DB1F48;
        }
    </style>
    <?php
    if ($status != NULL) {
        ?>
        <style>
            .success {
                display: block;
                color: white;
                background-color: lightseagreen;
                width: 80%;
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
    <div class="hello">
        <?php echo $_SESSION['username'];?>
    </div>
    <div>
        <?php echo $vehicleId; ?>
    </div>
    <div class="wrapper">
        <form method="post" action="">
            <div class="fl_wrapper">
            <h2>Enter parking space details</h2>
                <div class="parking_slot-n">
                    <label for="parking-slot-n">Parking slot number</label>
                    <br>
                    <input type="text" name="parking-slot-number" class="parking">
                    <div class="error"><?php echo $parking_Slot_Error;?></div>
                </div>
                <div class="parking-status">
                    <label for="parking-status">Parking status</label>
                    <br>
                    <input type="text" name="parking_status" class="parking">
                    <div class="error"><?php echo $parking_statusErr;?> </div>
                    
                </div>
            </div>
            <div class="button">
                <input type="submit" name="parking-login" value="next" class="parking-login">
            </div>
            <div class="status"><?php echo $status;?></div>
        </form>
    </div>
</body>
</html>