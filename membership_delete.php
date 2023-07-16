<?php
require("./database/databaseconn.php");

if (isset($_GET['deleteid'])) {
    $membershipDelete = $_GET['deleteid'];
    $query = "DELETE from membership where id = $membershipDelete";
    $result = mysqli_query($conn, $query);
    if ($result) {
       echo "<script>alert('deleted successfully');</script>";
    } else {
        die("not deleted");
    }
}




?>