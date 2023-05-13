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

// $sql = "CREATE TABLE user(
//     id int primary key AUTO_INCREMENT,
//     firstname varchar(100) not null unique,
//     lastname varchar(100) not null unique,
//     contact varchar(100) not null unique,
//     email varchar(100) not null unique,
//     username varchar(100) not null unique,
//     password varchar(100) not null unique
// )";
// $result = mysqli_query($conn,$sql);
// if($result){
//     echo "<script>alert('table created successfully')</script>";
// }
// else{
//     die("Terminate");
// }

$sql = "Create table vehicle(

)";




?>