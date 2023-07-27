<?php
require("./config.php");
require("./database/databaseconn.php");

if (isset($_GET['param1'])) {
    if (isset($_GET['param2'])) {
        $ticketId = $_GET['param1'];
        $userId = $_GET['param2'];
    }
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
            "amount" => 10000,
            "currency" => "usd",
            "description" => "vehicle parking",
            "source" => $token,
        )
    );
}
echo $amount = $data->amount;
echo $currency = $data->currency;
// $status = $data->status;

$paymentDate = date('Y-m-d H:i:s');

// $sql = "INSERT INTO payment(payment_type,payment_date,amount,ticket_id,user_id,currency)VALUES('card','$paymentDate',$amount,$ticketId,$userId,'$currency')";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//     echo '<script>alert("payment successfull")</script>';
// } else {
//     echo "fail";
// }

?>