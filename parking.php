<?php
$parking_Slot_Error = "";
if(isset($_POST['parking-login'])){
    $parking_Slot_Number = $_POST['parking-slot-number'];

    if(empty($parking_Slot_Number)){
        $parking_Slot_Error = "parking slot is required";
    }
    else{
        header("location:parking.php");
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
</head>
<body>
    <?php include("./include/after-login-nav.php");?>
    <div class="wrapper">
        <form post="post" action="">
            <div class="fl_wrapper">
            <h2>Enter parking space details</h2>
                <div class="parking_slot-n">
                    <label for="parking-slot-n">Parking slot number</label>
                    <br>
                    <input type="text" name="parking-slot-number" class="parking">
                </div>
                <div class="parking-status">
                    <label for="parking-status">Parking status</label>
                    <br>
                    <input type="text" name="parking_Status" class="parking">
                </div>
            </div>
            <div class="button">
                <input type="submit" name="submit" value="next" class="parking-login">
            </div>
        </form>
    </div>
    <?php require("./include/footer.php");?>
</body>
</html>