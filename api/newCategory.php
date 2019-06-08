<?php 
include "connection.php";
$cateName  = $_POST['cateName'];
$status = $_POST['status'];

  $file_name=$_FILES["image"]["name"];
  $file_tmp=$_FILES["image"]["tmp_name"];
    
move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"../category/".$file_name);
$location = $base_url.'/category/'.$file_name;

$query = "INSERT INTO `category`(`name`,`image`, `status`) VALUES ('$cateName','$location','$status') ";
mkdir("../wallpaper/".$cateName);
$result = mysqli_query($con, $query);
header('Location: ../'); 


?>