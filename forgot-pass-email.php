<?php
require("./database/databaseconn.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function set_password_reset($get_name,$get_email,$token){
   

}
$emailErr = $emailValidErr = "";
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $token = md5(rand());
    $checkEmail = "SELECT email FROM user where email = $email LIMIT 1";
    $res = mysqli_query($conn,$checkEmail);
    if(mysqli_num_rows($res) > 0)
    {
        $row = mysqli_fetch_array($res);
    $get_name = $row['name'];
    $get_email = $row['email'];
    $update_token = "UPDATE user set token = '$token' where email = '$get_email' LIMTI 1";
    $tokenResult = mysqli_query($conn,$update_token);
    if($tokenResult){
        send_password_reset($get_name,$get_email,$token);
        $_SESSION['status'] = "We emailed you a password reset link";
        header("Location:login.php");
        exit(0);


    }
    else{
        $_SESSION['status'] = "Something went wrong";
        header("Location:login.php");
        exit(0);
    }
    }
    else{
        $_SESSION['status'] = "Email not found";
        header("Location:login.php");
        exit(0);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./styles/forgot.css"> -->
    <link rel="stylesheet" href="./styles/forgot-email.css">
    <!-- <link rel="stylesheet" href="./assets/bootstrap/bootstrap-5.3.0-dist/css/bootstrap.min.css"> -->
    <title>forgot password</title>
    <style>
        .error {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Forgot password?</h2>
        <form action="" method="post">
            <div class="pcp-wrapper">
                <div class="email">
                    <label for="password">Email</label>
                    <br>
                    <input type="text" name="email">
                </div>
                <div class="error">
                    <?php echo $emailErr; ?>
                    <?php echo $emailValidErr; ?>
                </div>
                <br>
                <div class="submit">
                    <input type="submit" name="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>