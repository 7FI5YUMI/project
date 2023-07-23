<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user_parking.css">
    <title>Document</title>
    <style>
        .footer-user-parking {
            width: 100%;
            margin-top: 12.6%;
        }
    </style>
</head>

<body>
    <?php include("./include/after-login-nav.php"); ?>
    <h1 class="parking-header">Choose to generate ticket </h1>
    <div class="box-wrapper">

        <?php
        include("./database/databaseconn.php");
        $sql = "SELECT ticket_number  from ticket where status = 'free'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ticket_number = $row['ticket_number'];
                echo ' <div class="box">
                    
                         <button class="button-remove"><a class="parking-lot" href="ticket.php?q=' . urlencode($ticket_number) . '">' . $ticket_number . '</a></button>
   
                                
                        </div>';


            }
            // echo "</table>";
        
        } else {
            echo "0 result";
        }
        ?>
    </div>
    <div class="error">
        <?php echo $vehicleIdExistErr; ?>
    </div>
    <div class="footer-user-parking">
        <?php include("./include/footer.php"); ?>
    </div>
</body>

</html>