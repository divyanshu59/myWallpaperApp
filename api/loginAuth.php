<p id="error"></p>
<?php

include 'connection.php';

$email = $_POST['email'];
$password = $_POST['pass'];


$sql = "SELECT * FROM `admin` WHERE `Email` = '$email' AND `Status` = 1";
	$queryRun = mysqli_query($con, $sql);
	
	if(mysqli_num_rows($queryRun)>0)
				{
			$sql1 = "SELECT * FROM `admin` WHERE `Email` = '$email' AND `Password` = '$password' ";
			$queryRun1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($queryRun1) == 1)
			{ 
				setcookie("login", "1", time() + (86400 * 30), "/");
				setcookie("email", $email, time() + (86400 * 30), "/");
				setcookie("password", $password, time() + (86400 * 30), "/");
			header('Location: ../');

			} 
			else {

				// Wrong Paswword
				echo '<script>
					document.getElementById("error").innerHTML = "Wrong Password";
				</script>';

				header('Location: ../index.php');
                   }
                }
 ?>