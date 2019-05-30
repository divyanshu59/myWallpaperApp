<?php

include 'connection.php';

$query = "SELECT * FROM `wallpapers` ORDER BY `id` DESC";

$result = mysqli_query($con, $query);
$output = "
	<table class='table table-bordered table-striped' id='tableShowData' style='font-family: Arial, sans-serif;'>
		<tr>
			<th>Sr. No</th>
			<th>Image</th>
			<th>Name</th>
			<th>Category</th>
			<th>Upload Date</th>
			<th>Author</th>
			
			<th>Delete</th>
		</tr>

";
if(mysqli_num_rows($result)>0)
{
	$catName = 0;
	$count = 0;
	while ($row = mysqli_fetch_array($result))
	{
		$category = $row[2];
		$query1 = "SELECT * FROM `category` WHERE `id` = '$category' ";
		$result1 = mysqli_query($con, $query1);
			if(mysqli_num_rows($result1)>0)
			{
				while ($row1 = mysqli_fetch_array($result1))
				{
					$catName = $row1[1];
				}
			}
		$count++;
		$output .= "
				<tr>
					<td>$count</td>
					<td><img src='$row[5]' width='100' height='100' class='img-thumbnail' /></td>
					<td>$row[1]</td>
					<td>$catName</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					
					<td>
						<button type='button' class='btn btn-danger btn-xs delete'><a style='color: #fff'href='api/delete.php?id=$row[0]'>Delete </a></button>
					</td>
				</tr>
				";
	}
}
else
{
	$output .= "
		<tr>
			<td colspan='7' align='center'>No Data Found</td>
		</tr>
	";
}

$output .='</table>';


echo $output;
 
 ?>