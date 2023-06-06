<?php
require("./database/databaseconn.php");

if(isset($_POST['addVehicle'])){
    header("Location:vehicle.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/add-vehicle.css">
    <title>vehicle add and details</title>
    
</head>
<body>
   <form action="" method="post">
   <input type="submit" name="addVehicle" id="vehicleAdd" class="addVehicle" value="add vehicle" onclick="display()">
   </form>
    
    <h2>Enter details of vehicle</h2>
    <table class="vehicle_add-admin" border="1">
        <tr>
            <th class="head_vehicle">id</th>
            <th class="head_vehicle">vehicle_platenumber</th>
            <th class="head_vehicle">vehicle category</th>
            <th class="head_vehicle">vehicle type</th>
            <!-- <th class="head_vehicle">action</th> -->
        </tr>
        <?php
                include("./database/databaseconn.php");
                $sql = "SELECT *  from vehicle";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>"
                         .$row['id'] 
                         ."</td><td>" 
                         .$row['vehicle_platenumber'] . "</td><td>" . $row['vehicle_category'] . "</td><td>" . $row['vehicle_type'] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 result";
                }
                ?>
        
       
    </table>

    <script>

        function display(){
            document.getElementById('vehicleAdd').style.display = "none";
        }
    </script>
    
</body>

</html>