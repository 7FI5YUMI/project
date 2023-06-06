<?php
include("./database/databaseconn.php");
function callTwoWheeler(){
    include("./database/databaseconn.php");
    $sql = "SELECT vehicle_category from vehicle where vehicle_category = 'two_wheeler'";
    $res = mysqli_query($conn,$sql);
    if($res==1){
        
    }

}
callTwoWheeler();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/category.css">
    <title>Document</title>
</head>
<body>
    <div class="table">
        <table class="v_category" border="1">
            <tr>
                <th class="category_head">S.No</th>
                <th class="category_head">vehicle category</th>
                <th class="category_head">action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Two wheeler</td>
                <td class="action">
                    <button type="submit" class="edit" ><a href="./include/update.php?updateid='.$id.'"></a></button>
                    <button type="submit" class="delete">Delete</button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Four wheeler</td>
                <td class="action">
                    <button type="submit" class="edit">Edit</button>
                    <button type="submit" class="delete">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>