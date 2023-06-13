<?php
include("./database/databaseconn.php");
// $sql = "SELECT vehicle_category from vehicle where vehicle_category ='two_wheeler' or vehicle_category = 'four_wheeler';";
// $result = mysqli_query($conn,$sql);
// while($row = mysqli_fetch_assoc($result)){
//     $two = $row['vehicle_category'];
//     $four = $row['two_wheeler'];
// }

$twoWheelerSelect = "SELECT DISTINCT vehicle_category FROM vehicle WHERE vehicle_category IN ('two_wheeler','four_wheeler')";
$res = mysqli_query($conn, $twoWheelerSelect);
while ($row = mysqli_fetch_assoc($res)) {
    $twoWheeler = $row['vehicle_category'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/vehicle-category.css">
    <title>Document</title>
</head>

<body>

    <button class="add-category">
        <a href="">Add category</a>
    </button>
    <div class="table">
        <table class="v_category" border="1">
            <tr>
                <th class="category_head">s.no</th>
                <th class="category_head">vehicle category</th>
                <th class="category_head">action</th>
            </tr>
            <?php
            include("./database/databaseconn.php");
            $categorySelect = "SELECT DISTINCT *  FROM vehicle WHERE vehicle_category IN ('two_wheeler','four_wheeler')";
            $result = mysqli_query($conn, $categorySelect);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category = $row['vehicle_category'];
                    $cateId = $row['id'];
                    echo '<tr>
                        <td>' . $cateId . '</td>
                        <td>' . $category . '</td>
                        <td>
                         <button class="button btn-delete"><a href="category-delete.php?deleteid=' . $cateId . '">Delete</a></button>
                        </td>    
   
                                
                        </tr>';
                }
                echo "</table>";
            } else {
                echo "0 result";
            }
            ?>
        </table>
    </div>
</body>

</html>