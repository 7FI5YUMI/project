<?php
require("./database/databaseconn.php");

// if(isset($_POST['addVehicle'])){
//     // header("Location:adminvehicle.php");

// }
$vehicleplateExistErr = "";
$vehiclePlateNumberErr = $vehicleplatenegErr = $vehicleTypeErr = $vehicleCategoryErr = "";
$vehiclePlateValidErr = $vehicleTypeValidErr = $vehicleCategoryValidErr = "";
$succes = "";
$exist = false;
if (isset($_POST['next'])) {
    $vehiclePlateNumber = $_POST['vehicle_p_number'];
    $vehicleType = $_POST['vehicle_type'];
    $vehicle_category = $_POST['vehicle_category'];
    $vehicle_typeValid = "/^([a-zA-Z ]+)$/";
    // $userid = $_POST['$userId'];

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
    elseif (empty($vehicleType)) {
        $vehicleTypeErr = "vehicle type is required";
    } elseif (!preg_match($vehicle_typeValid, $vehicleType)) {
        $vehicleTypeValidErr = "please enter a valid vehicle type";
    } elseif (!in_array($vehicle_category, array("two_wheeler", "four_wheeler"))) {
        $vehicleCategoryErr = "choose one option";
    } else {
        $sql = "INSERT INTO vehicle(vehicle_platenumber,vehicle_category,vehicle_type) VALUES 
        ($vehiclePlateNumber,'$vehicle_category','$vehicleType')";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
           echo " <script> alert('vehicle added')</script>";
        } else {
            echo "<script>alert('vehicle didn't inserted')</script>";
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
    <link rel="stylesheet" href="./styles/add_vehicle.css">
    <script src="./jquery.min.js"></script>
    <title>vehicle add and details</title>
</head>

<body>
    <!-- <button class="add_vehicle" id="add_v">
        <a href="" onclick="show()">Add vehicle</a>
    </button> -->
    <button id="myBtn" class="add_vehicle">Add vehicle</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
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
                    <div class="error">
                        <?php echo $errrLast; ?>
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
            </form>
        </div>

    </div>

    <h2>Enter details of vehicle</h2>
    <table class="vehicle_add-admin" border="1" id="table_vehicle">
        <tr>
            <th class="head_vehicle">id</th>
            <th class="head_vehicle">vehicle_platenumber</th>
            <th class="head_vehicle">vehicle category</th>
            <th class="head_vehicle">vehicle type</th>
            <!-- <th class"head_vehicle">Action</th> -->
            <th class="head_vehicle">action</th>
        </tr>
        <?php
        include("./database/databaseconn.php");
        $sql = "SELECT *  from vehicle";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $vehiclePlate = $row['vehicle_platenumber'];
                $vehicle_category = $row['vehicle_category'];
                $vehicle_type = $row['vehicle_type'];
                echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $vehiclePlate . '</td>
                        <td>' . $vehicle_category . '</td>
                        <td>' . $vehicle_type . '</td>
                        <td>
                         <button class="button remove" style="color: red"><a href="delete.php?deleteid=' . $id . '">Delete</a></button>
                        </td>    
                                
                        </tr>';
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
        ?>


    </table>
    <footer>
        <div class="copyright_wrapper">
            <div class="copyright">
                <p>&copy; All rights reserved
                    <?php echo date('Y'); ?> vehicle parking management system
                </p>
            </div>
        </div>
    </footer>

    
<!-- javascript for modal -->
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>


</body>

</html>