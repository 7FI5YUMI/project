<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin-park.css">
    <title>Document</title>
</head>
<body>
<button class="add-parking">
        <a href="./parking-insert-admin.php">Add parking slot</a>
    </button>
    <table class="vehicle_park-admin" border="1">
        <tr>
            <th class="park-vehicle">sn</th>
            <th class="park-vehicle">parking slot number</th>
            <th class="park-vehicle">parking status</th>
            <th class="park-vehicle">Action</th>
        </tr>
        <?php
                include("./database/databaseconn.php");

                $sql = "SELECT *  from parking";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $parkingNumber = $row['parkingslot_number'];
                        $parkingStatus= $row['parking_status'];
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$parkingNumber.'</td>
                        <td>'.$parkingStatus.'</td>
                        <td>
                         <button class="button"><a href="parking_delete.php?deleteid='.$id.'">Delete</a></button>
                        </td>    
                                
                        </tr>';
                    }
                    echo "</table>";
                } else {
                    echo "0 result";
                }
                ?>
    </table>
    
</body>
</html>