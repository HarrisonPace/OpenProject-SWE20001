<?php
	ob_start();

	session_start();
	session_unset(); // remove all session variables
	session_destroy(); // destroy the session thereby logging out the user

	header("Location: login.php"); //return user to login page
?>