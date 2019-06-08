<?php 
include "connection.php";

header("Content-type:application/json");

$sql = "SELECT * FROM `category` WHERE `status` = 1";
$category= array();
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$temp = [
		'id'=>$row[0],
		'name'=>$row[1],
		'img'=>$row[2]
	];

	array_push($category, $temp);
	}
}

echo json_encode($category);
?>