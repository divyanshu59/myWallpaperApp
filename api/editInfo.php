<?php 
include "connection.php";
$id  = $_GET['id'];

$service = $_POST['service'];
$appID = $_POST['appID'];
$banner1 = $_POST['banner1'];
$banner2 = $_POST['banner2'];
$banner3 = $_POST['banner3'];
$interstitial1 = $_POST['interstitial1'];
$interstitial2 = $_POST['interstitial2'];
$interstitial3 = $_POST['interstitial3'];





$query = "UPDATE `info` SET `service_provider`='$service',`appid`='$appID',`banner1`='$banner1',`banne2`='banner2',`banner3`='$banner3',`interstitial1`='$interstitial1',`interstitial2`='$interstitial2',`interstitial3`='$interstitial3' WHERE id = '$id'";
$result = mysqli_query($con, $query);
header('Location: ../'); 

?>