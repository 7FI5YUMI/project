<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="navigation_wrapper">
        <section class="navigation">
            <div class="nav-wrapper">
                <div class="head_nav">
                    <h1>Dashboard</h1>
                    <span class="dash_img"><img src="./assets/icons/Dashboard.svg" alt="dashboard">
                    </span>
                </div>
                <div class="account">
                    <img src="./assets/icons/Administrator Male.svg" alt="admin_male">
                </div>
            </div>
        </section>
    </div>
    <aside class="sidebar">

        <h2 class="logo" style="text-align: center; color:white">VPMS</h2>
        <div class="admin_name">
            <img class="admin-img" src="./assets/icons/Administrator Male (1).svg" alt="">
            <span>Admin_name</span>
        </div>
        <div class="all_wrapper">
            <div class="sidebar_content">
                <ul class="sidebar-content-items">
                    <li>
                        <span class="image">
                            <a href="#">
                                <img class="sidebar-img" src="./assets/icons/Add New.svg" alt="addnew">
                            </a>
                            <a href="#">Add Vehicle</a>
                        </span>
                    </li>
                    <li>
                        <span class="image">
                            <a href="#">
                                <img class="sidebar-img" src="./assets/icons/Category.svg" alt="category">
                            </a>
                            <a href="#">category</a>
                        </span>
                    </li>
                    <li>
                        <span class="image">
                            <a href="#">
                                <img class="sidebar-img" src="./assets/icons/Book online.svg" alt="Booking">
                            </a>
                            <a href="#">booking</a>
                        </span>

                    </li>
                    <li>
                        <span class="image">
                            <a href="#">
                                <img class="sidebar-img" src="./assets/icons/Parking.svg" alt="parking">
                            </a>
                            <a href="#">parking</a>
                        </span>
                    </li>
                    <li>
                        <span class="image">
                            <a href="#">
                                <img class="sidebar-img" src="./assets/icons/Payments.svg" alt="payment">
                            </a>
                            <a href="#">payment</a>
                        </span>
                    </li>
                    <li>
                        <span class="image">
                            <a href="#">
                                <img class="sidebar-img" src="./assets/icons/Logout.svg" alt="logout">
                            </a>
                            <a href="#">logout</a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <main id="main_content">
        <div class="adminname-display">
            <h2>Hello admin_name</h2>
            <h3 class="welcome">Welcome to the dashboard</h3>
        </div>
        <div class="box-wrapper--one">
            <div class="box_car">
                <div class="box_car-item">
                    <div class="number">22/70</div>
                    <div class="car_logo">
                        <img src="./assets/icons/Directions car.svg" alt="">
                    </div>
                    
                </div>
                <div class="head">Total four wheeler</div>
                <div class="more_info">
                    <p>More info</p><span><img src="./assets/icons/More Info.svg" alt=""></span>
                 </div>
            </div>
            <div class="box_bike">
                <div class="box_bike-item">
                    <div class="number">22/70</div>
                    <div class="bike_logo">
                        <img src="./assets/icons/bike.svg" alt="">
                    </div>
                </div>
                <div class="head">
                    Total two wheeler
                </div>
                <div class="more_info">
                    <p>More info</p><span><img src="./assets/icons/More Info.svg" alt=""></span>
                 </div>
            </div>
        </div>
        <div class="box-wrapper--two">
            <div class="box_parking">
                <div class="box_parking-item">
                    <div class="number">22/70</div>
                    <div class="parking_logo">
                        <img src="./assets/icons/parking.svg" alt="">
                    </div>
                    
                </div>
                <div class="head">Parking Slot</div>
                <div class="more_info">
                    <p>More info</p><span><img src="./assets/icons/More Info.svg" alt=""></span>
                 </div>
            </div>
            <div class="box_booking">
                <div class="box_booking-item">
                    <div class="number">22/70</div>
                    <div class="booking_logo">
                        <img src="./assets/icons/booking.png" alt="">
                    </div>
                    
                </div>
                <div class="head">Booking Status</div>
                <div class="more_info">
                   <p>More info</p><span><img src="./assets/icons/More Info.svg" alt=""></span>
                </div>
            </div>
            
        </div>
    </main>
    <footer>
        <div class="copyright_wrapper">
            <div class="copyright">
                <p>&copy; All rights reserved-2023 vehicle parking management system</p>
            </div>
        </div>
    </footer>
</body>

</html>