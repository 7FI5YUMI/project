<?php
require("./config.php");
// require 'vendor/autoload.php';
require("./database/databaseconn.php");
session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

if (isset($_GET['param1'])) {
    if(isset($_GET['param2'])){
       $ticketId = $_GET['param1'];
         $userId = $_GET['param2'];
    }
 
}

if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);
    $token = $_POST['stripeToken'];
    $data = \Stripe\Charge::create(
        array(
            "amount" => 1000,
            "currency" => "usd",
            "description" => "vehicle parking",
            "source" => $token,
        )
    );
    header('Location:success.php?ticketId='.$ticketId.'&userId='.$userId.'');
    exit();

}


?>