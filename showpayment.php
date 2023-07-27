<?php 
include ("./database/databaseconn.php");




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
            <th class="head_vehicle">Payment Type</th>
            <th class="head_vehicle">Payment date</th>
            <th class="head_vehicle">amount</th>
            <th class="head_vehicle">ticketId</th>
            <th class="head_vehicle">userId</th>
            <th class="head_vehicle">currency</th>
            <!-- <th class"head_vehicle">Action</th> -->
            <th class="head_vehicle">action</th>
        </tr>
        <?php
        include("./database/databaseconn.php");
        $limit = 8;

        $sql = "SELECT *  from payment LIMIT $limit";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $paymentType = $row['payment_type'];
                $paymentDate = $row['payment_date'];
                $amount = $row['amount'];
                $ticketId = $row['ticket_id'];
                $userId = $row['user_id'];
                $currency = $row['currency'];
                echo '<tr>
                        <td>'. $id .'</td>
                        <td>' . $paymentType . '</td>
                        <td>' . $paymentDate . '</td>
                        <td>' . $amount . '</td>
                        <td>' . $ticketId . '</td>
                        <td>' . $userId . '</td>
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
    
</body>
</html>