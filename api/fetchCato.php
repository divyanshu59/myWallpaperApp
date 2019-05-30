<?php

include 'connection.php';

$query = "SELECT * FROM `category`";

$result = mysqli_query($con, $query);
$output = "
	<table class='table table-bordered table-striped' id='tableShowData' style='font-family: Arial, sans-serif;'>
		<tr>
			<th>Sr. No</th>
			<th>Name</th>
			<th>Active</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

";
if(mysqli_num_rows($result)>0)
{$count = 0;
	while ($row = mysqli_fetch_array($result))
	{
		
		$active = ($row[2] == 1) ? 'Yes' :  'No';
		$count++;
		$output .= "
				<tr>
					<td>$count</td>
					<td>$row[1]</td>
					<td>$active</td>
					<td>
					<center>
						<button type='button' class='btn btn-warning btn-xs delete'><a style='color: #fff'href='api/editCato.php?id=$row[0]'>Edit Info </a></button>
					</center>
					</td>
					<td>
					<center>
						<button type='button' class='btn btn-danger btn-xs delete'><a style='color: #fff'href='api/deleteCato.php?id=$row[0]'>Delete </a></button>
					</center>
					</td>
				</tr>
				";
	}
}
else
{
	$output .= "
		<tr>
			<td colspan='5' align='center'>No Data Found</td>
		</tr>
	";
}

$output .='</table>';


echo $output;
 
 ?>