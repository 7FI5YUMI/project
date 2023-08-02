<?php
require("./database/databaseconn.php");
if (isset($_GET['ticketId'])) {
    if (isset($_GET['userId'])) {

        $ticketId = $_GET['ticketId'];
        $userId = $_GET['userId'];
        $success = "";



        // $ticketExist = "SELECT ticket_number FROM ticket where id = $ticketId";
        // $res = mysqli_query($conn, $ticketExist);
        // $numExistRows = mysqli_num_rows($res);
        // if ($numExistRows > 0) {
        //     echo '<script>alert("ticket already exist");</script>';
        // }

        $sql = "SELECT amount from ticket where id = $ticketId";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $amount = $row['amount'];
            }
        }

        $insertCurrency = "usd";
        $paymentType = "card";

        $paymentDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO payment(payment_type,payment_date,amount,ticket_id,user_id,currency)VALUES('$paymentType','$paymentDate',$amount,$ticketId,$userId,'$insertCurrency')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("payment successfull")</script>';
            // $success = "Payment successfull";
        } else {
            echo "fail";
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
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <title>Transaction</title>
    <style>
        body {
            height: 100vh;
        }
    </style>
</head>

<body>



    <script src="./assets/bootstrap/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
</body>

</html>