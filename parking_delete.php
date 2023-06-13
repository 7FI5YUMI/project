<?php
require("./database/databaseconn.php");

if (isset($_GET['deleteid'])) {
    $parkingDeleteId = $_GET['deleteid'];
    $query = "DELETE from parking where id = $parkingDeleteId";
    $result = mysqli_query($conn, $query);
    if ($result) {
       echo "<script>confirm('are you sure to delete it?')</script>";
    } else {
        die("not deleted");
    }
}




?>