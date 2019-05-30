<?php


setcookie("login", "1", time() + (-86400 * 30), "/");
				setcookie("email", $email, time() + (-86400 * 30), "/");
				setcookie("password", $password, time() + (-86400 * 30), "/");
			header('Location: ../');

 ?>