<?php 
include "connection.php";
$cateName  = $_POST['cateName'];
$status = $_POST['status'];

$query = "INSERT INTO `category`(`name`, `status`) VALUES ('$cateName','$status') ";
mkdir("../wallpaper/".$cateName);
$result = mysqli_query($con, $query);
header('Location: ../'); 


?>