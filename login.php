<?php
require("./database/databaseconn.php");
// $login = false;
// session_start();
$usernameExistErr = "";
$nameErr = $passwordErr = "";
$nameErrvalid = $passwordErrvalid = "";
$passErr = $secLastErr = $lastErr =  "";
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
    } else {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        // $role = mysqli_fetch_assoc($res);

        if ($res > 0) {
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    // $role = mysqli_fetch_assoc($res);
                    if (password_verify($password, $row['password'])) {
                        // $role = mysqli_fetch_assoc($res);
                        if ($row['role'] == '1') {
                            // $login = true;
                            session_start();
                            $_SESSION['admin'] = $username;
                            // $_SESSION['loggedIn'] == TRUE;
                            header("Location:admin.php");

                        } else {
                            // $login = true;
                            session_start();
                            $_SESSION['username'] = $username;
                            // $_SESSION['loggedIn'] == TRUE;
                            header("Location:user.php");
                        }
                    } else {
                       $secLastErr =  "Invalid username or password";
                    }
                }

            }
            else {
                $lastErr =  "User not found please register";
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
    <link rel="stylesheet" href="styles/login-all.css">
    <script src="./jquery.min.js"></script>
    <title>Login Form</title>
  
</head>

<body>

    <div class="all_wrapper">

        <form method="post" id="myForm" action="">
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
                    <div class="error">
                        <?php echo $secLastErr;?>
                    </div>
                    <div class="error">
                        <?php echo $lastErr;?>
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
    <div class="loader"></div>
</body>

</html>