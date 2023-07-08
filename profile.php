<?php
include("./database/databaseconn.php");
session_start();
//  $user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit;
}

$sessionUser = $_SESSION['username'];
// selecting id of username to store in foreign key
$query = "SELECT * from user  where username = '$sessionUser'";
$res = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $userId = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $phone = $row['contact'];
        $email = $row['email'];

    }
}

$countQuery = "SELECT COUNT(vehicle_type) from vehicle where user_id = $userId";
$count = mysqli_query($conn, $countQuery);
$numRows = mysqli_num_rows($count);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($count)) {
        $vehicleCount = $row['COUNT(vehicle_type)'];
    }
}

$selectQuery = "SELECT * from vehicle where user_id=$userId";
$result = mysqli_query($conn, $selectQuery);
$numRows = mysqli_num_rows($result);
if ($numRows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $vehiclePlate = $row['vehicleplate_number'];
        $vehicleCategory = $row['vehicle_category'];
        $vehicle_type = $row['vehicle_type'];
    }
}
$noResultErr = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/profile.css">
    <title>Profile</title>
</head>

<body>
    <?php include("./include/after-login-nav.php"); ?>
    <div class="profile-wrapper">
        <div class="main_heading-profile">
            <h2>Vehicle information that you have already registered</h2>
        </div>
        <div class="registered-vehicle">You have
            <?php echo $vehicleCount; ?> registered vehicle
        </div>
        <div class="profile-info">
            <ul class="user-info">
                <h4 class="user-info-head">User information</h4>
                <li>name:
                    <?php echo $firstname; ?>
                </li>
                <li>lastname:
                    <?php echo $lastname; ?>
                </li>
                <li>phone number:
                    <?php echo $phone; ?>
                </li>
                <li>email:
                    <?php echo $email; ?>
                </li>
            </ul>
        </div>
        <h3>Vehicle details that you have registered</h3>
        <table class="profile-table" border="1">
            <tr>
                <th class="profile-head">id</th>
                <th class="profile-head">vehicle plate number</th>
                <th class="profile-head">vehicle category</th>
                <th class="profile-head">vehicle type</th>
            </tr>
            <?php
            include("./database/databaseconn.php");
            $selectQuery = "SELECT * from vehicle where user_id=$userId";
            ;
            $result = mysqli_query($conn, $selectQuery);
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
                                
                        </tr>';
                }
                echo "</table>";
            } else {
                echo  "No vehicle registered ";
            }
            ?>
        </table>
    </div>

</body>

</html>