<?php 
include "connection.php";
header("Content-type:application/json");

$info = array();

$sql = "SELECT * FROM `info` WHERE `active` = 1";

$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$temp = [
		'id'=>$row[0],
		'service_provider'=>$row[1],
		'appid'=>$row[2],
		'banner1'=>$row[3],
		'banner2'=>$row[4],
		'banner3'=>$row[5],
		'interstitial1'=>$row[6],
		'interstitial2'=>$row[7],
		'interstitial3'=>$row[8]
	];

	array_push($info, $temp);
	}
}
echo json_encode($info);
?>