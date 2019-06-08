<?php 

include 'api/connection.php';

$login =0;
if (isset($_COOKIE["login"]))
{
$email = $_COOKIE["email"];
$password = $_COOKIE["password"];
$login = 1;
}

if($login == 0)
{
	header('Location: login.php');
	die("Please Wait You are Rediritig..");
}

$sql = "SELECT * FROM `admin` WHERE `Email` = '$email' ";
$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row = mysqli_fetch_array($result))
		{
			$username = $row[1];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Wallpaper App </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">	
		<link rel="stylesheet" href="css/index.css">
 		
		
 		<script src="js/index.js"></script>
 		<script src="js/addimage.js"></script>

 		
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="overflow: hidden;">

<div class="row">
	
	<div class="col-md-3">
		<div id="sidebar">
			<div id="SideBarOption" name="BaraddWall">Wallpaper</div>
			<div id="SideBarOption" name="BaraddCato">Category</div>		
			<div id="SideBarOption" name="BareditInfo">Edit Info</div>
		</div>
	</div>
	<div class="col-md-9">
		<div id="mainSec">
			<div id="header">
				<span id="name">My Wallpaper App	</span> 

				<div id="profile" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
						<i class="fas fa-user-circle"></i>&nbsp; <?php echo $username; ?>
					
				</div>	

			</div>
			
			<div id="mainPart">
				


				<div class="row">
					<div class="col-md-6">
						<div class="well well-lg">
							<div id="sectionName" name="addWall">
								Wallpaper
							</div>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="well well-lg">
							<div id="sectionName" name="addCato">
								Category
							</div>
						</div>
					</div>	
				</div>
				
				<div id="space">
				</div>
				
				<div class="row">
					<div class="col-md-6 mx-auto">
						<div class="well well-lg">
							<div id="sectionName" name="editInfo">
								Edit Info
							</div>
						</div>
					</div>	
					
				</div>
			</div>
			
			<div id="addWallpaper">
					<center id="addWallpaperHead">Wallpapers</center>
					<div id="btnBackAddWall" class="btn  btn-danger">
						Back
					</div>
					<br>
					<form action="api/WallpaperUpload.php" method="POST" enctype="multipart/form-data">
							<p style="color: #0f0; text-align: center; text-decoration: none;">Upload Wallpaper</p>
						<div class="row" id="formUpload" style="font-family: Poppins-Regular, sans-serif;
">

							<div class="col-md-4">
								<input type="file" class="form-control" name="fileToUpload[]" id="fileToUpload" multiple />
							</div>
							<div class="col-md-4">
								<select class="form-control" name="category">
   								  
   								   <?php 
   								   		$sql1 = "SELECT * FROM `category`";
										$result1 = mysqli_query($con, $sql1);
											if(mysqli_num_rows($result1)>0)	
											{
												while ($row = mysqli_fetch_array($result1))
												{
													echo "<option>$row[1]</option>";
												}
											}
   								   ?>
   								 </select>
							</div>
							<div class="col-md-4">

								<input type="submit" name="upload" class="btn btn-success" />
							</div>
						</div>
					</form>
						<span id="error_multiple_file"></span>
					<div class="table-responsive" id="ShowAllWallpaper" style="height: 80vh; margin-top: 30px;">
						
					</div>
			</div>
			<div id="addCategory">
					<center>Category</center>
					<div id="btnBackAddCato" class="btn  btn-danger">
						Back</div>
							<br>
				<form action="api/newCategory.php" method="POST" enctype="multipart/form-data">	
					<div class="row" id="formUpload" style="font-family: Poppins-Regular, sans-serif;">

							<div class="col-md-4">
								<input type="text" class="form-control" name="cateName" placeholder="Category Name" required />
							</div>
							<div class="col-md-3">
								<select class="form-control" name="status">
   								  <option value="1">Active</option>
   								  <option value="0">Non - Active</option>
   								 </select>
							</div>
							<div class='col-md-3'>
								<input type="file" class="form-control" name="image" placeholder="Category image" required />
							</div>
							<div class="col-md-2">

								<input type="submit" class="btn btn-success" />
							</div>
						</div>
					</form>

					<div class="table-responsive" id="ShowAllCategory" style="height: 80vh; margin-top: 30px;">
					</div>
					
			</div>
			<div id="editInfo" style="overflow-y: scroll; height: 85vh; width: 100%;">
					<center>Edit Information</center>
					<div id="btnBackEditInfo" class="btn  btn-danger">
						Back
					</div>
					<br>
					<?php 
$sql = "SELECT * FROM `info` ";

$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	
	while ($row = mysqli_fetch_array($result))
	{
		echo 
		"
	<form method='POST' action='api/editInfo.php?id=$row[0]' >
		<div class='row'>
			<div class='col-md-6'>
				<p>Service Provider</p>
				<input type='text' class='form-control' name='service' value='$row[1]' disabled />
			</div>
			<div class='col-md-6'>
				<p>App Id</p>
				<input type='text' class='form-control' value='$row[2]' name='appID' required />
			</div>
			<br>
			<div class='col-md-4'>
				<p>Banner 1</p>
				<input type='text' class='form-control' value='$row[3]' name='banner1' required />
			</div>
			<div class='col-md-4'>
				<p>Banner 2</p>
				<input type='text' class='form-control' value='$row[4]' name='banner2' required />
			</div>
			<div class='col-md-4'>
				<p>Banner 3</p>
				<input type='text' class='form-control' value='$row[5]' name='banner3' required />
			</div>
			<br>
			<div class='col-md-4'>
				<p>Interstitial 1</p>
				<input type='text' class='form-control' value='$row[6]' name='interstitial1' required />
			</div>
			<div class='col-md-4'>
				<p>Interstitial 2</p>
				<input type='text' class='form-control' value='$row[7]' name='interstitial2' required />
			</div>
			<div class='col-md-4'>
				<p>Interstitial 3</p>
				<input type='text' class='form-control' value='$row[8]' name='interstitial3' required />
			</div>
			<br>
			
		
			<div class='col-md-4 mx-auto'><br>
				<input type='submit' value='Save Information' class='btn btn-success'/>
			</div>
			</form>



		</div>
	<hr>
		";

	}
}



					?>

			</div>



			
		</div>
	</div>
</div>
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">My Wallpapaer App</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<center>
          <p style="color: #F00;">Logout From This Acoount.</p>
          <a href='api/logout.php' class="btn btn-lg btn-danger">Logout</a>
      		</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  




</body>
</html>