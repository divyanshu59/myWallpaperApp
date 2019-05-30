<?php 
include "connection.php";
header("Content-type:application/json");

$get_category = $_GET['catid'];

$wallpaper = array();

$sql = "SELECT * FROM `wallpapers` WHERE `category` = $get_category ";

if($get_category != ""){
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$temp = [
		'id'=>$row[0],
		'name'=>$row[1],
		'category_id'=>$row[2],
		'upload_date'=>$row[3],
		'author_name'=>$row[4],
		'wallpaer_url'=>"$row[5]"
	];

	array_push($wallpaper, $temp);
	}
}
}
else
{
	$temp = [
		'error'=>"No category Id Found"
	];
	array_push($wallpaper, $temp);
}

echo json_encode($wallpaper);
?>