<?php
$serverName = "localhost";
$username1 = "root";
$password1 = "";
$db_name = "project_test";

$conn = mysqli_connect($serverName,$username1,$password1,$db_name);
if(!$conn){
    die("Terminated");
}
// $sql = "CREATE DATABASE project_test";
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
//     die("Terminated");
// }

// $sql = "CREATE TABLE vehicle(
//     id int primary key AUTO_INCREMENT,
//     vehicle_platenumber int unsigned unique not null,
//     vehicle_category varchar(100) not null,
//     vehicle_type varchar(100) not null,  
//     user_id int,
//     foreign key(user_id) references user(id) 
//     ON UPDATE CASCADE
//     ON DELETE CASCADE         
// )";

// $result = mysqli_query($conn,$sql);
// if($result){
//     echo "Table successfully created";
// }
// else{
//     die ("Table not created");
// }

// creating table duration
// $query = "CREATE TABLE duration(
//     entry_time datetime not null,
//     exit_time datetime not null,
//     vehicle_id int,
//     foreign key (vehicle_id) references vehicle(id)
//     on update cascade
//     on delete cascade
//     parkingslot_id int,
//     foreign key (parkingslot_id) references parking(id)
//    on update cascade
//    on delete cascade
// )";

// $res = mysqli_query($conn,$query);
// if($res){
//     echo "table created successfully";
// }
// else{
//     echo "table not created";
// }

// $sql = "CREATE TABLE parking (
//     id int NOT NULL,
//     parkingslot_number int unsigned NOT NULL,
//     parking_status varchar(100) NOT NULL,
//     vehicle_id int,
//     foreign key (vehicle_id) references vehicle(id)
//     ON UPDATE CASCADE 
//     ON DELETE CASCADE
//   )";
//   $result = mysqli_query($conn,$sql);
//   if($result){
//     echo "table created successfully";
//   }
//   else{
//     echo "table not created" or die("terminated");
//   }
?>