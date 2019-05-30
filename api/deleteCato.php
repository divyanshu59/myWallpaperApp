<?php 
include "connection.php";

$catoID = $_GET['id'];

$query = "DELETE FROM `category` WHERE `id` =  '$catoID' ";
$result = mysqli_query($con, $query);
header('Location: ../'); 

?>