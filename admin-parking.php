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
if (isset($_POST['parking-login'])) {
    $parking_Slot_Number = $_POST['parking-slot-number'];
    $parking_status = $_POST['parking_status'];

    if (empty($parking_Slot_Number)) {
        $parking_Slot_Error = "parking slot is required";
    } elseif (empty($parking_status)) {
        $parking_statusErr = "parking status is required";
    } elseif ($parking_status == 'occupied') {
        echo "parking is occupied";
    } else {
        $parkingInsert = "INSERT INTO parking(parkingslot_number,parking_status) VALUES
        ($parking_Slot_Number,'$parking_status')";
        $result = mysqli_query($conn, $parkingInsert);
        if ($result) {
            $status = "parking added successfully";
            // header("Location:duration.php");
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
    <link rel="stylesheet" href="./styles/admin_parking.css">
    <title>parking</title>
</head>

<body>
    <button id="myBtn" class="add-parking">
        
    <a href="./parking-insert_admin.php">Add parking</a>
    </button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="wrapper">
                <form method="post" action="">
                    <div class="fl_wrapper">
                        <h2>Enter parking space details</h2>
                        <div class="parking_slot-n">
                            <label for="parking-slot-n">Parking slot number</label>
                            <br>
                            <input type="text" name="parking-slot-number" class="parking">
                            <div class="error">
                                <?php echo $parking_Slot_Error; ?>
                            </div>
                        </div>
                        <div class="parking-status">
                            <label for="parking-status">Parking status</label>
                            <br>
                            <input type="text" name="parking_status" class="parking">
                            <div class="error">
                                <?php echo $parking_statusErr; ?>
                            </div>

                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" name="parking-login" value="next" class="parking-login">
                    </div>
                    <div class="status">
                        <?php echo $status; ?>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <table class="vehicle_park-admin" border="1">
        <tr>
            <th class="park-vehicle">sn</th>
            <th class="park-vehicle">parking slot number</th>
            <th class="park-vehicle">parking status</th>
            <th class="park-vehicle">Action</th>
        </tr>
        <?php
        include("./database/databaseconn.php");

        $sql = "SELECT *  from parking";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $parkingNumber = $row['parkingslot_number'];
                $parkingStatus = $row['parking_status'];
                echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $parkingNumber . '</td>
                        <td>' . $parkingStatus . '</td>
                        <td>
                         <button class="button"><a href="parking_delete.php?deleteid=' . $id . '">Delete</a></button>
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

</body>
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

</html>