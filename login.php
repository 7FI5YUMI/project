<?php
require("./database/databaseconn.php");
$login = false;
session_start();
$usernameExistErr = "";
$nameErr = $passwordErr = "";
$nameErrvalid = $passwordErrvalid = "";
$passErr = "";
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['pass'];
    $role = $_POST['role'];

    if (empty($username)) {
        $nameErr = "username is required";
    } else if (empty($password)) {
        $passwordErr = "Password is required";
    } else if (strlen($password) <= 8) {
        $passwordErrvalid = "password should be of 8 character ";
    }
    else {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        $role = mysqli_fetch_assoc($res);
        
        if ($role['role'] == '1') {
            $login = true;
            session_start();
             $_SESSION['admin']=$username;
            $_SESSION['loggedIn'] == TRUE;
           header("Location:admin.php");

        } elseif ($role['role'] == '0') {
            $login = true;
            session_start();
             $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] == TRUE;
            header("Location:user.php");


        } else {
            echo 'invalid username or password';
        }
        // if ($res) {
        //     if (mysqli_num_rows($res) == 1) {
        //         while ($row = mysqli_fetch_assoc($res)) {
        //             if (password_verify($password, $row['password'])) {
        //                 session_start();
        //                 //store data into session
        //                 // $_SESSION['role'] = $role;
        //                 // $_SESSION['loggedIn'] = TRUE;
        //                 // $_SESSION['username'] = $username;
        //                 // header("location:user.php");
        //                 // $_SESSION['role'] = $role;
        //                 $_SESSION['username'] = $username;
        //                 // $_SESSION['role'] = $role;
        //                 if($role == '1'){
        //                     $_SESSION['username'] = $username;
        //                     header("Location:admin.php");
        //                 }
        //                 elseif($role == '0')
        //                 {
        //                     $_SESSION['username'] = $username;
        //                     header("Location:user.php");
        //                 }
        //                 else{
        //                     echo 'invalid username or password';
        //                 }





        //                 // if($_SESSION['role']=="1"){
        //                 //     header("Location:admin.php");

        //                 // }
        //                 // else{
        //                 //     header("location:user.php");
        //                 // }
        //             } else {
        //                 $passErr = "incorrect username or password! please try again";
        //             }


        //         }
        //     }
        // }
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <!-- <link rel="stylesheet" href="./jquery.min.js"> -->
    <title>Login Form</title>
</head>

<body>

    <div class="all_wrapper">
    
        <form method="post" action="">
            <div class="wrapper">
                <div class="form_heading">
                    <h2>Login Form</h2>
                </div>
                <!-- second wrapper  -->
                <div class="second_wrapper">
                    <div class="username">
                        <label for="username">username</label>
                        <br>
                        <input type="text" name="name">
                        <div class="error">
                            <?php echo $nameErr; ?>
                        </div>
                        <div class="error">
                            <?php echo $nameErrvalid; ?>
                        </div>
                    </div>
                    <div class="pass">
                        <label for="password">password</label>
                        <br>
                        <input type="password" name="pass">
                        <div class="error">
                            <?php echo $passwordErr; ?>
                        </div>
                        <div class="error">
                            <?php echo $passwordErrvalid; ?>
                        </div>
                    </div>
                    <div class="error">
                        <?php echo $passErr; ?>
                    </div>
                    <a class="forgot" href="">Forgot password?</a>
                    <div class="button">
                        <input type="submit" id="submit" name="submit" value="Login" class="login_button">
                        <img src="./assets/icons/login.svg" alt="login_icon" class="login_img">

                    </div>
                    <div class="prev_account">
                        <p>Don't have an account?<a href="./signup.php">Create an account</a> </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>