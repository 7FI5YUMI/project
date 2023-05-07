<?php
$serverName = "localhost";
$username1 = "root";
$password1 = "";
$db_name = "project_test";

$conn = mysqli_connect($serverName,$username1,$password1,$db_name);
if($conn){
    echo "connected successfully";
}
else{
    die("Terminated");
}


$sql = "CREATE DATABASE test_input";
if(mysqli_query($conn,$sql)){
    echo "sucess";
}
else{
    echo "unsuccess";
}





?>