<?php
session_start();

$sql = "SELECT id.v,vehicle_platenumber.v,veicle_category.v,id.p,parking_slotnumber.p
FROM vehicle v
INNER JOIN parking p
ON v.vehicle_id = parking.column_name"


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ticket.css">
    <title>Ticket</title>
   
</head>
<body>
    <div class="ticket_wrapper">
        <div class="container">
            <ul>
                <li>ticketnumber: </li>
                <li>vehicle_id: </li>
                <li>ticketnumber: </li>
                <li>ticketnumber: </li>
                <li>ticketnumber: </li>
            </ul>
        </div>

    </div>
</body>
</html>