<?php
require("./database/databaseconn.php");
require("./database/databaseconn.php");
if (!isset($_SESSION['admin'])) {
    header("location:login.php");
    exit;
}
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
            $status = "<script>alert('parking added successfully')</script>";
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
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <title>parking</title>
</head>

<body>
    <!-- bootstrap modal -->

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary add-parking" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add parking
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add parking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
                        <div class="parking-status-park">
                            <label for="parking-status">Parking status</label>
                            <br>
                            <input type="text" name="parking_status" class="parking">
                            <div class="error">
                                <?php echo $parking_statusErr; ?>
                            </div>

                        </div>
                    </div>
                    <div class="button-parking">
                        <input type="submit" name="parking-login" value="next" class="parking-login">
                    </div>
                    <div class="status">
                        <?php echo $status; ?>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
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
        $limit = 8;
        $page = isset($_GET['page']) ? $_GET['page']:1;
        $start = ($page -1) * $limit;
        $sql = "SELECT *  from parking LIMIT $start,$limit";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT count(id)  from parking LIMIT $start,$limit";
        $res = mysqli_query($conn,$sql);
        $numRows = mysqli_fetch_assoc($res);
        $total = $numRows[0]['id'];
        $pages = ceil($total / $limit);
        $previous = $page -1;
        $next = $page + 1;
        $sql = "SELECT *  from parking LIMIT $start,$limit";
        $result = mysqli_query($conn, $sql);
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
    <nav aria-label="Page navigation example">
  <ul class="pagination mt-3 flex justify-content-center">
    <li class="page-item"><a class="page-link" href="admin-parking.php?page=<?= $previous;?>">Previous</a></li>
    <?php for($i=1; $i<=$pages;$i++):?>
    <li class="page-item"><a class="page-link" href="admin-parking.php?page=<?= $i;?>"><?= $i?></a></li>
    <?php endfor;?>
     <li class="page-item"><a class="page-link" href="admin-parking.php?page=<?= $next;?>">Next</a></li>
    <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
    <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li>  -->
  </ul>
</nav>
    <!-- <footer >
        <div class="parking-footer_wrapper">
            <div class="copyright">
                <p>&copy; All rights reserved
                     vehicle parking management system
                </p>
            </div>
        </div>
    </footer> -->
    <!-- bootstrap -->
<script src="./assets/bootstrap/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>

</body>
</html>