<?php 
	session_start();
	if (isset($_SESSION['email'])) {
		session_unset($_SESSION['email']);
		session_destroy();

		header("Location: login.php");
	}
	else{
		header("Location: login.php");
	}
 ?>