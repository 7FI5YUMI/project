<?php
include("./database/databaseconn.php");
// session_start();
// if (!isset($_SESSION['admin'])) {
//     header("location:login.php");
//     exit;
// }
if(isset($_POST['submit-button'])){

}
// if($conn){
//     echo "success";
// }
// <td>'. $id .'</td>
// <td>' . $userName . '</td>
// <td>' . $vehiclePlate. '</td>
// <td>' . $vehicle_type. '</td>
// <td>' . $vehicleCategory. '</td>
// <td>' . $ticketNumber. '</td>


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/ticket-admin.css">
    <title>Document</title>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add ticket
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">add ticket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ticket number</label>
                            <input type="text" name="ticket-number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ticket status</label>
                            <input type="text" name="ticket-status" class="form-control">
                        </div>
                        <button type="submit" name="submit-button" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h2>Payment details</h2>
    <table class="vehicle_add-admin" border="1" id="table_vehicle">
        <tr>
            <th class="head_vehicle">id</th>
            <th class="head_vehicle">username</th>
            <th class="head_vehicle">vehicle plate number</th>
            <th class="head_vehicle">vehicle type</th>
            <th class="head_vehicle">vehicle Category</th>
            <th class="head_vehicle">ticket number</th>
            <th class="head_vehicle">payment type</th>
            <th class="head_vehicle">payment date</th>
            <th class="head_vehicle">amount</th>
            <th class="head_vehicle">currency</th>
            <!-- <th class"head_vehicle">Action</th> -->
            <th class="head_vehicle">action</th>
        </tr>
        <?php
        include("./database/databaseconn.php");
        $limit = 8;

        $query = "SELECT user.id,user.username,vehicle.vehicle_platenumber,vehicle.vehicle_category,vehicle.vehicle_type,ticket.ticket_number,payment.payment_type,payment.payment_date,payment.amount,payment.currency FROM user INNER JOIN vehicle ON  user.id = vehicle.user_id INNER JOIN ticket ON vehicle.id = ticket.vehicle_id INNER JOIN payment ON  ticket.id = payment.ticket_id";
        // $query = "SELECT * FROM payment";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            $res = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $userName = $row['username'];
                $vehiclePlate = $row['vehicle_platenumber'];
                $vehicle_type = $row['vehicle_type'];
                $vehicleCategory = $row['vehicle_category'];
                $ticketNumber = $row['ticket_number'];
                $paymentType = $row['payment_type'];
                $paymentDate = $row['payment_date'];
                $paymentAmount = $row['amount'];
                $currency = $row['currency'];
                echo '<tr>

                        <td>' . $id . '</td>
                        <td>' . $userName . '</td>
                        <td>' . $vehiclePlate . '</td>
                        <td>' . $vehicle_type . '</td>
                        <td>' . $vehicleCategory . '</td>
                        <td>' . $ticketNumber . '</td>
                        <td>' . $paymentType . '</td>
                        <td>' . $paymentDate . '</td>
                        <td>' . $paymentAmount . '</td>
                        <td>' . $currency . '</td>

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
        <!-- </table> -->
        <!-- bootstrap js -->
        <script src="./assets/bootstrap/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
</body>

</html>