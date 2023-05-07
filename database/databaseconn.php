<?php
$serverName = "localhost";
$username1 = "root";
$password1 = "";
$db_name = "project_test";

$conn = mysqli_connect($serverName,$username1,$password1,$db_name);
if(!$conn){
    die("Terminated");
}



// $sql = "CREATE DATABASE Project";
// if(mysqli_query($conn,$sql)){
//     echo "sucess";
// }
// else{
//     echo "unsuccess";
// }





?>