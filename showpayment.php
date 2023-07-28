<?php 
include("./database/databaseconn.php");
// session_start();
// if (!isset($_SESSION['admin'])) {
//     header("location:login.php");
//     exit;
// }

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
    <title>Document</title>
</head>
<body>
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
            $res = mysqli_query($conn,$query);
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

                        <td>' . $id. '</td>
                        <td>' . $userName. '</td>
                        <td>' . $vehiclePlate. '</td>
                        <td>' . $vehicle_type. '</td>
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
        
    
</body>
</html>