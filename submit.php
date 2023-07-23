<?php
require("./config.php");
// echo "<pre>";
// print_r($_POST);
// if(isset($_GET['q']))

\Stripe\Stripe::setVerifySslCerts(false);
$token = $_POST['stripeToken'];

if(isset($_POST['stripeToken'])){
    \Stripe\Stripe::setVerifySslCerts(false);
    $token = $_POST['stripeToken'];
    $data = \Stripe\Charge::create(array(
        "amount" => 10000,
        "currency" => "usd",
        "description" =>"vehicle parking", 
        "source" => $token,
    ));
    
        header('Location: success.php');
    }

?>