<?php
include("./database/databaseconn.php");
session_start();
//  $user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user-style.css">
    <title>Users</title>
</head>

<body onload="loaderBefore()" style="margin:0">
    <div id="load"></div>
    <div id="myDiv" style="display: none;" class="animate-bottom">
    <div class="navigation">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="./assets/logo/logo.png" alt="logo" class="logo-img">
            </div>
            <div class="nav-menu">
                <ul class="nav-list">
                    <li><a href="user.php">Home</a></li>
                    <li><a href="#about-us">About us</a></li>
                    <li><a href="#">Payment</a></li>
                </ul>
            </div>
            <div class="nav-login">
                <div class="profile">
                    <a href="./profile.php">
                        <img src="./assets/icons/profile.svg" alt="profile" class="profile-img">
                    </a>
                </div>
                <div class="nav-login_button">
                    <button class="logout-btn">
                        <img src="./assets/icons/Logout (1).svg" alt="logout" class="logout-img">
                        <a class="login-button-text" href="./logout.php">Logout</a>
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <main class="main">
        <div class="main-welcome-text">
            <h2>Hello
                <?php echo $_SESSION['username']; ?>
            </h2>
            <h3>Welcome to the users panel</h3>
        </div>
    </main>

    <section class="vehicle-category">
        <div class="vehicle-list-header">
            <h3 class="vehicle-list-head">Choose what you want to park</h3>
        </div>
        <div class="vehicle-category_wrapper">
            <div class="box-bike">
                <div class="image">
                    <img src="./assets/icons/Directions car.svg" alt="car">
                    <div class="bike-head">
                        <h2 class="bike-head-text">Register your vehicle here</h2>
                    </div>
                </div>
                <div class="box-bike-list">
                    <ul class="bike-list">
                        <li>Parking fees: 25/hr for twowheeler</li>
                        <li>Parking fees: 50/hr for fourwheeler</li>
                        <li>Vehicle type: Four Wheeler or two wheeler</li>
                    </ul>
                </div>
                <div class="button-park">
                    
                       <button class="button-add-vehicle">
                        <a href="./vehicle.php">Register vehicle</a>
                       </button>
                
                </div>
            </div>
            <div class="box-bike">
                <div class="image">
                    <img src="./assets/icons/Parking.svg" alt="bike">
                    <div class="bike-head">
                        <h2 class="bike-head-text">View parking slot</h2>
                    </div>
                </div>
                <div class="button-parking-slot-one">
                    <button class="button-parking-slot"><a href="./userparking.php">View parkingslot</a></button>
                </div>
            </div>

        </div>

    </section>
    <section class="questionaire">
        <div class="questionaire-wrapper">
            <div class="questionaire-box">
                <h3>Do you want to become member?</h3>
            </div>
            <div class="membership-button">
                <button class="membership-btn">
                    <a href="./membership.php" class="Btn">Click here</a>

                </button>
            </div>
        </div>
    </section>

    <section id="about-us">
        <h2 class="about-us_head">About us</h2>
        <div class="aboutus_wrapper">
            <div class="left-side">
                <p class="left-side_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur
                    repudiandae similique beatae officiis voluptates! Aut sapiente similique esse reiciendis? Asperiores
                    iusto natus eius voluptates ratione, dolorum blanditiis excepturi nisi quas animi rerum suscipit
                    sapiente officiis odio, beatae perspiciatis incidunt! Dicta aut id minus, cum blanditiis magnam
                    perspiciatis quo, distinctio at veritatis quaerat expedita repellat tenetur?</p>

            </div>
            <div class="right-side">
                <img src="./assets/icons/vehicle-about.png" alt="about-us_img" class="about-img">
            </div>
        </div>
    </section>
    <div class="footer-user">
        <?php include("./include/footer.php"); ?>
    </div>
</div>

    <script>
        var myVar;
        var loader = document.getElementById('load');
        function loaderBefore() {
            // loader.style.display = 'none';
            myVar = setTimeout(showPage, 3000);

        }
        function showPage() {
            document.getElementById("load").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
    </script>
</body>

</html>