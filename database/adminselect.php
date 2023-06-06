<?php
function fourWheelerCount(){
    $serverName = "localhost";
     $username1 = "root";
    $password1 = "";
    $db_name = "project_test";
    $conn = mysqli_connect($serverName,$username1,$password1,$db_name);
    if(!$conn){
    die("Terminated");
    }
    $sql = "SELECT COUNT(*) FROM vehicle where vehicle_category = 'four_wheeler'";
   $result = mysqli_query($conn,$sql);
   while($row = $result->fetch_assoc()){
        echo $row['COUNT(*)'];
    }
}

function twoWheelerCount(){
    $serverName = "localhost";
     $username1 = "root";
    $password1 = "";
    $db_name = "project_test";
    $conn = mysqli_connect($serverName,$username1,$password1,$db_name);
    if(!$conn){
    die("Terminated");
    }
    $sql = "SELECT COUNT(*) FROM vehicle where vehicle_category = 'two_wheeler'";
   $result = mysqli_query($conn,$sql);
   while($row = $result->fetch_assoc()){
        echo $row['COUNT(*)'];
    }
}








?>