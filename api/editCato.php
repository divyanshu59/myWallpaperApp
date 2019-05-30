
<!DOCTYPE html>
<html>
<head>
	<title>Edit Category</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">	

 		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background: #c0c0c0;">


<?php 
include "connection.php";
$catoID = 0;
if (isset($_GET['id']))
{
$catoID = $_GET['id'];
}
$sql = "SELECT * FROM `category` WHERE `id` = '$catoID' " ;

$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{

		echo 
		"
			<div style='margin-top: 10%; margin-right: 20%; margin-left: 20%; background: #fff; border-radius: 	25px;  padding: 30px;'>
			<form action='editCato.php?id=$row[0]' method='POST'>
				<label >Name:</label>
				<input type='text' class='form-control' name='name' value='$row[1]' required />
				<input type='hidden' name='id' value='$row[0]' required />
				<br>

				<label>Status:</label>
				<select class='form-control' name='status'>
	   				 <option value='1'>Active</option>
	   				<option value='0'>Non - Active</option>
	   			</select>
				<br>
				<input type='submit' name='save' class='btn btn-lg btn-info'>
			</form>

		</div>
		<br>
		<center>
		<a href='../' style='color: #fff; height: 30px; ' class='btn btn-lg btn-warning'>Go Back</a>
		</center>
		";

	}
}



?>
	

	

</body>
</html>

<?php
if(isset($_POST['save']))
{
	echo $name=$_POST['name'];
	echo $status=$_POST['status'];
	echo $catoID=$_POST['id'];



$query = "UPDATE `category` SET `name`='$name',`status`='$status' WHERE `id` = '$catoID' ";
$result = mysqli_query($con, $query);
header('Location: ../'); 
}

?>