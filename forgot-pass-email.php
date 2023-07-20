<?php
require("./database/databaseconn.php");

$emailErr = $emailValidErr= "";
if(isset($_POST['submit'])){
    $email = $_POST['email'];

    if(empty($email)){
        $emailErr = "Please enter email";
    }
    elseif (!FILTER_VAR($email,FILTER_VALIDATE_EMAIL)) {
        $emailValidErr = "Email should be in proper format";
    }
    $emailQuery = "SELECT * FROM user where email = $email";
    $res = mysqli_query($conn,$emailQuery);
    $numRows = mysqli_num_rows($res);
    if($numRows){
        $user = "SELECT username from user where email = $email";
        $result = mysqli_query($conn,$user);
        $numRows = mysqli_fetch_assoc($result);
        $username = $user['username'];
        $token = $user['token']; 

        $subject = "Email Reset";
        $body = "Hi click here to activate your account 
        /opt/lampp/htdocs/project_4th/forgot-password.php?token=.$token.";
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
        .error{
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
                    <?php echo $emailErr;?>
                    <?php echo $emailValidErr;?>
                </div>
                <br>
                <div class="submit">
                    <input type="submit" name="submit" value="Forgot password?">
                </div>
            </div>
        </form>
    </div>
</body>

</html>