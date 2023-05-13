<?php
 session_start();
 include("./database/databaseconn.php");

?>
<?php
if(isset($_POST['park'])){
    header("location:vehicle.php");
}

if(isset($_POST['book'])){
    header('location:vehicle.php');     
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user.css">
    <title>Users</title>
</head>
<body>
<div class="navigation">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="./assets/logo/logo.png" alt="logo" class="logo-img">
            </div>
            <div class="nav-menu">
                <ul class="nav-list">
                    <li><a href="user.php">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Payment</a></li>
                </ul>

            </div>
            <div class="nav-login">
                <div class="nav-login_button">
                    <button><a class="login-button-text" href="./logout.php">Logout</a></button>
                </div>
            </div>
        </nav>
    </div>
    
    <main class="main">
        <div class="main-welcome-text">
            <h2>Hello <?php echo $_SESSION['username']; ?></h2>
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
                        <h2 class="bike-head-text">Four Wheeler</h2>
                    </div>
                </div>
                <div class="box-bike-list">
                    <ul class="bike-list">
                        <li>Parking fees: 50/hr</li>
                        <li>Vehicle type: Four Wheeler</li>
                    </ul>
                </div>
                <div class="button-park">
                    <form method="post" action="">
                    <input type="submit" name="park" class="button-parking" value="next">
                    </form>
                </div>
                <!-- <div class="button-book">
                    <button class="button-booking"><a href="#">Book here</a></button>
                </div> -->
            </div>
            <div class="box-bike">
                <div class="image">
                    <img src="./assets/icons/Directions car.svg" alt="car">
                    <div class="bike-head">
                        <h2 class="bike-head-text">Four Wheeler</h2>
                    </div>
                </div>
                <div class="box-bike-list">
                    <ul class="bike-list">
                        <li>Parking fees: 50/hr</li>
                        <li>Vehicle type: Four Wheeler</li>
                    </ul>
                </div>
                <div class="button-park">
                    <form method="post" action="">
                    <input type="submit" name="book" class="button-parking" value="next">
                    </form>
                </div>
                <!-- <div class="button-book">
                    <button class="button-booking"><a href="#">Book here</a></button>
                </div> -->
            </div>
            <div class="box-bike">
                <div class="image">
                    <img src="./assets/icons/Parking.svg" alt="bike">
                    <div class="bike-head">
                        <h2 class="bike-head-text">View parking slot</h2>
                    </div>
                </div>
                <div class="button-parking-slot-one">
                    <button class="button-parking-slot"><a href="#">View parkingslot</a></button>
                </div>
            </div>
            
        </div>
        
    </section>

    <?php include("./include/footer.php");?>
</body>
</html>