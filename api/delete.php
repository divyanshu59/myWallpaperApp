<?php 
include "connection.php";

$wallpaperID = $_GET['id'];

$query = "DELETE FROM `wallpapers` WHERE `id` =  '$wallpaperID' ";
$result = mysqli_query($con, $query);
header('Location: ../'); 

?>