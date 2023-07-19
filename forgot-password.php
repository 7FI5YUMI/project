<?php

if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/forgot.css">
    <!-- <link rel="stylesheet" href="./assets/bootstrap/bootstrap-5.3.0-dist/css/bootstrap.min.css"> -->
    <title>forgot password</title>
</head>

<body>
    <div class="wrapper">
        <h2>Forgot password?</h2>
        <form action="" method="post">
            <div class="pcp-wrapper">
                <div class="password">
                    <label for="password">password</label>
                    <br>
                    <input type="password" name="password">
                </div>
                <br>
                <div class="cpasssword">
                    <label for="cpassword">Confirm password</label>
                    <br>
                    <input type="password" name="cpassword">
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