<?php
require("./config.php");
require("./database/databaseconn.php");
// echo "<pre>";
// print_r($_POST);
// if(isset($_GET['q']))
// session_start();
// $sessionUser = $_SESSION['username'];
// // echo $sessionUser;
// // selecting id of username to store in foreign key
// $query = "SELECT id from user  where username = '$sessionUser'";
// $res = mysqli_query($conn, $query);
// $numRows = mysqli_num_rows($res);
// if ($numRows > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//          $userId = $row['id'];
//     }
// }
// $sql = "SELECT id from vehicle where user_id = $userId";
// $res = mysqli_query($conn, $sql);
// $numRows = mysqli_num_rows($res);
// if ($numRows > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//          $vehicleId = $row['id'];
//     }
// }

// $sqlQuery = "SELECT id from ticket where vehilce_id = $vehicleId";
// $res = mysqli_query($conn,$sql);
// if($numRows >0){
//     while ($row=mysqli_fetch_assoc($res)){
//    echo  $ticketId = $row['id']."<br>";
//     }
// }
// $cardNumber = $_POST['cardnumber'];
$success = "";
\Stripe\Stripe::setVerifySslCerts(false);
$token = $_POST['stripeToken'];

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

     $amount = $data->amount;
    $currency = $data->currency;
    // $status = $data->status;

    // // Create a timestamp for the payment date
    // $paymentDate = date('Y-m-d H:i:s');


    // // Prepare and execute the SQL query to insert the payment details into the payment table
    // $sql = "INSERT INTO payment(payment_type,payment_date,amount,ticket_id,user_id)VALUES('card','$paymentDate',$amount,$ticketId,$userId)";
    // $result = mysqli_query($conn,$sql);
    // if($result){
    //     echo "successfull";
    // }else{
    // 
    // // header('Location: thank_you.php');
    // echo "fail";
    // }

}

?>