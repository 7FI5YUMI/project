<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/parking.css">
    <title>Parking</title>
</head>
<body>
    <div class="navigation">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="./assets/logo/logo.png" alt="logo" class="logo-img">
            </div>
            <div class="nav-menu">
                <ul class="nav-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Payment</a></li>
                </ul>

            </div>
            <div class="nav-login">
                <div class="nav-login_button">
                    <button><a class="login-button-text" href="">Logout</a></button>
                </div>
            </div>
        </nav>
    </div>

    <div class="wrapper">
        <form method="post" action="">
            <div class="wrapper-two">
                <div class="parking-text-one">
                    <h2 class="parking-text">Choose slot for parking</h2>
                </div>
                <div class="parking_id">
                    <label for="parkingid">Parking_id</label>
                    <br>
                <input type="text" name="parking_id" class="parking">
                </div>
                <div class="parkind_slot_num">
                    <label for="parking_slot_number">Parking_slot_number</label>
                    <br>
                <input type="text" name="parking_slot_number" class="parking">
                </div>
                <div class="parking_status">
                    <label for="parking_status">Parking status</label>
                    <br>
                <input type="text" name="parking_status" class="parking">
                </div>
                <div class="parking_button">
                    <input type="submit" name="submit" class="parking-login">
                </div>
            </div>
        </form>
    </div>

    <?php include("./include/footer.php"); ?>
</body>
</html>