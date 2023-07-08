<?php
include("./database/databaseconn.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
$sessionUser = $_SESSION['username'];
// selecting id of username to store in foreign key
$query = "SELECT id from user  where username = '$sessionUser'";
$res = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $userId = $row['id'];
    }
}

$_SESSION['userId'] = $userIdOne;
$errrLast = "";
$vehicleplateExistErr = "";
$vehiclePlateNumberErr = $vehicleplatenegErr = $vehicleTypeErr = $vehicleCategoryErr = "";
$vehiclePlateValidErr = $vehicleTypeValidErr = $vehicleCategoryValidErr = "";
$succes = "";
// $exist = false;
if (isset($_POST['next'])) {
    $vehiclePlateNumber = $_POST['vehicle_p_number'];
    $vehicleType = $_POST['vehicle_type'];
    $vehicle_category = $_POST['vehicle_category'];
    $vehicle_typeValid = "/^([a-zA-Z ]+)$/";
    $userid = $_POST['$userId'];

    if (empty($vehiclePlateNumber)) {
        $vehiclePlateNumberErr = "vehicle plate number is required";
    } elseif ($vehiclePlateNumber < 0) {
        $vehicleplatenegErr = "negative value enter valid plate number";
    }
    $vehicleplateExist = "SELECT vehicle_platenumber FROM vehicle where vehicle_platenumber = $vehiclePlateNumber";
    $res = mysqli_query($conn, $vehicleplateExist);
    $numExistRows = mysqli_num_rows($res);
    if ($numExistRows > 0) {
        $vehicleplateExistErr = "vehicle plate number exist try another";
    }
    // if ($exist = true) {

    //  else {
    // $exist = false;
    // }
    // }
    elseif (empty($vehicleType)) {
        $vehicleTypeErr = "vehicle type is required";
    } elseif (!preg_match($vehicle_typeValid, $vehicleType)) {
        $vehicleTypeValidErr = "please enter a valid vehicle type";
    } elseif (!in_array($vehicle_category, array("two_wheeler", "four_wheeler"))) {
        $vehicleCategoryErr = "choose one option";
    } else {
        $sql = "INSERT INTO vehicle(vehicle_platenumber,vehicle_category,vehicle_type,user_id) VALUES 
        ($vehiclePlateNumber,'$vehicle_category','$vehicleType',$userId)";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            $success = "vehicle added successfully please click next for further process";
            header("Location:userparking.php");
        } else {
            $errrLast = "something went wrong";
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
    <link rel="stylesheet" href="./styles/vehicle-reg.css">
    <title>Vehicle Entry</title>
    <?php
    if ($success != NULL) {
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
    <div class="navigation">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="./assets/logo/logo.png" alt="logo" class="logo-img">
            </div>
            <div>
                <?php echo $_SESSION['id']; ?>
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
    <div class="hey_user">
        <h3>
            <?php echo $_SESSION['username']; ?>
            
        </h3>
        <h4>Register your vehicle by filing up the details</h4>
    </div>
    <div class="wrapper">
        <form method="post" id="saveVehicle" action="">
            <div class="wrapper-two">
                <div class="vehicle-text-one">
                    <h2 class="vehicle-text">Enter the vehicle details</h2>
                </div>
                <div class="vehicle-info-wrapper">
                    <div class="vehicle-p-number">
                        <label for="parkingid">Vehicle plate number</label>
                        <br>
                        <input type="text" name="vehicle_p_number" class="parking">
                        <div class="error">
                            <?php echo $vehiclePlateNumberErr; ?>
                        </div>
                        <div class="error">
                            <?php echo $vehiclePlateValidErr; ?>
                        </div>
                        <div class="error">
                            <?php echo $vehicleplatenegErr; ?>
                        </div>
                        <div class="error">
                            <?php echo $vehicleplateExistErr; ?>
                        </div>
                    </div>
                    <div class="vehicle_category">
                        <label for="vehicle_category">Vehicle category</label>
                        <br>
                        <select name="vehicle_category" id="" class="parking">
                            <option value="none">Choose vehicle category</option>
                            <option value="two_wheeler">Two wheeler</option>
                            <option value="four_wheeler">Four wheeler</option>
                        </select>
                        <div class="error">
                            <?php echo $vehicleCategoryErr ?>
                        </div>

                    </div>
                </div>
                <div class="parking_slot_num">
                    <label for="vehicle_type">Vehicle type</label>
                    <br>
                    <input type="text" name="vehicle_type" class="parking">
                    <div class="error">
                        <?php echo $vehicleTypeErr ?>
                    </div>
                    <div class="error">
                        <?php echo $vehicleValidErr ?>
                    </div>
                </div>

                <div class="parking_button">
                    <input type="submit" name="next" value="next" class="parking-login">
                </div>

                <div class="success_wrapper">
                    <div class="success">
                        <?php echo $success; ?>
                    </div>
                </div>
            </div>
            <div class="error">
                <?php echo $errrLast; ?>
            </div>
        </form>
    </div>
    <?php include("./include/footer.php"); ?>
</body>

</html>