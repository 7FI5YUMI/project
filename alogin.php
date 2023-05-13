<?php
require("./database/databaseconn.php");
$nameErr = $passwordErr = "";
$nameErrvalid = $passwordErrvalid = "";
if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $password = $_POST['pass'];

    if(empty($name)){
        $nameErr = "username is required";
    }
    else if(strlen($name)<8){
        $nameErrvalid = "username should be of 8 character";
    }
    else{
        echo $name;
    }
    if(empty($password)){
        $passwordErr = "Password is required";
    }
    else if(strlen($password)<=8){
         $passwordErrvalid = "password should be of 8 character ";
    }
    else{
        $query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $res = mysqli_query($conn,$query);
        $count = mysqli_num_rows($res);
        if($count>0){
            session_start();
            $row = mysqli_fetch_assoc($res);
            // $_SESSION['Role'] = $row->role;
            $_SESSION['loggedin'] = TRUE;
            if($row['role']==0){
                header("Location:admin.php");
            }if($row['role']==1){
               header("Location:user.php");

            }
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
    <link rel="stylesheet" href="styles/login.css">
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
                        <div class="error"><?php echo $nameErr;?></div>
                        <div class="error"><?php echo $nameErrvalid;?></div>
                    </div>
                    <div class="pass">
                        <label for="password">password</label>
                        <br>
                        <input type="password" name="pass">
                        <div class="error"><?php echo $passwordErr;?></div>
                        <div class="error"><?php echo $passwordErrvalid;?></div>
                    </div>
                    <a class="forgot" href="">Forgot password?</a>
                    <div class="button">
                        <input type="submit" name="submit" value="Login" class="login_button">
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