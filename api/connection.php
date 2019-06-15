<?php 
ob_start();
$db = "mywallpaperapp";
$host = "localhost";
$user = "visa";
$pass = "123456";

// Create connection
$con = new mysqli($host, $user, $pass , $db);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";

$base_url = "http://localhost/myWallpaperApp/";
?>