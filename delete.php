<?php
require("./database/databaseconn.php");

if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $query = "DELETE from vehicle where id = $deleteid";
    $result = mysqli_query($conn, $query);
    if ($result) {
       echo "success";
    } else {
        die("not deleted");
    }
}




?>