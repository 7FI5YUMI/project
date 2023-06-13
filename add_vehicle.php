<?php
require("./database/databaseconn.php");

// if(isset($_POST['addVehicle'])){
//     // header("Location:adminvehicle.php");

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/add_vehicle.css">
    <script src="./jquery.min.js"></script>
    <title>vehicle add and details</title>
    <style>
        
    </style>

</head>

<body>
    <button class="add_vehicle" id="add_v">
        <a href="" onclick="show()">Add vehicle</a>
    </button>

    <h2>Enter details of vehicle</h2>
    <table class="vehicle_add-admin" border="1" id="table_vehicle">
        <tr>
            <th class="head_vehicle">id</th>
            <th class="head_vehicle">vehicle_platenumber</th>
            <th class="head_vehicle">vehicle category</th>
            <th class="head_vehicle">vehicle type</th>
            <!-- <th class"head_vehicle">Action</th> -->
            <th class="head_vehicle">action</th>
        </tr>
        <?php
        include("./database/databaseconn.php");
        $sql = "SELECT *  from vehicle";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $vehiclePlate = $row['vehicle_platenumber'];
                $vehicle_category = $row['vehicle_category'];
                $vehicle_type = $row['vehicle_type'];
                echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $vehiclePlate . '</td>
                        <td>' . $vehicle_category . '</td>
                        <td>' . $vehicle_type . '</td>
                        <td>
                         <button class="button remove" style="color: red"><a href="delete.php?deleteid=' . $id . '">Delete</a></button>
                        </td>    
                                
                        </tr>';
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
        ?>


    </table>
    <script type="text/javascript">
        $(".remove").click(function () {
            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?')) {
                $.ajax({
                    url: '/delete.php',
                    type: 'GET',
                    data: { id: deleteid },
                    error: function () {
                        alert('Something is wrong');
                    },
                    success: function (data) {
                        $("#" + id).remove();
                        alert("Record removed successfully");
                    }
                });
            }
        });


    </script>

    
</body>

</html>