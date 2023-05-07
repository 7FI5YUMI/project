<?php
 include("./database/databaseconn.php");
$firstNameErr = $lastNameErr = $phoneErr = $userNameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
$firstNameValidErr = $lastNameValidErr = $phoneValidErr =  $userNameValidErr = $emailErrvalid = $passwordValidErr = $confirmPasswordValidErr = $confirmPasswordErr1 =  "";
if(isset($_POST['register'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $phone = $_POST['phone'];
    //username
    $userName = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $nameValid = "/^([a-zA-Z]+)$/";
    $phoneValid = "/^98[0-9]{10}+$ /";
    $confirmPassword = $_POST['cpass'];
    if(empty($firstName)){
        $firstNameErr = "Firstname is required";
    }
    elseif(!preg_match($nameValid,$firstName)){
        $firstNameValidErr = "name must be of letters";
        
    }
    elseif(empty($lastName)){
        $lastNameErr = "Lastname is required";
    }
    elseif (!preg_match($nameValid,$lastName)) {
        $lastNameValidErr = "lastname must be of letters";
    }
    // elseif(empty($phone)){
    //     $phoneErr = "phone is required";
    // }
    // elseif (!preg_match($phoneValidErr,$phone)) {
    //     $phoneValidErr = "phone number must be 10 and in a valid format";
    // }
    elseif(empty($userName)){
        $userNameErr = "username is required";
    }
    elseif(empty($email)){
        $emailErr = "Email is required";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailErrvalid = "Please enter valid email";
    }
    elseif(empty($password)){
        $passwordErr = "password is required";
    }
    elseif(strlen($password)<8){
        $passwordValidErr = "password must be of 8 characters";
    }
    elseif(empty($confirmPassword)){
        $confirmPasswordErr = "password is required";
    }
    elseif(strlen($confirmPassword)<8){
        $confirmPasswordValidErr = "password must be of 8 characters";
    }
    elseif($password!==$confirmPassword){
        $confirmPasswordErr1 = "password do not match";
    }
    else{
        $query = "INSERT INTO USER(firstname,lastname,contact,email,username,password,confirmpassword)VALUES('$firstName','$lastName',$phone,'$email','$userName','$password','$confirmPassword')";
    $result = mysqli_query($conn,$query);
    if($result){
        header("location:login.php");
    }
    else{
        die("Terminated");
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
    <link rel="stylesheet" href="./styles/register.css">
    <title>Signup Form</title>
</head>
<body>
    <div class="fl_wrapper">
        <form method="post" action="">
            <div class="second_wrapper">
                <div class="header_text">
                    <h3>Sign Up Form</h3>
                    <p class="desc">Its quick and easy</p>
                </div>
                <div class="fl_wrapper">
                    <div class="fname">
                        <label for="firstName">Firstname</label>
                        <br>
                        <input type="text" name="fname" class="fname_input">
                        <div class="error"><?php echo "*".$firstNameErr; ?></div>
                        <div class="error"><?php echo $firstNameValidErr; ?></div>
                    </div>
                    <div class="lname">
                        <label for="lastName">Lastname</label>
                        <br>
                        <input type="text" name="lname" class="lname_input">
                        <div class="error"><?php echo "*".$lastNameErr; ?></div>
                        <div class="error"><?php echo $lastNameValidErr; ?></div>
                    </div>
                </div>
                <div class="phone">
                    <label for="phone">phone</label>
                    <br>
                    <input type="text" name="phone" class="phone_input">
                    <div class="error"><?php echo "*".$phoneErr; ?></div>
                    <div class="error"><?php echo $phoneValidErr; ?></div>
                </div>
                <!-- copy gareko tala bata -->
                <div class="uname">
                    <label for="username">Username</label>
                    <br>
                    <input type="text" name="uname" class="uname_input">
                    <div class="error"><?php echo "*".$userNameErr; ?></div>
                    <div class="error"><?php echo $userNameValidErr; ?></div>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <br>
                    <input type="text" name="email" class="email_input">
                    <div class="error"><?php echo "*".$emailErr; ?></div>
                    <div class="error"><?php echo $emailErrvalid; ?></div>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="pass">
                    <div class="error"><?php echo "*".$passwordErr; ?></div>
                    <div class="error"><?php echo $passwordValidErr; ?></div>
                </div>
                <div class="cpassword">
                    <label for="confirmPassword">Confirm password</label>
                    <br>
                    <input type="password" name="cpass">
                    <div class="error"><?php echo "*".$confirmPasswordErr; ?></div>
                    <div class="error"><?php echo $confirmPasswordValidErr; ?></div>
                    <div class="error"><?php echo $confirmPasswordErr1; ?></div>
                </div>
                <div class="button">
                    <input type="submit" name="register" value="Register" class="register_button">
                </div>
                <div class="prev_account">
                    <p>Already have an account?<a href="#">Login</a> </p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>