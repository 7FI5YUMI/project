<?php
include("./database/databaseconn.php");
$vehiclePlateNumberErr = $vehicleTypeErr = "";
$vehicleValidErr = "";
if(isset($_POST['parking'])){
    $vehiclePlateNumber = $_POST['vehicle_p_number'];
    $vehicleType = $_POST['vehicle_type'];
    $vehicleValid = "/^([a-zA-Z]+)$/";
    if(empty($vehiclePlateNumber)){
        $vehiclePlateNumberErr = "vehicle plate number is required";
    }
    else if(empty($vehicleType)){
        $vehicleTypeErr = "vehicle type is required";
    }
    elseif(!preg_match($vehicleValid,$vehicleType)){
        $vehicleValidErr = "vehicle type must be in correct format";
    }
    else{
        header('location:parking.php');
        

    }

}
if(isset($_POST['booking'])){
    $vehiclePlateNumber = $_POST['vehicle_p_number'];
    $vehicleType = $_POST['vehicle_type'];
    if(empty($vehiclePlateNumber)){
        $vehiclePlateNumberErr = "vehicle plate number is required";
    }
    else if(empty($vehicleType)){
        $vehicleTypeErr = "vehicle type is required";
    }
    else{
        
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/vehicle.css">
    <title>Parking</title>
</head>
<body>
    <div class="navigation">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="./assets/logo/logo.png" alt="logo" class="logo-img">
            </div>
            <div class="nav-menu">
                <ul class="nav-list">
                    <li><a href="./user.php">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Payment</a></li>
                </ul>
            </div>
            <div class="nav-login">
                <div class="nav-login_button">
                    <button><a class="login-button-text" href="">Logout</a></button>
                </div>
            </div>
        </nav>
    </div>
    <div class="wrapper">
        <form method="post" action="">
            <div class="wrapper-two">
                <div class="vehicle-text-one">
                    <h2 class="vehicle-text">Enter the vehicle details</h2>
                </div>
                <div class="vehicle-info-wrapper">
                    <div class="vehicle-p-number">
                        <label for="parkingid">Vehicle plate number</label>
                        <br>
                    <input type="text" name="vehicle_p_number" class="parking">
                    <div class="error"><?php echo $vehiclePlateNumberErr;?></div>
                    </div>
                    <div class="parkind_slot_num">
                        <label for="parking_slot_number">Vehicle type</label>
                        <br>
                        <input type="text" name="vehicle_type" class="parking">
                        <div class="error"><?php echo $vehicleTypeErr ?></div>
                        <div class="error"><?php echo $vehicleValidErr ?></div>
                    </div>
                </div>
                <div class="button_wrapper">
                    <div class="parking_button">
                        <input type="submit" name="parking" value="park" class="parking-login">
                    </div>
                    <div class="parking_button">
                        <input type="submit" name="booking" value="book" class="parking-login">
                    </div>
                </div>
            </div>
        </form>
    </div>
     <?php include("./include/footer.php"); ?>
</body>
</html>