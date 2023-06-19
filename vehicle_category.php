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

    <!-- <button class="add-category">
        <a href="">Add category</a>
    </button> -->
    <button id="myBtn" class="add-category">Add vehicle</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div>hello some text here!</div>
        </div>

    </div>

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
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>