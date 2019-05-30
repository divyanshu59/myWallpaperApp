<?php 
include "connection.php";
header("Content-type:application/json");

$get_pagenation = $_GET['page'];

$wallpaper = array();

if($get_pagenation != "")
{
$page_start = $get_pagenation * 10;
$page_end = ($get_pagenation * 10)+9;

$sql = "SELECT * FROM `wallpapers` limit $page_start,$page_end ";

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
		'wallpaer_url'=>$row[5]
	];

	array_push($wallpaper, $temp);
	}
}
}
else
{

$sql = "SELECT * FROM `wallpapers` ";

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
		'wallpaer_url'=>$row[5]
	];

	array_push($wallpaper, $temp);
	}
}
}

echo json_encode($wallpaper);
?>