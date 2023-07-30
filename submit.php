<?php
require("./config.php");
// require 'vendor/autoload.php';
require("./database/databaseconn.php");
session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

if (isset($_GET['param1'])&&($_GET['param2'])) {
    // if (isset($_GET['param2'])) {
       $ticketId = $_GET['param1'];
         $userId = $_GET['param2'];
    // }    
}
// $cardNumber = $_POST['cardnumber'];
$success = "";
// \Stripe\Stripe::setVerifySslCerts(false);
// $token = $_POST['stripeToken'];

if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);
    $token = $_POST['stripeToken'];
    $data = \Stripe\Charge::create(
        array(
            "amount" => 100,
            "currency" => "usd",
            "description" => "vehicle parking",
            "source" => $token,
        )
    );
    header("Location: success.php?ticketId='.$ticketId.'&userId = '.$userId.'");
    exit();

    // $insertAmount = $data->amount;
    // $insertCurrency = $data->currency;
    // // $paymentType = "card";
    // // $status = $data->status;


    // $paymentDate = date('Y-m-d H:i:s');

    // $sql = "INSERT INTO payment(payment_type,payment_date,amount,ticket_id,user_id,currency)VALUES('card','$paymentDate',$insertAmount,$ticketId,$userId,'$insertCurrency')";
    // $result = mysqli_query($conn, $sql);
    // if ($result) {
    //     echo '<script>alert("payment successfull")</script>';
    // } else {
    //     echo "fail";
    // }
}


?>