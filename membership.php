<?php
include("./database/databaseconn.php");
$fnameErr = $lnameErr = $unameErr = $phoneErr = $emailErr = $joinDateErr = "";
$fnameValidErr = $lnameValidErr = $phoneValidErr = $emailValidErr = "";
if (isset($_POST['submit'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $userName = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $joinDate = $_POST['join-date'];
    $nameValid = "/^([a-zA-Z]+)$/";
    $phoneValid = "/^98[0-9]{8}+$/";

    if (empty($firstname)) {
        $fnameErr = "firstname is required";
    } elseif (!preg_match($nameValid, $firstname)) {
        $fnameValidErr = "Name should only contatin letters";
    } elseif (empty($lastname)) {
        $lnameErr = "lastname is required";
    } elseif (!preg_match($nameValid, $lastname)) {
        $lnameValidErr = "Lastname should only contain letters";
    } elseif (empty($userName)) {
        $unameErr = "username is required";
    } elseif (empty($phone)) {
        $phoneErr = "phone is required";
    } elseif (!preg_match($phoneValid, $phone)) {
        $phoneValidErr = "phone format doesn't match";
    } elseif (empty($email)) {
        $emailErr = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailValidErr = "Email shoud be in format";
    } elseif (empty($joinDate)) {
        $joinDateErr = "join date is required";
    } else {
        $sql = "INSERT INTO membership(firstname,lastname,username,phone,email,joinDate)
        VALUES('$firstname','$lastname','$userName','$phone','$email','$joinDate')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('registered successfully as member')</script>";
        } else {
            echo "didn't registered";
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
    <link rel="stylesheet" href="./styles/membershipUser.css">
    <title>Membership form</title>
</head>

<body>
    <div class="wrapper">
        <div class="text-head">
            <h2>Do you want to become member?</h2>
        </div>
        <div class="wrapper-all">
            <form action="" method="POST">

                <div class="fl-wrapper">
                    <div class="fname">
                        <label for="fname">Firstname</label>
                        <br>
                        <input type="text" name="fname" class="f_input">
                        <div class="error">
                            <?php echo $fnameErr; ?>
                            <?php echo $fnameValidErr ?>
                        </div>
                    </div>
                    <div class="lname">
                        <label for="lname">Lastname</label>
                        <br>
                        <input type="text" name="lname" class="l_input">
                        <div class="error">
                            <?php echo $lnameErr; ?>
                            <?php echo $lnameValidErr; ?>
                        </div>

                    </div>
                </div>
                <br>
                <div class="username">
                    <label for="uname">username</label>
                    <br>
                    <input type="text" name="username" class="uname_input">
                    <div class="error">
                        <?php echo $unameErr; ?>
                    </div>
                </div>
                <br>
                <div class="phone">
                    <label for="phone">phone</label>
                    <br>
                    <input type="text" name="phone" class="phone_input">
                    <div class="error">
                        <?php echo $phoneErr; ?>
                        <?php echo $phoneValidErr; ?>
                    </div>
                </div>
                <br>
                <div class="email">
                    <label for="email">Email</label>
                    <br>
                    <input type="text" name="email" class="email_input">
                    <div class="error">
                        <?php echo $emailErr; ?>
                        <?php echo $emailValidErr; ?>
                    </div>
                </div>
                <br>
                <div class="join-date">
                    <label for="join-date">Join date</label>
                    <br>
                    <input type="date" name="join-date" class="join-date_input">
                    <div class="error">
                        <?php echo $joinDateErr; ?>
                    </div>

                </div>
                <br>
                <div class="submit">
                    <input type="submit" name="submit" class="submit_input">
                </div>

            </form>
        </div>
    </div>

</body>

</html>