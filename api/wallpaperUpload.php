<?php 
include "connection.php";
extract($_POST);
$error=array();
$category  = $_POST['category'];
$catId = 0;
$query = "SELECT * FROM `category` WHERE `name` = '$category' ";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$catId = $row[0];
	}
}


$extension=array("jpeg","jpg","png");
foreach( $_FILES["fileToUpload"]["tmp_name"] as $key=>$tmp_name) {
   
    $file_name=$_FILES["fileToUpload"]["name"][$key];
    $file_tmp=$_FILES["fileToUpload"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    
    if(in_array($ext,$extension)) {
        if(!file_exists("../wallpaper/".$category."/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["fileToUpload"]["tmp_name"][$key],"../wallpaper/".$category."/".$file_name);
             $date = date("Y-m-d h:i:sa");

             $filenameToStore=basename($file_name,$ext);
            $location = $base_url.'/wallpaper/'.$category."/".$file_name;
            $query = "INSERT INTO `wallpapers`(`name`, `category`, `upload_date`, `author_name`, `wallpaper`) VALUES ('$filenameToStore','$catId','$date','Admin', '$location')";

			$result = mysqli_query($con, $query);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["fileToUpload"]["tmp_name"][$key],"../wallpaper/".$category."/".$newFileName);

            $date = date("Y-m-d h:i:sa");
            $filenameToStore=basename($newFileName,$ext);
            $location = $base_url.'/wallpaper/'.$category."/".$newFileName;
            $query = "INSERT INTO `wallpapers`(`name`, `category`, `upload_date`, `author_name`, `wallpaper`) VALUES ('$filenameToStore','$catId','$date','Admin', '$location')";

			$result = mysqli_query($con, $query);
        }

        header('Location: ../');   
    }
    else {
        array_push($error,"$file_name, ");
    }

}





?>